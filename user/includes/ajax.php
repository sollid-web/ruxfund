<?php
include('../../includes/server.php');
include('../../includes/functions.php');

//ajax get category in mega
if (! empty($_POST["plan_id"])) {
    $key = $_POST["plan_id"];
    $plan = get_data($con, 'plan', 'id', $key);
 ?>
<div class="rounded-soft overflow-hidden mb-3 mb-md-0">
<div class="mb-3">
    <h5 class='text-center tx-success'><?php echo ucwords($plan['name']);?></h5>
                          <ul class="list-group">
                              <li class="list-group-item"><span>Profit</span> <span class='float-right tx-primary'><b><?php echo $plan['percent'];?>%</b></span></li>
                              <li class="list-group-item"><span>Min Deposit</span> <span class='float-right tx-warning'><b>$<?php echo number_format($plan['min'],2);?></b></span></li>
                            <li class="list-group-item"><span>Max Deposit</span> <span class='float-right tx-success'><b>$<?php echo number_format($plan['max'],2);?></b></span></li>
                            <li class="list-group-item"><span>Referral Bonus</span> <span class='float-right tx-pink'><b><?php echo $plan['ref'];?>%</b></span></li>
                          </ul>
</div>
</div>
<?php
}
?>
