<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

$page = array('id'=>6,'title'=>'My Referral History | '.$getuser['username'].' ','bread'=>'<i class="fas fa-users"></i> My Referral History');
$table = 1;
$pagename = 'Referrals'
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
                            <div class="content-page">
                                <div class="nk-block-head nk-block-head-lg wide-md">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><span>Referrals</span></div>
                                        <h2 class="nk-block-title fw-normal">Invite your friends and earn prizes!</h2>
                                    </div>
                                    
                                </div><!-- .nk-block-head -->
                                <div class="nk-block-des">
                                            <p id="cardTT_6" class="lead text-success"><?php echo $_SERVER['SERVER_NAME'];?>/auth/signup.php?ref=<?php echo $getuser['username'];?> </p>
                                        </div>
                                <li class="preview-item">
                                                    <button style="border-color: green" class="btn btn-sm clipboard-init" title="Copy to clipboard" data-clipboard-target="#cardTT_6" data-clip-success="Referral Link Copied " data-clip-text="Copy"><span class="clipboard-text">Copy Referral Link</span></button>
                                                </li>
                                
                                
                                
                                <div class="card card-preview">
                                        <div class="card-inner">
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr>
                                                        <td scope="row">SN</td>
                                                        <td>Referral</td>
                                                        <td>Bonus</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                  $sn = 1;
                  $ref_loop = loop_for_data($con, 'referral', 'ref', $getuser['username']);
                  foreach ($ref_loop as $ref) {
                  $ref_id = get_data($con, 'users', 'username', $ref['user'])['id'];
                  ?>
                                                    <tr>
                                                        <td scope="row"><?php echo $sn;?></td>
                                                        <td><b class="lead text-success"><?php echo $ref['user'];?></b>
                                <span class="tx-11 d-block tx-info"><?php echo smart_date($ref['time']);?></span></td>
                                                        <td><span class="<?php echo total_deposit($con,'Deposit',$ref_id)['color'];?>">USD <?php echo number_format(total_deposit($con,'Deposit',$ref_id)['bonus'],2);?></span></td>
                                                    </tr>
                                                    <!-- Modal Top -->
    
                                                    <?php
                        $sn++;
                    }
                     ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- .card-preview -->
                                
                                    
                                    
                                    
                                
                                
                            </div><!-- .content-page -->
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