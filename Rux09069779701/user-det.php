<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');


$u = $_GET['u'];
$d = $_GET['d'];
$du = $_GET['du'];
$wa = $_GET['wa'];
$activate_transact = $_GET['ac'];
$activate_user = $_GET['dac'];
$activate_transfer_tr = $_GET['tac'];
$update_amt = $_GET['up_am'];

if(isset($u)){
   $clean_l = subtract_string($u, 10, 0);
   $clean = subtract_string($clean_l, 10, 1);
   $user_data = get_data($con, 'users', 'id', $clean);
   $dep = loop_for_double_data_or($con, 'transaction', 'sender', $user_data['id'], 'receiver', $user_data['id']);
   $tsub = 2;
   $pagetitle= 'Transactions from '.$user_data['username'];
   user_admin_update($con,$user_data['id']);
   update_user_password_admin($con,'users',$user_data['id']);
   wallet_admin_update($con,$user_data['id']);
}

if(isset($activate_transact)){
   $array = array('status'=>1,'updated'=> time());
   update_single_transact($con,'transaction',$array,'id',$activate_transact, $_SERVER["PHP_SELF"].'?u='.complex_para($user_data['id']));
}

if(isset($update_amt)){
   $up_amt = $_GET['amt'];
   $up_plan = $_GET['plan'];
   $up_id = $_GET['id'];
   $us_id = $_GET['user_id'];
   $array = array('amount'=>$up_amt,'plan'=>$up_plan);
   update_single_transact($con,'transaction',$array,'id',$up_id, $_SERVER["PHP_SELF"].'?u='.$us_id);
}

if(isset($activate_user)){
   if($user_data['active'] == 0){
    $array = array('active'=>1);
   }else{
    $array = array('active'=>0);
   }
   update_single_transact($con,'users',$array,'id',$activate_user, $_SERVER["PHP_SELF"].'?u='.complex_para($user_data['id']));
}

if(isset($activate_transfer_tr)){
   if($user_data['transfer'] == 1){
    $array = array('transfer'=>0);
   }else{
    $array = array('transfer'=>1);
   }
   update_single_transact($con,'users',$array,'id',$activate_transfer_tr, $_SERVER["PHP_SELF"].'?u='.complex_para($user_data['id']));
}

if(isset($d)){
   delete_complex_transact($con,'transaction','id',$d ,$_SERVER["PHP_SELF"].'?u='.complex_para($user_data['id']));
}

if(isset($du)){
   delete_complex_transact($con,'users','id',$du ,'users.php');
}
if(isset($wa)){
   delete_complex_transact($con,'wallet','id',$wa ,$_SERVER["PHP_SELF"].'?u='.complex_para($user_data['id']));
}
$ref = get_data($con, 'referral', 'user', $user_data['username']);
if($ref == 0){
 $referral = 'None'; 
}else{
    $referral = $ref['ref'];   
}

