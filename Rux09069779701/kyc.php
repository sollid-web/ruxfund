<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');

$pagetitle= 'KYC Aplication';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $pagetitle;?> | Admin Control</title>
        <!--<meta name="viewport" content="width=1024">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="admin panel" name="description" />
        <meta name="theme-color" content="#0173d4">
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="">
        
        <!-- DataTables -->
        <link href="plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
        <link href="plugins/datatables/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
        
        <!-- Plugins css -->
        <link href="plugins/modal-effect/css/component.css" rel="stylesheet">

        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/default.js"></script>
        
       
    </head>
    
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
                        <!-- End row-->
                        
                        <!-- VIEW TRANSACTION MODAL-->
                        <div id="usd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                          
                                        </div>
                        
                        
                        <!-- CONFIRM DELETE MODAL-->
                        <div id="del_tra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none">
                                            <!-- /.modal-dialog -->
                                        </div>
                        
                        <button style="display: none;" type="button" id="show_tra" data-toggle="modal" data-target="#usd"></button>
                        <button style="display: none;" type="button" id="show_del" data-toggle="modal" data-target="#del_tra"></button>
                        
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
                                                            <th>Time</th>
                                                            <th>Status</th>
                                                            <th>View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
<?php 
                                                   $loopkyc = loop_table($con, 'kyc');
                                                   $sn=1;
                                                   foreach($loopkyc as $kyc)
                                                       {
                                                       if($kyc['status'] == 0){
                                                           $stat = 'Pending';
                                                           $kycbtn = '<a href="view-kyc.php?kyc='.$kyc['id'].'" class="btn btn-sm btn-primary btn-custom">View</a>';
                                                       }else{
                                                           $stat = 'Approved';
                                                           $kycbtn = '<button type="button" class="btn btn-sm btn-primary btn-custom">Approved</button>';
                                                       }
                                                       ?>
                                                        <tr>
                                                            <td><?php echo $sn;?></td>
                                                            
                                                            <td><?php echo get_data($con, 'users', 'id', $kyc['userid'])['username'];?></td>
                                                            <td><?php echo $kyc['email'];?></td>
                                                            <td><?php echo smart_date($kyc['time']);?></td>
                                                            <td><?php echo $stat;?></td>
                                                                <td>
                                                                <?php echo $kycbtn;?>
                                                                    
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