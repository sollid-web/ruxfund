<?php
require_once __DIR__ . '/../includes/server.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/checkuser.php';

$plan = $_GET['plan'] ?? null;
if(!isset($plan) || empty($plan)){
    header('location: plan.php');
    exit;
}
$plandetails = $con ? get_data($con, 'plan', 'id', $plan) : false;
if (!$plandetails) {
    $plandetails = ['min' => 0, 'max' => 0, 'id' => $plan];
}

if ($con) {
    deposit($con, $getuser['id'] ?? 0);
}
$info = $_GET['amt'] ?? '';
$coin = $_SESSION['coin'] ?? 'BTC';

$btcval = $con ? get_bit_rate() : 1;
$ethval = $con ? get_eth_rate() : 1;
$usdtval = $con ? get_usdt_rate() : 1;

$coinname = $coin;
$rate_available = $btcval > 0 || $ethval > 0 || $usdtval > 0;

switch ($coinname) {
  case "BTC":
    $val = $btcval;
    break;
  case "ETH":
    $val = $ethval;
    break;
    case "BNB":
    $val = $bnbval;
    break;
  case "USDT":
    $val = $usdtval;
    break;
  case "LTC":
    $val = $ltcval;
    break;
  case "ADA":
    $val = $adaval;
    break;
  case "XRP":
    $val = $xrpval;
    break;
  case "TRX":
    $val = $tronval;
    break;
  default:
    $val = $btcval;
}

if ($val <= 0) {
    $val = 1;
    $rate_available = false;
}

$address = $con ? get_data($con, 'sitewallet', 'type', $coin) : ['address' => 'Connect your database to enable wallet payments'];
$page = array('id'=>2,'title'=>'Deposit | '.($getuser['username'] ?? 'User').' ','bread'=>'<i class="fas fa-upload"></i> Deposit');
$pagename = 'Deposit';
?>
