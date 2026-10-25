<?php
checkuser();
if ($con && !empty($getuser['id'])) {
    settle_due_investments($con, (int)$getuser['id']);
}
send_msg($con);
logout('../login.php');
?>
