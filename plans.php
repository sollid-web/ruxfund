<?php
$mobileview = 0;
require_once __DIR__ . '/includes/server.php';
require_once __DIR__ . '/includes/functions.php';
$page = ['id' => 7, 'title' => 'Investment Plans', 'bread' => 'Investment Plans'];
$plans = $con ? loop_table_DESC($con, 'plan', 200) : false;
?>
<!doctype html>
<html lang="en">
<?php include __DIR__ . '/includes/head.php'; ?>
<body class="page-template-default">
<?php include __DIR__ . '/includes/header.php'; ?>
<main class="tb-content" style="padding: 80px 0;">
    <div class="container">
        <div class="text-center mb-5">
            <h1>Investment Plans</h1>
            <p>Review plan terms. Returns are simple, non-compounding estimates accrued linearly over each plan term.</p>
        </div>
        <div class="row">
        <?php if ($plans && $plans->num_rows > 0): foreach ($plans as $plan): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <article class="card card-bordered h-100">
                    <div class="card-body">
                        <h2 class="h4"><?php echo htmlspecialchars($plan['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p class="text-muted"><?php echo htmlspecialchars(type_of_plan($plan['type'])['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <dl>
                            <dt>Minimum deposit</dt><dd>$<?php echo number_format((float) $plan['min'], 2); ?></dd>
                            <dt>Maximum deposit</dt><dd>$<?php echo number_format((float) $plan['max'], 2); ?></dd>
                            <dt>Total return for full term</dt><dd><?php echo number_format((float) $plan['percent'], 4); ?>%</dd>
                            <dt>Average daily accrual (simple)</dt><dd><?php echo number_format(plan_daily_accrual_percent($plan), 4); ?>%</dd>
                            <dt>Referral commission</dt><dd><?php echo number_format((float) $plan['ref'], 4); ?>%</dd>
                            <dt>Duration</dt><dd><?php echo (int) $plan['num']; ?> <?php echo htmlspecialchars(plan_day($plan['calc']), ENT_QUOTES, 'UTF-8'); ?></dd>
                        </dl>
                        <a class="tb-btn tb-style1" href="auth/signup.php">Create an account to invest</a>
                    </div>
                </article>
            </div>
        <?php endforeach; else: ?>
            <div class="col-12"><div class="alert alert-warning">Investment plans are temporarily unavailable. Please check back later or contact support.</div></div>
        <?php endif; ?>
        </div>
    </div>
</main>
<?php include __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
