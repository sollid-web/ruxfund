<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

$page = array('id'=>3,'title'=>'KYC | '.$getuser['username'].'');
$pagename = 'KYC Verification';
$loopkyccheck = get_data($con, 'users', 'username', $getuser['username'])['kyc'];
if($loopkyccheck == 1){
        $withdrawlimit='Unlimited';
        $_SESSION["theme"]="alert-warning";
        } else {
        $withdrawlimit='00.00 USD';
        $_SESSION["theme"]="alert-warning";    
}


$userkyc = get_data($con, 'users', 'id', $getuser['id'])['kyc'];
if($userkyc == 1){
    $kyctext = 'Approved';
    $kyclink = '';
    $kyccolor = 'success';
} elseif($userkyc == 2){
    $kyctext = 'Reapply KYC';
    $kyclink = 'kyc.php';
    $kyccolor = 'danger';
} else {
    $kyctext = 'Pending';
    $kyclink = 'kyc.php';
    $kyccolor = 'warning';
    
}
?>

<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- head @s -->
<?php include 'includes/head.php';?>
<!-- head @e -->

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- header @s -->
            <?php include 'includes/header.php';?>
            <!-- header @e -->
            
            
            
            
            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-xl">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">KYCs / <strong class="text-primary small"><?php echo $getuser['username'];?></strong></h3>
                                        <div class="nk-block-des text-soft">
                                            <ul class="list-inline">
                                                <li>Application ID: <span class="text-base"><?php echo $getuser['username'];?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <a href="settings.php" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                        <a href="settings.php" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row gy-5">
                                    <div class="col-lg-5">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title title">Application Info</h5>
                                                <p>Submission , approve, status etc.</p>
                                            </div>
                                        </div><!-- .nk-block-head -->
                                        <div class="card card-bordered">
                                            <ul class="data-list is-compact">
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Deposit</div>
                                                        <div class="data-value">Unlimited</div>
                                                    </div>
                                                </li>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Status</div>
                                                        <a href="<?php echo $kyclink;?>"><div class="data-value"><span class="badge badge-dim badge-sm badge-outline-<?php echo $kyccolor;?>"><?php echo $kyctext;?></span></div></a>
                                                    </div>
                                                </li>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Withdrawal Limit</div>
                                                        <div class="data-value">
                                                            <div class="user-card">
                                                                <div class="user-name">
                                                                    <span class="tb-lead"><?php echo  $withdrawlimit;?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="data-item">
                                                    <div class="data-col">
                                                        <div class="data-label">Features</div>
                                                        <div class="data-value">LPD/OTP/<?php echo $getsite['name'];?> Card</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            
            
            
            
            <!-- footer @s -->
            <?php include 'includes/footer.php';?>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    
    <!-- JavaScript -->
    <?php include 'includes/script.php';?>
    <!-- JavaScript @e -->
</body>

</html>