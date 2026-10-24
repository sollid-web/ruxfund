<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');




$pagetitle = 'KYC Details';
$kycmain = $_GET['kyc'];
$kycdetails = get_data($con, 'kyc', 'id', $kycmain);
$pagetitle22 = get_data($con, 'users', 'id', $kycdetails['userid'])['username'];
if($kycdetails['status'] == 0){
                                                           $stat = 'Pending';
                                                        }else{
                                                           $stat = 'Approved';
                                                        }




$approve = $_GET['approve'];
if(isset($approve)){
    $useridd = get_data($con, 'kyc', 'id', $approve)['userid'];
    $array = array('kyc'=>1);
    $array2 = array('status'=>1);
    $updateuserkyc = update_data($con, 'users', $array, 'id', $useridd);
    $updatekyc = update_data($con, 'kyc', $array2, 'id', $approve);
    if($updateuserkyc != FALSE || $updatekyc != FALSE){
                $kycuserid = get_data($con, 'kyc', 'id', $approve)['userid'];
                $idsite = 1;
                $getsite = get_data($con, 'site', 'id', $idsite);
                $msg = " Your KYC Application has be verified successfully.<br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.<br><br><b>How do I know this email is from digitalglobalinvest?</b>

The link provided in this email starts with https:// and contain digitalglobalinvest.com so you know it is from us. To contact customer service you can also simply paste the following link into your browser:

https://www.digitalglobalinvest.com/contact.php";
                $sub = "".$getsite['name']." KYC Application";
                $sender = $kycuserid;
                $user = get_data($con, 'users', 'id', $sender);
                mail_template($getsite, $user, $sub, $msg);
        $_SESSION["info"]['info']='Success';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: kyc.php');
    } else {
        $_SESSION["info"]['info']='KYC Approval failed, Try again*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
    }
}

$reject = $_GET['reject'];
if(isset($reject)){
    $useridd = get_data($con, 'kyc', 'id', $reject)['userid'];
    $array = array('kyc'=>2);
    $updateuserkyc = update_data($con, 'users', $array, 'id', $useridd);
    $deletekyc = delete_data($con, 'kyc', 'id', $reject);
    if($updateuserkyc != FALSE || $deletekyc != FALSE){
        $kycuseridreject = get_data($con, 'kyc', 'id', $reject)['userid'];
                $idsite = 1;
                $getsite = get_data($con, 'site', 'id', $idsite);
                $msg = " Your KYC Application was rejected, please reapply for KYC Verification.<br> You can contact us on <a href='mailto:".$getsite['email']."'>".$getsite['email']."</a> for enquiry or assistance.<br><br><b>How do I know this email is from ".$getsite['name']."?</b>

The link provided in this email starts with https:// and contain ".$getsite['name'].".com so you know it is from us. To contact customer service you can also simply paste the following link into your browser:

https://www.".$getsite['name'].".com/contact.php";
                $sub = "".$getsite['name']." KYC Application";
                $sender = $kycuseridreject;
                $user = get_data($con, 'users', 'id', $sender);
                mail_template($getsite, $user, $sub, $msg);
        $_SESSION["info"]['info']='Rejected Successfully';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-success";
        header('location: kyc.php');
    } else {
        $_SESSION["info"]['info']='KYC Approval failed, Try again*';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: '.$_SERVER["PHP_SELF"].'');
    }
}
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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?php echo $pagetitle22;?> KYC Application</h3>
                                    </div>
                                    <div class="card-body">
                                        <h3><?php echo get_data($con, 'users', 'id', $kycdetails['userid'])['username'];?> KYC Application</h3>
    <div>
        <h6><small>User KYC Details</small></h6>
        <ul>
            <li>Name: <?php echo $kycdetails['name'];?></li>
            <li>Email: <?php echo $kycdetails['email'];?></li>
            <li>Phone: <?php echo $kycdetails['phone'];?></li>
            <li>Address: <?php echo $kycdetails['address'];?></li>
            <li>State: <?php echo $kycdetails['state'];?></li>
            <li>Country: <?php echo $kycdetails['country'];?></li>
            <li>Kyc Status: <?php echo $stat;?></li>
        </ul>
        <h4>ID Card</h4>
        <div class="image-area mt-4"><img  src="../user/kycimages/<?php echo $kycdetails['userid'];?>/<?php echo $kycdetails['image'];?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
    </div>
                                                
                                    </div><!-- card-body -->
                                    <div class="col-md-12 text-center">
            <a href="view-kyc.php?approve=<?php echo $kycdetails['id'];?>" class="btn btn-success text-white btn-md rounded-0 mb-4">Approve</a>
                      <a href="view-kyc.php?reject=<?php echo $kycdetails['id'];?>" style="background-color: red;" class="btn btn-warning text-white btn-md rounded-0 mb-4">Reject</a>
                  </div>
                                </div> <!-- card -->
                            </div> <!-- end col -->
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