$activemenu=2;
$user = 1;
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php';?>
    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php 
            ajax_loader_html();
            include 'includes/header.php';
            ?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <?php include 'includes/side-bar.php';?>
            <!-- Left Sidebar End --> 

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<?php include 'includes/welcome.php';?>
                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        
                        
                        <!-- VIEW TRANSACTION MODAL-->
                        <div id="usd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                          
                                        </div>
                        
                        
                        <!-- CONFIRM DELETE MODAL-->
                        <div id="del_tra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        
                        <!-- EDIT WALLET MODAL-->
                        <div id="edit_wal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        
                        
                        <button style="display: none;" type="button" id="show_tra" data-toggle="modal" data-target="#usd"></button>
                        <button style="display: none;" type="button" id="show_del" data-toggle="modal" data-target="#del_tra"></button>
                        <button style="display: none;" type="button" id="show_wal" data-toggle="modal" data-target="#edit_wal"></button>
                        
                        
                        <div class="row">
                            <div class="col-md-12 text-center mb-3">
                                
                                                        <?php
                                                        if($user_data['active'] == 0){
                                                            $dac = 'Activate';
                                                        }else{
                                                            $dac = 'Deactivate';
                                                        }
                                                        ?>
                                                        <div id="dac<?php echo $user_data['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you ready to <?php echo $dac.' '.$user_data['username']?>?</h4>
                                                    </div>
                                                    <div class="modal-footer" style="border: 0;">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                                                        <a href="?u=<?php echo complex_para($user_data['id'])?>&dac=<?php echo complex_para($user_data['id'])?>" class="btn btn-info waves-effect"><?php echo $dac;?></a> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light mt-4" data-toggle="modal" data-target="#dac<?php echo $user_data['id'];?>"><?php echo $dac;?></button>
                                                        <a href="bonus.php?a=1&u=<?php echo $user_data['id'];?>" class="btn mt-4 btn-sm btn-success waves-effect" data-dismiss="modal">Bonus</a>
                                                        <a href="bonus.php?a=2&u=<?php echo $user_data['id'];?>" class="btn mt-4 btn-sm btn-warning waves-effect" data-dismiss="modal">Penalty</a>
                                                        <div id="user<?php echo $user_data['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you ready to delete <?php echo $user_data['username']?>?</h4>
                                                    </div>
                                                    <div class="modal-footer" style="border: 0;">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                                                        <a href="?u=<?php echo complex_para($user_data['id'])?>&du=<?php echo complex_para($user_data['id'])?>" class="btn btn-pink waves-effect">Delete</a> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                                        <button type="button" class="btn mt-4 btn-sm btn-pink waves-effect waves-light" data-toggle="modal" data-target="#user<?php echo $user_data['id'];?>">Delete</button>
                                                        
                                                        <?php
                                                        if($user_data['transfer'] == 1){
                                                            $tac = 'Deactivate Transfer';
                                                            $tac_color = 'btn-pink';
                                                        }else{
                                                            $tac = 'Activate Transfer';
                                                            $tac_color = 'btn-success';
                                                        }
                                                        ?>
                                                        
                                                        <div id="trans<?php echo $user_data['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you ready to <?php echo $tac;?> for <?php echo $user_data['username']?>?</h4>
                                                    </div>
                                                    <div class="modal-footer" style="border: 0;">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                                                        <a href="?u=<?php echo complex_para($user_data['id'])?>&tac=<?php echo complex_para($user_data['id'])?>" class="btn <?php echo $tac_color;?> waves-effect"><?php echo $tac;?></a> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                                        <button type="button" class="btn mt-4 btn-sm <?php echo $tac_color;?> waves-effect waves-light" data-toggle="modal" data-target="#trans<?php echo $user_data['id'];?>"><?php echo $tac;?></button>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                                    <!-- Personal-Information -->
                                                    <div class="card card-default card-fill">
                                                        <div class="card-header bg-primary">
                                                            <h3 class="card-title text-white">Account Information</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">Username</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo $user_data['username'];?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">Password</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo $user_data['wd'];?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">Email</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo $user_data['email'];?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">Location</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo $user_data['country'];?></p>
                                                            </div>
                                                            <div class="about-info-p m-b-0">
                                                                <strong class="text-dark">Status</strong>
                                                                <br>
                                                                <p class="text-muted"><?php if($user_data['active'] == 1){echo 'Active';}else{ echo 'Not Active';}?></p>
                                                            </div>
                                                            <div class="about-info-p m-b-0">
                                                                <strong class="text-dark">Created On</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo smart_date($user_data['time']);?></p>
                                                            </div>
                                                            <div class="about-info-p m-b-0">
                                                                <strong class="text-dark">Reffered</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo $referral;?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            <div class="col-md-6">
                                                    <!-- Personal-Information -->
                                                    <div class="card card-default card-fill">
                                                        <div class="card-header bg-success">
                                                            <h3 class="card-title text-white">Transaction Summary</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">System Balance</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(getbal($con,$user_data['id'])['t_balance']);?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">Available Balance</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(getbal($con,$user_data['id'])['balance']);?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">Total Deposits</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(total_deposit($con,'Deposit',$user_data['id'])['total']);?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong class="text-dark">Total Withdrawals</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(total_deposit($con,'Withdraw',$user_data['id'])['total']);?></p>
                                                            </div>
                                                            <div class="about-info-p m-b-0">
                                                                <strong class="text-dark">Total Bonuses</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(all_bonus($con, $user_data));?></p>
                                                            </div>
                                                            <div class="about-info-p m-b-0">
                                                                <strong class="text-dark">Total Earning</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(getbal($con,$user_data['id'])['t_earn']);?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        </div>
                        <div class="row">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?php echo $pagetitle;?></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Sender</th>
                                                            <th>Amount</th>
                                                            <th>Time</th>
                                                            <th>Type</th>
                                                            <th>Status</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
