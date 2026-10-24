<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

$page = array('id'=>6,'title'=>'Settings | '.$getuser['username'].' ','bread'=>'Profile');
$pagename = 'Settings';


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
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-aside-wrap">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-block-head nk-block-head-lg">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h4 class="nk-block-title">Security Settings</h4>
                                                        <div class="nk-block-des">
                                                            <p>These settings are helps you keep your account secure.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="card card-bordered">
                                                    <div class="card-inner-group">
                                                        <div class="card-inner">
                                                            <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                                <div class="nk-block-text">
                                                                    <h6>AML/KYC &nbsp; <span class="badge badge-<?php echo $kyccolor;?> ml-0"><?php echo $kyctext;?></span></h6>
                                                                    <p>The know your customer or know your client guidelines in financial services require that professionals make an effort to verify the identity, suitability, and risks involved with maintaining a business relationship.</p>
                                                                </div>
                                                                <div class="nk-block-actions">
                                                                    <a href="<?php echo $kyclink;?>" class="btn btn-<?php echo $kyccolor;?>"><?php echo $kyctext;?></a>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                        <div class="card-inner">
                                                            <div class="between-center flex-wrap g-3">
                                                                <div class="nk-block-text">
                                                                    <h6>Change Password</h6>
                                                                    <p>Set a unique password to protect your account.</p>
                                                                </div>
                                                                <div class="nk-block-actions flex-shrink-sm-0">
                                                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                        <li class="order-md-last">
                                                                            <a href="profile.php" class="btn btn-primary">Change Password</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div><!-- .card-inner -->
                                                    </div><!-- .card-inner-group -->
                                                </div><!-- .card -->
                                            </div><!-- .nk-block -->
                                        </div><!-- .card-inner -->
                                        
                                    </div><!-- .card-aside-wrap -->
                                </div><!-- .card -->
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


>