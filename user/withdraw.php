<?php
require_once __DIR__ . '/../includes/server.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/checkuser.php';

$getsite = $getsite !== false ? $getsite : ['min_with' => 0, 'max_with' => 0];
if ($con) {
    add_wallet($con);
    withdraw_m($con, $getsite);
}
// $userkyc = get_data($con, 'users', 'username', $_SESSION['user'])['kyc'];
//       if($userkyc != 1){
//          $_SESSION["info"]['info']='Your KYC is Pending!
// Pending KYC. Once our team verify your identity, you will be notified by email. You can also check your KYC compliance status from your Settings page.';
//          $_SESSION["time"]=time();
//          $_SESSION["theme"]="alert-warning";
//          header('location: index.php');
//       } 
$page = array('id'=>3,'title'=>'Withdraw | '.($getuser['username'] ?? 'User').' ','bread'=>'<i class="fas fa-download"></i> Withdraw');
$pagename = 'Withdrawal';
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
                                                        <h5 class="card-title">Withdrawal</h5>
                                                    </div>
                                                    <?php include 'includes/alert.php';?>
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                                        <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">Amount</label>
                                                            <input type="number" name="amount" class="form-control" id="cf-full-name" placeholder="000.00">
                                                        </div>
                                                            
                                                            
                                                                <?php $loopwallet = $con ? loop_for_data_string($con,'wallet','user',$getuser['id'] ?? 0) : false;
                                                                if($loopwallet && $loopwallet->num_rows > 0){
                                                                ?>
                                                            
                                                            
                                                            <div class="form-group">
                                                            <label class="form-label" for="default-06">Select wallet</label>
                                                            <div class="form-control-wrap ">
                                                                <div class="form-control-select">
                                                                    <select name="name" class="form-control" id="default-06">
                                                                        <?php
                                                                    while($getmegacategory=mysqli_fetch_array($loopwallet))
                                                                      {
                                                                        ?>
                                                                   <option value='<?php echo ucwords($getmegacategory['type']).' - '.$getmegacategory['wallet'];?>'><?php echo ucwords($getmegacategory['type']).' - '.$getmegacategory['wallet'];?></option>
                                                                         <?php
                                                   
                                                                         }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <input type="hidden" value="<?php echo $getuser['id'];?>" name="id">
                                                            <div class="form-group">
                                                            <button type="submit" name="withdraw_m" class="btn btn-lg btn-primary">Make Withdraw</button>
                                                        </div>
                                                    </form>
                                                            
                                                            
                                                            
                                                                <?php
                                                                }else{
                                                                ?>
                                                    <li class="preview-item">
                                                        <button type="button" style="width: 100%" class="btn btn-lg btn-outline-success" data-toggle="modal" data-target="#profile-edit">Add wallet Address</button>
                                                </li>
                                                            
                                                     <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Wallet Address</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal">Add Wallet Address</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Wallet Address</label>
                                        <input type="text" name="name" class="form-control form-control-lg" id="full-name" value="" placeholder="Enter Wallet Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-county">Select wallet Type</label>
                                        <select name="category" class="form-select" id="address-county" data-ui="lg">
                                          <option label="Select Wallet Type"></option>
                                          <option value="Bitcoin">Bitcoin</option>
                                          <option value="Ethereum">Ethereum</option>
                                          <option value="Tether">Tether USD</option>
                                        </select>
                                    </div>
                                </div> 
                                    <input type="text" name="id" class="form-control" id="amount1" value="<?php echo $getuser['id'];?>" hidden>
                                <div class="col-12" style="margin-top: 10px">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button name="add_wallet" type="submit" class="btn btn-lg btn-primary">Add</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                            </div>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
                                                    
                                                    
    <div class="form-group" style="margin-top: 15px">
                                                        <button type="submit" disabled  style="width: 100%" class="btn btn-lg btn-primary">Make Withdraw</button>
                                                        </div>
                                                              
                                                        <?php
                                                        }
                                                        ?>
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