<?php 
                                                   $sn=1;
                                                   foreach($dep as $dep_d)
                                                       {
                                                       if($dep_d['status'] == 0){
                                                           $stat = 'Pending';
                                                       }else{
                                                           $stat = 'Verified';
                                                       }
                                                       ?>
                                                        <tr>
                                                            <td><?php echo $sn;?></td>
                                                            
                                                            <td><?php echo get_data($con, 'users', 'id', $dep_d['sender'])['username'];?></td>
                                                            <td><?php echo '$ '.smart_amount($dep_d['amount']);?></td>
                                                            <td><?php echo smart_date($dep_d['time']);?></td>
                                                            <td><?php echo $dep_d['type'];?></td>
                                                            <td><?php echo $stat;?></td>
                                                                <td>
                                                                    
                                                                    <button type="button" class="btn btn-sm btn-primary btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_trans_modal(<?php echo $user_data['id'];?>,this.value,'#usd','#show_tra')" >View</button>
                                                                    <button type="button" class="btn btn-sm btn-pink btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_del_modal(<?php echo $user_data['id'];?>,this.value,'#del_tra','#show_del','d')">Delete</button>
                                                    </td>
                                                        </tr>
                                                      <?php $sn+=1;
                                                       }
                                                       ?> 
                                                    </tbody>
                                                </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- CHAT -->
                            <!-- end col-->


                            <!-- TODOs -->
                             <!-- end col -->
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h3 class="card-title text-white">Update Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Username</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $user_data['username'];?>">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            
                                            <div class="form-group">
                                                <label >Email Address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $user_data['email'];?>">
                                            </div>
                                            </div>
                                                
                                                <div class="col-md-4">
                                            
                                            <div class="form-group">
                                                <label >Maximum Daily Withdraw</label>
                                                <input type="number" class="form-control" name="max" placeholder="00000" value="<?php echo $user_data['max'];?>">
                                            </div>
                                            </div>
                                                <div class="col-xl-12">
                                            
                                            <div class="form-group">
                                                <label >Admin Message</label>
                                                <textarea type="text" rows="5" class="form-control" name="msg" placeholder="No Message"><?php if(empty($user_data['msg'])){ echo '';}else{ echo $user_data['msg'];}?></textarea>
                                            </div>
                                            </div>
                                                
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="user_admin_update" class="btn btn-info waves-effect waves-light">Update Profile</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header bg-warning">
                                        <h3 class="card-title text-dark">Change Password</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label >New Password</label> <em class="text-warning" style="font-size: 0.8rem;"> <?php echo $_SESSION["info"]['new_password'];?></em>
                                                <input type="password" name="new_password" class="form-control"  placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <label>Retype New Password</label>
                                                <input type="password" name="new_password_retype" class="form-control"  placeholder="Retype New Password">
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="update_user_password" class="btn btn-warning waves-effect waves-light">Update Password</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                        
                        <div class="row">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Wallet Address</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table id="datatable2" class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>SN</th>
                                                            <th>Type</th>
                                                            <th>Address</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $wall = loop_for_data($con, 'wallet', 'user', $user_data['id']);
                                                   $snw=1;
                                                   foreach($wall as $wallet)
                                                       {
                                                       ?>
                                                        <tr>
                                                            <td><?php echo $snw;?></td>
                                                            <td><?php echo $wallet['type'];?></td>
                                                            <td><?php echo $wallet['wallet'];?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-primary btn-custom " value="<?php echo $wallet['id'];?>" onclick="show_wallet_modal(this.value,'#edit_wal','#show_wal')">Edit</button>
                                                                <button type="button" class="btn btn-sm btn-pink btn-custom " value="<?php echo $wallet['id'];?>" onclick="show_del_modal(<?php echo $user_data['id'];?>,this.value,'#del_tra','#show_del','wa')">Delete</button>
                                                            </td>
                                                        </tr>
                                                      <?php $snw+=1;
                                                       }
                                                       ?> 
                                                    </tbody>
                                                </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- CHAT -->
                            <!-- end col-->


                            <!-- TODOs -->
                             <!-- end col -->
                        </div>
                        
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <?php include 'includes/footer.php';?>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

        <?php include 'includes/script.php';?>

    
    </body>
</html>