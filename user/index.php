<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

$page = array('id'=>1,'title'=>'Dashboard | '.$getuser['username'].' ','bread'=>'<i class="fas fa-home menu-icon"></i> Dashboard');

$all_d = total_deposit($con, 'Deposit', $getuser['id'])['total'];
$all_w = total_deposit($con, 'Withdraw', $getuser['id'])['total'];
$all_b = all_bonus($con, $getuser)['t_bonus'];
$all_b_show = all_bonus($con, $getuser)['show_total_bonus'];
$t_all = $all_d + $all_w + $all_b;
$num_rows_trans = loop_for_double_data_or_show($con, 'transaction', 'sender', $getuser['id'], 'receiver', $getuser['id'])->num_rows;
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
            <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "Nasdaq 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "BTC/USD"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "ETH/USD"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
            
            
            <?php include 'includes/alert.php';?>
            
            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-xl">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">Investment Dashboard</h3>
                                        <div class="nk-block-des text-soft">
                                            <p>Welcome to <?php echo $getsite['name'];?> Dashboard.</p>
                                        </div>
                                        <li class="preview-item">
                                                    <a href="withdraw.php" style="margin-right:20px; background-color: #F34910; color: #fff" class="btn btn"><span class="clipboard-text">withdraw</span></a>
                                                    
                                                    <a href="deposit.php" style="background-color: green; color: #fff" class="btn btn-sm"><span class="clipboard-text">Deposit</span></a>
                                                </li>
                                    </div><!-- .nk-block-head-content -->
                                    
                                </div><!-- .nk-block-between -->
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row g-gs">
                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Account Balance</h6>
                                                    </div>
                                                </div>
                                                <div class="card-amount">
                                                    <span class="amount"> <?php echo number_format(getbal($con,$getuser['id'])['balance'],2);?> <span class="currency currency-usd">USD</span>
                                                    </span>
                                                    <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em></span>
                                                </div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">System Counter</div>
                                                            <div class="amount"><?php echo number_format(getbal($con,$getuser['id'])['t_balance'],2);?> <span class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Total Deposit</h6>
                                                    </div>
                                                </div>
                                                <div class="card-amount">
                                                    <span class="amount"> <?php echo 'USD '. smart_amount($all_d);?> <span class="currency currency-usd">USD</span>
                                                    </span>
                                                    <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em></span>
                                                </div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">Value</div>
                                                            <div class="amount text-warning"><?php echo number_format(convert_to_btc('USD', $all_d),6).' BTC';?> <span class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    
                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Total Withdrawal</h6>
                                                    </div>
                                                </div>
                                                <div class="card-amount">
                                                    <span class="amount"> <?php echo 'USD '. smart_amount($all_w);?> <span class="currency currency-usd">USD</span>
                                                    </span>
                                                    <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em></span>
                                                </div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">Value</div>
                                                            <div class="amount text-warning"><?php echo number_format(convert_to_btc('USD', $all_w),6).' BTC';?> <span class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    
                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Total Bonus</h6>
                                                    </div>
                                                </div>
                                                <div class="card-amount">
                                                    <span class="amount"> <?php echo 'USD '. smart_amount($all_b_show);?> <span class="currency currency-usd">USD</span>
                                                    </span>
                                                    <span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em></span>
                                                </div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">Value</div>
                                                            <div class="amount text-warning"><?php echo number_format(convert_to_btc('USD', $all_b),6).' BTC';?><span class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    
                                    
                                    <div class="col-md-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner">
                                                <div class="card-title-group align-start mb-0">
                                                    <div class="card-title">
                                                        <h6 class="subtitle">Total Transactions</h6>
                                                    </div>
                                                </div>
                                                <div class="card-amount">
                                                    <span class="amount"> <?php echo 'USD '. smart_amount($t_all);?> <span class="currency currency-usd">USD</span>
                                                    </span>
                                                </div>
                                                <div class="invest-data">
                                                    <div class="invest-data-amount g-2">
                                                        <div class="invest-data-history">
                                                            <div class="title">Value</div>
                                                            <div class="amount text-warning"><?php echo number_format(convert_to_btc('USD', $t_all),6).' BTC';?><span class="currency currency-usd">USD</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card -->
                                    </div><!-- .col -->
                                    
                                    
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
                                    
                                    <div class="col-md-6 col-xxl-4">
                                        <div class="card card-bordered card-full">
                                            <div class="card-inner d-flex flex-column h-100">
                                                <div class="card-title-group mb-3">
                                                    <div class="card-title">
                                                        <h6 class="title">Investment plan total returns</h6>
                                                    </div>
                                                </div>
                                                <div class="progress-list gy-3">
                                                    <?php
                                  $loop_plan = loop_table_DESC($con, 'plan', 200);
                                  foreach ($loop_plan as $plans) {
                                ?>
                                                    
                                                    <div class="progress-wrap">
                                                        <div class="progress-text">
                                                            <div class="progress-label"><?php echo $plans['name'];?></div>
                                                            <div class="progress-amount"><?php echo number_format((float)$plans['percent'], 4);?>% total</div>
                                                        </div>
                                                        <div class="progress progress-md">
                                                            <div class="progress-bar" data-progress="<?php echo $plans['percent'];?>"></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php
                                }
                                ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    
                                    
                                    
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
