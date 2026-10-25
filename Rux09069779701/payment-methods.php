<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');

$allowed_types = ['BTC', 'ETH', 'USDT'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_payment_method'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?: 0;
    $type = strtoupper(trim($_POST['type'] ?? ''));
    $address = trim($_POST['address'] ?? '');
    if (!in_array($type, $allowed_types, true) || $address === '') {
        set_flash_message('Select a supported currency and enter a wallet address.');
    } elseif ($id > 0) {
        $saved = update_data($con, 'sitewallet', ['type' => $type, 'address' => $address], 'id', $id);
        set_flash_message($saved ? 'Payment method updated.' : 'Payment method could not be updated.', $saved ? 'alert-success' : 'alert-warning');
    } else {
        $saved = insert_data($con, 'sitewallet', ['type' => $type, 'address' => $address]);
        set_flash_message($saved ? 'Payment method added.' : 'Payment method could not be added.', $saved ? 'alert-success' : 'alert-warning');
    }
    header('Location: payment-methods.php');
    exit;
}

$methods = loop_table($con, 'sitewallet');
$activemenu = 6;
$ssub = 6;
$pagetitle = 'Payment Methods';
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body class="fixed-left">
<div id="wrapper">
<?php include 'includes/header.php'; ?>
<?php include 'includes/side-bar.php'; ?>
<div class="content-page"><div class="content"><div class="container-fluid">
<?php include 'includes/welcome.php'; ?>
<div class="row"><div class="col-xl-12"><div class="card">
    <div class="card-header bg-primary"><h3 class="card-title text-white">Payment Methods</h3></div>
    <div class="card-body">
        <p class="text-muted">These addresses are shown to users on the deposit payment-instruction page. Verify every address and network before saving.</p>
        <?php include 'includes/alert.php'; ?>
        <div class="table-responsive"><table class="table table-striped"><thead><tr><th>Currency</th><th>Wallet address</th><th>Action</th></tr></thead><tbody>
        <?php foreach ($methods as $method): ?>
            <tr><td><?php echo htmlspecialchars($method['type'], ENT_QUOTES, 'UTF-8'); ?></td><td class="text-break"><?php echo htmlspecialchars($method['address'], ENT_QUOTES, 'UTF-8'); ?></td><td><button class="btn btn-sm btn-primary" type="button" data-toggle="collapse" data-target="#edit-<?php echo (int) $method['id']; ?>">Edit</button></td></tr>
            <tr class="collapse" id="edit-<?php echo (int) $method['id']; ?>"><td colspan="3"><form method="post" class="form-inline"><input type="hidden" name="id" value="<?php echo (int) $method['id']; ?>"><select name="type" class="form-control mr-2" required><?php foreach ($allowed_types as $type): ?><option value="<?php echo $type; ?>" <?php echo $method['type'] === $type ? 'selected' : ''; ?>><?php echo $type; ?></option><?php endforeach; ?></select><input type="text" name="address" class="form-control mr-2 flex-grow-1" value="<?php echo htmlspecialchars($method['address'], ENT_QUOTES, 'UTF-8'); ?>" required><button type="submit" name="save_payment_method" class="btn btn-success">Save</button></form></td></tr>
        <?php endforeach; ?>
        </tbody></table></div>
        <hr><h5>Add payment method</h5>
        <form method="post" class="form-row"><div class="col-md-3"><select name="type" class="form-control" required><?php foreach ($allowed_types as $type): ?><option value="<?php echo $type; ?>"><?php echo $type; ?></option><?php endforeach; ?></select></div><div class="col-md-7"><input type="text" name="address" class="form-control" placeholder="Wallet address" required></div><div class="col-md-2"><button type="submit" name="save_payment_method" class="btn btn-primary">Add</button></div></form>
    </div>
</div></div></div>
</div></div></div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/script.php'; ?>
</div>
</body>
</html>
