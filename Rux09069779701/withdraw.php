<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');


$a = $_GET['a'];
$d = $_GET['d'];
$activate = $_GET['ac'];


if(isset($d)){
   delete_complex($con,'transaction','id',$d);
}
if(isset($a)){
if($a == 1){
   $_SESSION["a"] = 1;
   $dep = loop_for_data($con, 'transaction', 'type', 'Withdraw'); 
   $wsub = 1;
   $pagetitle= 'Withdrawals';
}

if($a == 2){
   $_SESSION["a"] = 2;
   $dep = loop_transaction($con, 'transaction', 'type', 'Withdraw', 'AND', 'status', 1);
   $wsub = 2;
   $pagetitle= 'Completed Withdrawals';
}
if($a == 3){
   $_SESSION["a"] = 3;
   $dep = loop_transaction($con, 'transaction', 'type', 'Withdraw', 'AND', 'status', 0);
   $wsub = 3;
   $pagetitle= 'Pending Withdrawals';
}
}else{
   $dep = loop_for_data($con, 'transaction', 'type', 'Withdraw'); 
   $wsub = 1; 
   $pagetitle= 'Withdrawals';
}

if(isset($activate)){
   $array = array('status'=>1,'updated'=> time());
   update_single_transact($con,'transaction',$array,'id',$activate,$_SERVER["PHP_SELF"].'?a='.$_SESSION["a"]);
   $clean_l = subtract_string($activate, 10, 0);
                $clean = subtract_string($clean_l, 10, 1);
                $info = get_data($con, 'transaction', 'id', $clean);
                $bytes = random_bytes(20);
                $rand = bin2hex($bytes);
                $idsite = 1;
                $getsite = get_data($con, 'site', 'id', $idsite);
                $msg = "$".$info['amount']." has been successfully sent to your ".$info['paidby']." <br><br> Transaction Batch is ".$rand."<br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance. <br><br><br><b>How do I know this email is from ".$getsite['name']."?</b>

The link provided in this email starts with https:// and contain ".$getsite['site_url']." so you know it is from us. To contact customer service you can also simply paste the following link into your browser:

".$getsite['site_url']."/contact.php";
                $sub = "".$getsite['name']." Withdrawal";
                $sender = $info['sender'];
                $user = get_data($con, 'users', 'id', $sender);
                mail_template($getsite, $user, $sub, $msg);
   //update_single($con,'transaction',$array,'id',$activate);
}



$activemenu=4;

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
                                                            <th>Status</th>
                                                            <th>Wallet Address</th>
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
                                                            <td><?php echo $stat;?></td>
                                                            <td><?php echo $dep_d['paidby'];?></td>
                                                                <td>
                                                                <button type="button" class="btn btn-sm btn-primary btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_trans_modal(<?php echo '2';?>,this.value,'#usd','#show_tra')" >View</button>
                                                                    <button type="button" class="btn btn-sm btn-pink btn-custom " value="<?php echo $dep_d['id'];?>" onclick="show_del_modal(<?php echo '2';?>,this.value,'#del_tra','#show_del','d')">Delete</button>
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