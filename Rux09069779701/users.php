<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');


$a = $_GET['a'];
$d = $_GET['d'];
$activate = $_GET['ac'];
$deactivate = $_GET['dac'];
if(isset($activate)){
   $array = array('active'=>1);
   update_single($con,'users',$array,'id',$activate);
}

if(isset($deactivate)){
   $array = array('active'=>0);
   update_single($con,'users',$array,'id',$deactivate);
}

if(isset($d)){
   delete_complex($con,'users','id',$d);
}
if(isset($a)){
if($a == 1){
   $users = loop_for_data($con, 'users', 'active', 1);
   $sub = 1;
   $pagetitle= 'Active Accounts';
}

if($a == 0){
   $users = loop_for_data($con, 'users', 'active', 0);
   $sub = 0;
   $pagetitle= 'Deactivated Accounts';
}
if($a == 2){
   $users = loop_table($con, 'users'); 
   $sub = 2;
   $pagetitle= 'All Accounts';
}
}else{
   $users = loop_table($con, 'users'); 
   $sub = 2; 
   $pagetitle= 'All Accounts';
}



$activemenu=2;
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php';?>
    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'includes/header.php';?>
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
                        <!-- End row-->
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
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Country</th>
                                                            <th>Balance</th>
                                                            <th>Status</th>
                                                            <th>View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
<?php 
                                                   $sn=1;
                                                   foreach($users as $user_d)
                                                       {
                                                       ?>
                                                        <tr>
                                                            <td><?php echo $sn;?></td>
                                                            
                                                            <td><?php echo $user_d['username'];?></td>
                                                            <td><?php echo $user_d['email'];?></td>
                                                            <td><?php echo $user_d['country'];?></td>
                                                            <td><?php echo '$ '. smart_amount(getbal($con,$user_d['id'])['balance']);?></td>
                                                            <td><span class="badge <?php if($user_d['active']=='1'){echo 'badge-success';}else{echo 'badge-pink';}?>"><?php if($user_d['active']=='1'){echo 'Active';}else{echo 'Not Active';}?></span></td>
                                                                <td>
                                                                    <div id="us<?php echo $user_d['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class=""> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div> 
                                                    <div class="modal-body">  
                                                            <div class=""> 
                                                                <div class="card">
                                                        <div class="card-header bg-primary">
                                                            <h3 class="card-title text-white"><?php echo $user_d['username'];?><span class="float-right"> Bal: <?php echo '$ '. smart_amount(getbal($con,$user_d['id'])['balance']);?></span></h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="about-info-p">
                                                                <strong>Total Deposit</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(total_deposit($con,'Deposit',$user_d['id'])['total']);?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong>Total Withdraw</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo '$ '. smart_amount(total_deposit($con,'Withdraw',$user_d['id'])['total']);?></p>
                                                            </div>
                                                            <div class="about-info-p">
                                                                <strong>Registered on</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo smart_date($user_d['time']);?></p>
                                                            </div>
                                                            <div class="about-info-p m-b-0">
                                                                <strong>Last Seen</strong>
                                                                <br>
                                                                <p class="text-muted"><?php echo smart_date($user_d['logged']);?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="modal-footer">
                                                        <div id="d<?php echo $user_d['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you ready to delete this user?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                                                        <a href="?d=<?php echo complex_para($user_d['id'])?>" class="btn btn-pink waves-effect">Delete</a> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                                        <button type="button" class="btn btn-pink waves-effect waves-light" data-toggle="modal" data-target="#d<?php echo $user_d['id'];?>">Delete User</button>
                                                        <?php
                                                        if($user_d['active'] == 0){
                                                        ?>
                                                        <a href="?ac=<?php echo complex_para($user_d['id'])?>" class="btn btn-info waves-effect waves-light">Activate User</a>
                                                        <?php
                                                        }else{
                                                        ?>
                                                        <a href="?dac=<?php echo complex_para($user_d['id'])?>" class="btn btn-info waves-effect waves-light">Deactivate User</a>
                                                        <?php
                                                        }
                                                        ?>
                                                        <a href="#" class="btn btn-success waves-effect" data-dismiss="modal">Send Bonus</a>
                                                        <a href="#" class="btn btn-warning waves-effect" data-dismiss="modal">Send Penalty</a> 
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div>
                                                                    <a href="user-det.php?u=<?php echo complex_para($user_d['id'])?>" class="btn btn-sm btn-primary btn-custom " >View</a>
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