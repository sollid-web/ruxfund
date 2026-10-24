<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

send_money($con);
if(!isset($_SESSION['name'])){
    header('location: transfer.php'); 
}
$page = array('id'=>4,'title'=>'Transfer | '.$getuser['username'].' ','bread'=>'<i class="fa fa-exchange"></i> Transfer');
$pagename = 'Transfer Funds';
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
                                        <div class="nk-block-head-sub"><span>Confirm Transfer</span></div>
                                        <h2 class="nk-block-title fw-normal">Transfer Verification</h2>
                                    </div>
                                </div><!-- .nk-block-head -->
                                
                                <div class="card card-preview">
                                        <div class="card-inner">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-7">
                                                    <div class="card card-bordered product-card">
                                                        <div class="card-inner text-center">
                                                            <ul class="product-tags">
                                                                <li><a href="#">Transfer</a></li>
                                                            </ul>
                                                            <h5 class="product-title">You are sending <strong class="product-price text-primary h5">$ <?php echo smart_num($_SESSION['amount']);?></strong> to <strong class="product-price text-primary h5"><?php echo $_SESSION['name'];?></strong>. <br>Are you sure?</h5>
                                                            <br><br><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                                    <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <input type="text"  class="form-control" name="name" value="<?php echo $_SESSION['name'];?>" id="amount1" hidden="" placeholder="">
                                            <input type="text"  class="form-control" name="amount" value="<?php echo $_SESSION['amount'];?>" id="amount1" hidden="" placeholder="">
                                            <input type="text"  class="form-control" name="id" value="<?php echo $_SESSION['id'];?>" id="amount1" hidden="" placeholder="">
                                            <button name="send_m" type="submit" class="btn btn-lg btn-primary">Transfer</button>
                                        </li>
                                        <li>
                                            <a href="transfer.php"  class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                                                        </div>
                                                    </div>
                                                    
                                                </div><!-- .col -->
                                            </div>
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