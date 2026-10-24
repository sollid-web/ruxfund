<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');


$a = $_GET['a'];
$d = $_GET['d'];
$activate = $_GET['ac'];
$update_amt = $_GET['up_am'];


if(isset($d)){
   delete_complex($con,'transaction','id',$d);
}
if(isset($a)){
if($a == 1){
   $_SESSION["a"] = 1;
   $dep = loop_for_data($con, 'transaction', 'type', 'Deposit'); 
   $dsub = 1;
   $pagetitle= 'Deposits';
}

if($a == 2){
   $_SESSION["a"] = 2;
   $dep = loop_transaction_3($con, 'transaction', 'type', 'Deposit', 'AND', 'closed', 0);
   $dsub = 2;
   $pagetitle= 'Active Deposits';
}
if($a == 3){
   $_SESSION["a"] = 3;
   $dep = loop_transaction_3($con, 'transaction', 'type', 'Deposit', 'AND', 'closed', 1);
   $dsub = 3;
   $pagetitle= 'Completed Deposits';
}
if($a == 4){
   $_SESSION["a"] = 4;
   $dep = loop_transaction($con, 'transaction', 'type', 'Deposit', 'AND', 'status', 0);
   $dsub = 4;
   $pagetitle= 'Pending Deposits';
}
}else{
   $dep = loop_for_data($con, 'transaction', 'type', 'Deposit'); 
   $dsub = 1; 
   $pagetitle= 'Deposits';
}


if(isset($activate)){
   $array = array('status'=>1,'updated'=> time());
   update_single_transact($con,'transaction',$array,'id',$activate,$_SERVER["PHP_SELF"].'?a='.$_SESSION["a"]);
   //update_single($con,'transaction',$array,'id',$activate);
}

if(isset($update_amt)){
   $up_amt = $_GET['amt'];
   $up_plan = $_GET['plan'];
   $up_id = $_GET['id'];
   $array = array('amount'=>$up_amt,'plan'=>$up_plan);
   update_single_transact($con,'transaction',$array,'id',$up_id, $_SERVER["PHP_SELF"].'?a='.$_SESSION["a"]);
   $clean = clean_complex_para($activate);
                $info = get_data($con, 'transaction', 'id', $clean);
                $bytes = random_bytes(20);
                $rand = bin2hex($bytes);
                $idsite = 1;
                $getsite = get_data($con, 'site', 'id', $idsite);
                $msg = "$".$info['amount']." has been successfully Deposited into your account <br> Transaction Batch is ".$rand."<br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.<br><br><b>How do I know this email is from ".$getsite['name']."?</b>

The link provided in this email starts with https:// and contain ".$getsite['site_url']." so you know it is from us. To contact customer service you can also simply paste the following link into your browser:

".$getsite['site_url']."/contact.php";
                $sub = "".$getsite['name']." Deposit";
                $sender = $info['sender'];
                $user = get_data($con, 'users', 'id', $sender);
                mail_template($getsite, $user, $sub, $msg);
}



$activemenu=3;

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
                                                            <th>Sender</th>
                                                            <th>Amount</th>
                                                            <th>Time</th>
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
                                                            <td><?php echo $stat;?></td>
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