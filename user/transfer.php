<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

transfergo($con);

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
                                
                                <div class="col-lg-6">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-head">
                                                        <h5 class="card-title">Transfer</h5>
                                                    </div>
                                                    <?php include 'includes/alert.php';?>
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                                        <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">Reciever Username</label>
                                                            <input type="text" name="name" class="form-control"  placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">Amount</label>
                                                            <input type="number" name="amount" class="form-control"  placeholder="000.00">
                                                        </div>
                                                            <input type="text"  class="form-control" name="id"  hidden="" value="<?php echo $getuser['id'];?>" placeholder="">
                                                           
                                                        <div class="form-group">
                                                            <button type="submit" name="transfergo" class="btn btn-lg btn-primary">Transfer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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