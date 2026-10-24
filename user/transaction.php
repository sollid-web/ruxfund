<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

$d = $_GET['d'] ?? null;
$w = $_GET['w'] ?? null;
$b = $_GET['b'] ?? null;
$t = $_GET['t'] ?? null;
$close = $_GET['close'] ?? null;

close_inv($con,$close);

if(isset($d)){
 $tranz = loop_transaction($con, 'transaction', 'sender', $getuser['id'], 'AND', 'type', 'Deposit');
 $sub = 'All Deposit';
}

if(isset($w)){
 $tranz = loop_transaction($con, 'transaction', 'sender', $getuser['id'], 'AND', 'type', 'Withdraw');
 $sub = 'All Withdrawals';
}

if(isset($b)){
 $tranz = loop_transaction($con, 'transaction', 'sender', $getuser['id'], 'AND', 'type', 'Bonus');
 $sub = 'All Bonus';
}

if(isset($t)){
 $tranz = loop_transfer($con,'transaction',$getuser['id']);
 $sub = 'All Transfers';
}

if(!isset($d) && !isset($w) && !isset($b) && !isset($t)){
 $tranz = loop_transaction($con, 'transaction', 'sender', $getuser['id'], 'OR', 'receiver', $getuser['id']);
 $sub = 'All Transactions';   
}

$page = array('id'=>5,'title'=>'Transactions | '.$getuser['username'].' ','bread'=>'<i class="fa fa-file-alt menu-icon"></i> Transactions');
$table = 1;

$pagename = 'Transactions';
$tranz = $tranz instanceof PgMysqliResult ? $tranz->fetch_all(PG_MYSQLI_ASSOC) : array();
$transaction_count = count($tranz);
$transaction_total = 0;
foreach ($tranz as $transaction) {
    $transaction_total += (float) $transaction['amount'];
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
                            <div class="content-page">
                                <div class="nk-block-head nk-block-head-lg wide-md">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><span>Transaction</span></div>
                                        <h2 class="nk-block-title fw-normal"><?php echo $sub;?></h2>
                                    </div>
                                </div><!-- .nk-block-head -->

                                <div class="row g-gs mb-4">
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner py-3">
                                                <span class="sub-text">Records shown</span>
                                                <span class="amount fs-3"><?php echo $transaction_count;?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card card-bordered h-100">
                                            <div class="card-inner py-3">
                                                <span class="sub-text">Total value</span>
                                                <span class="amount fs-3">$<?php echo number_format($transaction_total, 2);?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="card card-preview">
                                        <div class="card-inner">
                                    <?php if ($transaction_count === 0) { ?>
                                            <div class="text-center py-5">
                                                <em class="icon ni ni-notes fs-2 text-light"></em>
                                                <h5 class="mt-2 mb-1">No <?php echo strtolower($sub);?> yet</h5>
                                                <p class="text-soft mb-0">Completed and pending activity will appear here.</p>
                                            </div>
                                    <?php } else { ?>
                                            <table class="datatable-init table">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Amount</th>
                                                        <th>View</th>
                                                        <th>status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                          $sn = 1;
                    foreach ($tranz as $trans) {
                    $color = array('Deposit'=>'success','Withdraw'=>'warning','Transfer'=>'primary');
                  $sender = get_data($con, 'users', 'id', $trans['sender'])['username'];
                  if(isset($trans['updated'])){
                      $updated = smart_date($trans['updated']);
                  }else{
                      $updated = 'Not verified';
                  }
                  $status = array('0'=>array('msg'=>'Pending','txt'=>'warning','icon'=>'<i class="fa fa-clock-o"></i>'),'1'=>array('msg'=>'Verified','txt'=>'success','icon'=>'<i class="fa fa-check"></i>'));
                  if($trans['receiver'] != 'x'){
                  $receiver = get_data($con, 'users', 'id', $trans['receiver'])['username'];
                  }else{
                  $receiver = get_data($con, 'site', 'id', 1)['name'];    
                  }
                    ?>
                                                    <tr>
                                                        <td><?php echo $trans['type'];?><br><span class="change up text-<?php echo $status[$trans['status']]['txt'];?>"><?php echo $status[$trans['status']]['icon'];?> <?php echo $status[$trans['status']]['msg'];?></span></td>
                                                        <td>$<?php echo number_format($trans['amount'],2);?></td>
                                                        <td><li class="preview-btn-item">
                                                    <a href="#" class="btn btn-dim btn-outline-success" data-toggle="modal" data-target="#modalTop<?php echo $trans['id'];?>">View</a>
                                                </li></td>
                                                        <td><span class="change up text-<?php echo $status[$trans['status']]['txt'];?>"><?php echo $status[$trans['status']]['icon'];?> <?php echo $status[$trans['status']]['msg'];?></span></td>
                                                    </tr>
                                                    <!-- Modal Top -->
    <div class="modal fade" tabindex="-1" id="modalTop<?php echo $trans['id'];?>">
        <div class="modal-dialog modal-dialog-top" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-<?php echo $color[$trans['type']];?>"><?php echo $trans['type'];?></h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <ul style="margin-bottom: 50px" class="listview flush transparent simple-listview no-space mt-3">
                <li>
                    <strong>Status: </strong>
                    <span class='badge badge-<?php echo $status[$trans['status']]['txt'];?>'><?php echo $status[$trans['status']]['msg'];?></span>
                </li>
                <li>
                    <strong>Initiated on: </strong>
                    <span><?php echo smart_date($trans['time']);?></span>
                </li>
                <li>
                    <strong>Verified on: </strong>
                    <span><?php echo $updated;?></span>
                </li>
                <li>
                    <strong>Value: </strong>
                    <span class="text-warning"><?php echo number_format(convert_to_btc('USD',$trans['amount']),2).' BTC';?></span>
                </li>
            </ul>
                    <br><br>
                    
                    <?php
                    if($trans['type'] == 'Deposit' && $trans['status'] == 1){
                        ?>
                    <p>You can get back the capital from your deposit by simply closing the investment.</p>
                    <?php
                        if($trans['closed'] == 0){
                            if(is_due($con, $trans['id'])['due'] == TRUE){
                                close_inv($con,$trans['id']);
                    ?>
                    <?php
                            }else{
                                ?>
                    <button type="button" class="btn btn-dark btn-block mb-3" disabled>Profit Unavailable</button>
                    <p class="text-center">Profit will be available on <br><?php echo smart_date(is_due($con, $trans['id'])['on']).' <span class="tx-info">('.get_capital_due_day(is_due($con, $trans['id'])['on']).')</span>';?></p>
                    <?php
                            }
                        }else{
                            ?>
                    <p>The capital for this investment was withdrawn on <?php echo smart_date($trans['closetime']);?>.</p>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text"><strong>Amount</strong>: USD <?php echo number_format($trans['amount'],2);?></span>
                </div>
            </div>
        </div>
    </div>
                                                    <?php
                        $sn++;
                    }
                     ?>
                                                </tbody>
                                            </table>
                                    <?php } ?>
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