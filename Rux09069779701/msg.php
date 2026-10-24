<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');


$a = $_GET['a'];
$d = $_GET['d'];
$activate = $_GET['ac'];
if(isset($activate)){
   $array = array('status'=>1,'updated'=> time());
   update_single($con,'transaction',$array,'id',$activate);
}


if(isset($d)){
   delete_complex($con,'msg','id',$d);
}
if(isset($a)){
if($a == 1){
   $dep = loop_table($con, 'msg'); 
   $msub = 1;
   $pagetitle= 'Messages';
}

if($a == 2){
   $msub = 2;
   $pagetitle= 'Bulk Message';
   bulk_msg($con,$getsite);
}
}else{
   $dep = loop_table($con, 'msg'); 
   $msub = 1;
   $pagetitle= 'Messages';
}



$activemenu=8;
$texteditor = 1

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
                        <?php
                        if($msub === 2){
                        ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?php echo $pagetitle;?></h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Subject</label>
                                                <input type="text" class="form-control" name="sub" placeholder="Subject">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Message</label>
                                                <textarea type="text" class="form-control" rows="5" name="msg" placeholder="Write Message"></textarea>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="send_bulk" class="btn btn-primary waves-effect waves-light">Send Message To Users</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
                        <?php
                        }
                        if($msub === 1){
                        ?>
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
                                                            <th>Email</th>
                                                            <th>Subject</th>
                                                            <th>Message</th>
                                                            <th>Delete</th>
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
                                                            <td><?php echo $dep_d['email'];?></td>
                                                            <td><?php echo $dep_d['subject'];?></td>
                                                            <td><?php echo $dep_d['msg'];?></td>
                                                            <td>
                                                                <div id="d<?php echo $dep_d['id'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none">
                                            <div class="modal-dialog modal-full">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you ready to delete this message?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                                                        <a href="?d=<?php echo complex_para($dep_d['id'])?>" class="btn btn-pink waves-effect">Delete</a> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div>
                                       <button type="button" class="btn btn-pink waves-effect btn-sm waves-light" data-toggle="modal" data-target="#d<?php echo $dep_d['id'];?>">Delete</button>
                                                               
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