<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';



$page = array('id'=>5,'title'=>'Plans | '.$getuser['username'].' ','bread'=>'<i class="fa fa-file-alt menu-icon"></i> Transactions');
$table = 1;

$pagename = 'Plans';
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
                                        <div class="nk-block-head-sub"><span>Investment Plans</span></div>
                                        <h2 class="nk-block-title fw-normal">Choose plan.</h2>
                                    </div>
                                </div><!-- .nk-block-head -->
                                
                                
                                <!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row g-gs">
                                    
                                <?php
                                  $loop_plan = loop_table_DESC($con, 'plan', 200);
                                  foreach ($loop_plan as $plans) {
                                ?>
                                    
                                    <div class="col-md-6 col-xxl-3">
                                        <div class="card card-bordered pricing">
                                            <div class="pricing-head">
                                                <div class="pricing-title">
                                                    <h4 class="card-title title"><?php echo $plans['name'];?></h4>
                                                    <p class="sub-text text-<?php echo type_of_plan($plans['type'])['color']?>"><?php echo type_of_plan($plans['type'])['name']?></p>
                                                </div>
                                                <div class="card-text">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span class="h4 fw-500"><?php echo number_format(plan_daily_accrual_percent($plans), 4);?>%</span>
                                                            <span class="sub-text">Average daily accrual (simple)</span>
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="h4 fw-500"><?php echo $plans['ref'];?>%</span>
                                                            <span class="sub-text">Referral Commission</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pricing-body">
                                                <ul class="pricing-features">
                                                    <li><span class="w-50">Min Deposit</span> - <span class="ml-auto">$<?php echo number_format($plans['min'],2);?></span></li>
                                                    <li><span class="w-50">Max Deposit</span> - <span class="ml-auto">$<?php echo number_format($plans['max'],2);?></span></li>
                                                    <li><span class="w-50">Duration</span> - <span class="ml-auto"><?php echo $plans['num'].' '. plan_day($plans['calc']);?></span></li>
                                                    <li><span class="w-50">Total return for full term</span> - <span class="ml-auto"><?php echo number_format((float)$plans['percent'], 4);?>%</span></li>
                                                </ul>
                                                <div class="pricing-action">
                                                    <a href="deposit.php?plan=<?php echo $plans['id']?>" class="btn btn-outline-light">Choose Plan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    
                                    
                                    <?php
                                }
                                ?>
                                    
                                </div>
                            </div><!-- .nk-block -->
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
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
