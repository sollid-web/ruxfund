<?php
require_once __DIR__ . '/../includes/server.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/includes/checkuser.php';

$plan_id = filter_input(INPUT_GET, 'plan', FILTER_VALIDATE_INT);
if (!$plan_id) {
    header('Location: plan.php');
    exit;
}

$plan_details = $con ? get_data($con, 'plan', 'id', $plan_id) : false;
if (!$plan_details) {
    set_flash_message('The selected investment plan is unavailable.');
    header('Location: plan.php');
    exit;
}

if ($con) {
    deposit($con, (int) $getuser['id']);
}

$payment_amount = isset($_GET['amt']) && is_numeric($_GET['amt']) ? (float) $_GET['amt'] : null;
$coin = $_SESSION['coin'] ?? 'BTC';
$rates = [
    'BTC' => $con ? (float) get_bit_rate() : 0,
    'ETH' => $con ? (float) get_eth_rate() : 0,
    'USDT' => $con ? (float) get_usdt_rate() : 0,
];
if (!array_key_exists($coin, $rates)) {
    $coin = 'BTC';
}
$rate = $rates[$coin];
$wallet = $con ? get_data($con, 'sitewallet', 'type', $coin) : false;
$wallet_address = $wallet['address'] ?? '';
$page = ['id' => 2, 'title' => 'Deposit | '.($getuser['username'] ?? 'User'), 'bread' => '<i class="fas fa-upload"></i> Deposit'];
$pagename = 'Deposit';
?>
<!DOCTYPE html>
<html lang="en" class="js">
<?php include 'includes/head.php'; ?>
<body class="nk-body npc-invest bg-lighter">
<div class="nk-app-root"><div class="nk-wrap">
<?php include 'includes/header.php'; ?>
<div class="nk-content nk-content-fluid"><div class="container-xl wide-xl"><div class="nk-content-inner"><div class="nk-content-body">
<?php include 'includes/alert.php'; ?>
<?php if ($payment_amount === null): ?>
<section class="content-page">
    <div class="nk-block-head nk-block-head-lg wide-md">
        <div class="nk-block-head-sub"><span>Investment</span></div>
        <h2 class="nk-block-title fw-normal"><?php echo htmlspecialchars($plan_details['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
        <p class="text-soft">Invest between $<?php echo number_format((float) $plan_details['min'], 2); ?> and $<?php echo number_format((float) $plan_details['max'], 2); ?>.</p>
    </div>
    <div class="col-lg-6"><div class="card card-bordered"><div class="card-inner">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8'); ?>?plan=<?php echo (int) $plan_id; ?>" method="post">
            <input type="hidden" name="plan" value="<?php echo (int) $plan_id; ?>">
            <div class="form-group"><label class="form-label" for="deposit-amount">Amount</label><input required min="<?php echo (float) $plan_details['min']; ?>" max="<?php echo (float) $plan_details['max']; ?>" step="0.01" type="number" name="amount" class="form-control" id="deposit-amount"></div>
            <div class="form-group"><label class="form-label" for="deposit-coin">Payment currency</label><select required name="coin" class="form-control" id="deposit-coin"><option value="BTC">Bitcoin (BTC)</option><option value="ETH">Ethereum (ETH)</option><option value="USDT">Tether USD (USDT)</option></select></div>
            <div class="form-group"><label class="form-label" for="deposit-method">Payment method</label><select required name="by" class="form-control" id="deposit-method"><option value="2">External wallet</option><option value="1">Account balance</option></select></div>
            <button type="submit" name="invest" class="btn btn-lg btn-primary">Continue investment</button>
        </form>
    </div></div></div>
</section>
<?php else: ?>
<section class="content-page">
    <div class="nk-block-head nk-block-head-lg wide-md"><div class="nk-block-head-sub"><span>Payment instructions</span></div><h2 class="nk-block-title fw-normal">Complete your investment</h2><p class="text-warning">Send only <?php echo htmlspecialchars($coin, ENT_QUOTES, 'UTF-8'); ?> to the configured wallet and network.</p></div>
    <div class="card card-bordered"><div class="card-inner">
        <?php if ($wallet_address !== ''): ?>
            <?php if ($rate > 0): ?>
                <p>Send <strong><?php echo number_format($payment_amount / $rate, 8, '.', ''); ?> <?php echo htmlspecialchars($coin, ENT_QUOTES, 'UTF-8'); ?></strong> to:</p>
            <?php else: ?>
                <p>Send the selected <?php echo htmlspecialchars($coin, ENT_QUOTES, 'UTF-8'); ?> to:</p>
                <p class="text-warning">The live conversion amount is temporarily unavailable. Confirm the amount with support before sending.</p>
            <?php endif; ?>
            <p id="payment-wallet" class="lead text-break"><?php echo htmlspecialchars($wallet_address, ENT_QUOTES, 'UTF-8'); ?></p>
            <button type="button" class="btn btn-outline-primary clipboard-init" data-clipboard-target="#payment-wallet">Copy wallet address</button>
        <?php else: ?>
            <div class="alert alert-warning">This payment method is not configured yet. Contact support before sending funds.</div>
        <?php endif; ?>
        <p class="mt-3">Your transaction request is recorded in your history. It remains pending until payment is verified.</p>
        <a href="transaction.php" class="btn btn-primary">View transaction history</a>
        <a href="plan.php" class="btn btn-link">Back to plans</a>
    </div></div>
</section>
<?php endif; ?>
</div></div></div></div>
<?php include 'includes/footer.php'; ?>
</div></div>
<?php include 'includes/script.php'; ?>
</body>
</html>
