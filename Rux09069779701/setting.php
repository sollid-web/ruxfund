<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');


$a = $_GET['a'];

if(isset($a)){
if($a == 1){
   $dep = loop_table($con, 'plan'); 
   $ssub = 1;
   $pagetitle= 'Deposit Plans';
   create_plan($con);
   update_plan($con);
   $d = $_GET['d'];
   if(isset($d)){
   delete_complex_setting($con,'plan','id',$d,'?a='.$a.'');
   }
}

if($a == 2){
   $dep = loop_table($con, 'test'); 
   $ssub = 2;
   $pagetitle= 'Testimonials';
   create_test($con);
   update_test($con);
   $d = $_GET['d'];
   if(isset($d)){
       delete_complex_setting($con,'test','id',$d,'?a='.$a.'');
   }
}
if($a == 3){
   $dep = loop_table($con, 'faq'); 
   $ssub = 3;
   $pagetitle= 'Frequently Asked Questions';
   create_faq($con);
   update_faq($con);
   $d = $_GET['d'];
   if(isset($d)){
       delete_complex_setting($con,'faq','id',$d,'?a='.$a.'');
   }
}
if($a == 4){
   $ssub = 4;
   $pagetitle= 'Set Deposit/Withdrawal Charges';
   update_charge($con);
}
if($a == 5){
   $ssub = 5;
   $pagetitle= 'Statistics';
   $fak = get_data($con, 'fak', 'id', 1);
   update_stat($con);
}
}else{
   $dep = loop_table($con, 'plan'); 
   $ssub = 1;
   $pagetitle= 'Deposit Plans';
   create_plan($con);
   update_plan($con);
   $d = $_GET['d'];
   if(isset($d)){
   delete_complex($con,'plan','id',$d);
   }
}
$activemenu=6;

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
                        <div id="usd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                          
                                        </div>
                        
                        
                        <!-- CONFIRM DELETE MODAL-->
                        <div id="del_tra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        <button style="display: none;" type="button" id="show_tra" data-toggle="modal" data-target="#usd"></button>
                        <button style="display: none;" type="button" id="show_del" data-toggle="modal" data-target="#del_tra"></button>
                        
                        <!-- End row-->
                        <?php
                        if($ssub === 1){
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Create New Plan</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Type Of Plan</label>
                                                <select class="form-control" name="type">
                                                    <option value="">Select Type</option>
                                                    <option value="1">Investment</option>
                                                    <option value="2">Mining</option>
                                               </select>
                                            </div>
                                            </div>
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Name Of Plan</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name Of Plan">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Minimum</label>
                                                <input type="number" class="form-control" name="min" placeholder="Minimum Deposit">
                                            </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label >Maximum</label>
                                                <input type="number" class="form-control" name="max" placeholder="Maximum Deposit">
                                            </div>
                                            </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                <label >Referral Bonus</label>
                                                <input type="number" class="form-control" name="ref" placeholder="Referral Bonus">
                                            </div>
                                            </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                <label >Percentage Profit</label>
                                                <input type="number" class="form-control" name="profit" placeholder="Percentage Profit">
                                            </div>
                                            </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                <label >Duration</label>
                                                <div class="row">
                                                <div class="col-md-4">
                                                <select class="form-control" name="num">
                                                    <?php
                                                    for($x = 1; $x < 501;$x++){
                                                    ?>
                                                    <option value="<?php echo $x;?>"><?php echo $x;?></option>
                                                        <?php
                                                    }
                                                        ?>
                                               </select>
                                            </div>
                                                <div class="col-md-8">
                                                <select class="form-control" name="calc">
                                                    <option value="1">Hour(s)</option>
                                                    <option value="24">Day(s)</option>
                                                    <option value="720">Month(s)</option>
                                                    <option value="8760">Year(s)</option>
                                               </select>
                                            </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="mb-3 text-center">
                                            <button type="submit" name="create_plan" class="btn btn-primary waves-effect waves-light">Create Plan</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        
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
                                                            <th>Name</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                            <th>Ref</th>
                                                            <th>Percent/Duration</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
<?php 
                                                   $sn=1;
                                                   foreach($dep as $dep_d)
                                                       {
                                                       ?>
                                                        <tr>
                                                            <td><?php echo $sn;?></td>
                                                            
                                                            <td><?php echo $dep_d['name'];?></td>
                                                            <td><?php echo '$ '.smart_amount($dep_d['min']);?></td>
                                                            <td><?php echo '$ '.smart_amount($dep_d['max']);?></td>
                                                            <td><?php echo $dep_d['ref'].' %';?></td>
                                                            <td><?php echo $dep_d['percent'].' % / '. $dep_d['num'].' '. plan_day($dep_d['calc']);?></td>
                                                                <td>
                                                                <button type="button" class="btn btn-sm btn-primary btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_settings_modal(<?php echo $ssub;?>,this.value,'#usd','#show_tra')" >View</button>
                                                                    <button type="button" class="btn btn-sm btn-pink btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_del_settings(<?php echo $ssub;?>,this.value,'#del_tra','#show_del')">Delete</button>    
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
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($ssub === 2){
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Create New Testimonial</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                <label>Photo of User(optional)</label><em class='<?php if(isset($_SESSION["info"]['image'])){ echo 'text-warning';}else{ echo 'text-primary';}?>'> <?php if(isset($_SESSION["info"]['image'])){ echo $_SESSION["info"]['image'];}else{ echo '';}?></em>
                                                <div class=" mt-3">
                                                    <div>
                                                        <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick('#getcatimage')" style="height: 200px; width: 200px;">
                
              </div>
                                                            <img src="assets/choose.jpg" onClick="triggerClick('#getcatimage')" id="dispcatimage" class='profileDisplay' style="height: 200px; width: 200px;">
                                         </span>
                                                        <input type="file" name="image" onChange="displayImage(this,'#dispcatimage')" id="getcatimage" class="form-control" style="display:none;">
                                                    </div>
                                                </div>
                                            </div>
                                                </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Name Of User</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name Of User">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Testimony</label>
                                                <textarea type="number" class="form-control" rows="5" name="test" placeholder="Write Testimony"></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="create_test" class="btn btn-primary waves-effect waves-light">Create Testimony</button>
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
                                                            <th>Name</th>
                                                            <th>Testimony</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
<?php 
                                                   $sn=1;
                                                   foreach($dep as $dep_d)
                                                       {
                                                       ?>
                                                        <tr>
                                                            <td><?php echo $sn;?></td>
                                                            
                                                            <td><?php echo $dep_d['name'];?></td>
                                                            <td><?php echo $dep_d['testimony'];?></td>
                                                                <td>
                                                                <button type="button" class="btn btn-sm btn-primary btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_settings_modal(<?php echo $ssub;?>,this.value,'#usd','#show_tra')" >View</button>
                                                                    <button type="button" class="btn btn-sm btn-pink btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_del_settings(<?php echo $ssub;?>,this.value,'#del_tra','#show_del')">Delete</button>   
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
                        <?php
                        }
                        ?>
                        
                        
                        <?php
                        if($ssub === 3){
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Create New FAQ</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Question</label>
                                                <input type="text" class="form-control" name="name" placeholder="Question">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Answer</label>
                                                <textarea type="number" class="form-control" rows="5" name="answer" placeholder="Write Answer"></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="create_faq" class="btn btn-primary waves-effect waves-light">Create FAQ</button>
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
                                                            <th>Question</th>
                                                            <th>Answer</th>
                                                            <th>View/Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
<?php 
                                                   $sn=1;
                                                   foreach($dep as $dep_d)
                                                       {
                                                       ?>
                                                        <tr>
                                                            <td><?php echo $sn;?></td>
                                                            
                                                            <td><?php echo $dep_d['question'];?></td>
                                                            <td><?php echo $dep_d['answer'];?></td>
                                                                <td>
                                                                <button type="button" class="btn btn-sm btn-primary btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_settings_modal(<?php echo $ssub;?>,this.value,'#usd','#show_tra')" >View</button>
                                                                    <button type="button" class="btn btn-sm btn-pink btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_del_settings(<?php echo $ssub;?>,this.value,'#del_tra','#show_del')">Delete</button>    
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
                        <?php
                        }
                        ?>
                        
                        
                        <?php
                        if($ssub === 4){
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Set Charges</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Deposit - <small><?php echo $getsite['dep'];?> %</small></label>
                                                <input type="number" class="form-control" name="dep" value="<?php echo $getsite['dep'];?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label >Withdrawal - <small><?php echo $getsite['withdraw'];?> %</small></label>
                                                <input type="number" class="form-control" name="with" value="<?php echo $getsite['withdraw'];?>">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="update_charge" class="btn btn-primary waves-effect waves-light">Update Charges</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                        <?php
                        }
                        ?>
                        
                        <?php
                        if($ssub === 5){
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Set Statistics</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label >Extra Users</label>
                                                <input type="number" class="form-control" name="users" value="<?php echo $fak['users'];?>">
                                            </div>
                                            </div>
                                                <div class="col-md-3">
                                            <div class="form-group">
                                                <label >Extra Deposit</label>
                                                <input type="number" class="form-control" name="dep" value="<?php echo $fak['deposit'];?>">
                                            </div>
                                            </div>
                                                <div class="col-md-3">
                                            <div class="form-group">
                                                <label >Extra Withdrawal</label>
                                                <input type="number" class="form-control" name="with" value="<?php echo $fak['withdraw'];?>">
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label >Extra Days</label>
                                                <input type="number" class="form-control" name="days" value="<?php echo $fak['days'];?>">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="update_stat" class="btn btn-primary waves-effect waves-light">Update Charges</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                        <?php
                        }
                        ?>
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