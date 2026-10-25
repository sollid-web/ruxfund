<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');

$users = loop_table($con, 'users')->num_rows;
$a_users = loop_for_data($con, 'users', 'active', 1)->num_rows;
$deposit = all_user_dw($con,'Deposit');
$withdraw = all_user_dw($con,'Withdraw');
$p_deposit = all_user_pending_dw($con,'Deposit');
$p_withdraw = all_user_pending_dw($con,'Withdraw');
$tdw = $deposit - $withdraw;
$oneday = time() - 86400;
$week = time() - 604800;
$month = time() - 2419200;
$year = time() - 29030400;
update_site_info ($con,'site',1);
update_username_password_admin($con,'flow',1);
$getadmin=get_data($con,'flow','id',1);

$activemenu=1;
$pagetitle= 'Dashboard';
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php';?>
    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php include 'includes/header.php';?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->

            <?php include 'includes/side-bar.php';?>
            <!-- Left Sidebar End --> 

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        
<?php include 'includes/welcome.php';?>
                        <!-- Start Widget -->
                        <!--Widget-4 -->
                        <!-- End row-->
                        <div class="row">
                            
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class="fa fa-users"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $users;?></span>
                                        Total Users
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Active Users <span class="pull-right"><?php echo $a_users;?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo smart_amount($deposit);?></span>
                                        Total Deposit
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right"><?php echo number_format(convert_to_btc('USD', $deposit),4);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-warning"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo smart_amount($withdraw);?></span>
                                        Total Withdrawal
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right"><?php echo number_format(convert_to_btc('USD', $withdraw),4);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo smart_amount($tdw);?></span>
                                        System Balance
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right"><?php echo number_format(convert_to_btc('USD', $tdw),4);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <!-- INBOX -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Transaction Summary</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="table-responsive">
                                                <table class="table table-striped  table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center text-primary">24 Hours</th>
                                                            <th class="text-center text-primary">7 days</th>
                                                            <th class="text-center text-primary">Last Month</th>
                                                            <th class="text-center text-primary">Year</th>
                                                            <th class="text-center text-primary">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                            <td><b>In<span style="float: right;">Out</span></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td ><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $oneday, time()));?> <span style="float: right;"><?php echo '$ '.smart_amount(total_btwn($con, 'Withdraw', 'time', $oneday, time()));?></span></td>
                                                            <td ><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $week, time()));?> <span style="float: right;"><?php echo '$ '.smart_amount(total_btwn($con, 'Withdraw', 'time', $week, time()));?></span></td>
                                                            <td ><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $month, time()));?> <span style="float: right;"><?php echo '$ '.smart_amount(total_btwn($con, 'Withdraw', 'time', $month, time()));?></span></td>
                                                            <td ><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $year, time()));?> <span style="float: right;"><?php echo '$ '.smart_amount(total_btwn($con, 'Withdraw', 'time', $year, time()));?></span></td>
                                                            <td><?php echo '$ '.smart_amount($deposit);?> <span style="float: right;"><?php echo '$ '.smart_amount($withdraw);?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center text-primary"><b><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $oneday, time()) - total_btwn($con, 'Withdraw', 'time', $oneday, time()));?></b></td>
                                                            <td class="text-center text-primary"><b><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $week, time()) - total_btwn($con, 'Withdraw', 'time', $week, time()));?></b></td>
                                                            <td class="text-center text-primary"><b><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $month, time()) - total_btwn($con, 'Withdraw', 'time', $month, time()));?></b></td>
                                                            <td class="text-center text-primary"><b><?php echo '$ '.smart_amount(total_btwn($con, 'Deposit', 'time', $year, time()) - total_btwn($con, 'Withdraw', 'time', $year, time()));?></b></td>
                                                            <td class="text-center text-primary"><b><?php echo '$ '.smart_amount($tdw);?></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->

                            <!-- CHAT -->
                            <!-- end col-->


                            <!-- TODOs -->
                             <!-- end col -->
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo smart_amount($deposit - $p_deposit);?></span>
                                        Verified Deposit
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right"><?php echo number_format(convert_to_btc('USD', ($deposit - $p_deposit)),4);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-warning"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo smart_amount($p_deposit);?></span>
                                        Pending Deposit
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right"><?php echo number_format(convert_to_btc('USD', $p_deposit),4);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-purple"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo smart_amount($p_withdraw);?></span>
                                        Pen. Withdrawal
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right"><?php echo number_format(convert_to_btc('USD', $p_withdraw),4);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-social-usd"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo smart_amount(members_bonus($con));?></span>
                                        Total Bonus
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">BTC Value <span class="pull-right"><?php echo number_format(convert_to_btc('USD', members_bonus($con)),4);?></span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Update Company Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-xl-6">
                                            <div class="form-group">
                                                <label >Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $getsite['name'];?>">
                                            </div>
                                                <div class="form-group">
                                                <label >Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $getsite['address'];?>">
                                            </div>
                                            </div>
                                            <div class="col-xl-6">
                                            
                                            <div class="form-group">
                                                <label >Email Address</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo $getsite['email'];?>">
                                            </div>
                                                <div class="form-group">
                                                <label >Phone Number</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $getsite['phone'];?>">
                                            </div>
                                            </div>
                                                <div class="col-xl-12">
                                            
                                            <div class="form-group">
                                                <label >Bitcoin</label>
                                                <input type="text" class="form-control" name="btc" placeholder="Bitcoin Address" value="<?php echo $getsite['btc'];?>">
                                            </div>
                                            </div>
                                            <div class="col-xl-12">
                                            
                                            <div class="form-group">
                                                <label >Ethereum</label>
                                                <input type="text" class="form-control" name="eth" placeholder="Ethereum Address" value="<?php echo $getsite['eth'] ?? '';?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Minimum Withdrawal</label>
                                                <input type="text" class="form-control" name="min_with" placeholder="Minimum Withdrawal" value="<?php echo $getsite['min_with'];?>">
                                            </div>
                                            </div>
                                                
                                                <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Maximum Withdrawal</label>
                                                <input type="text" class="form-control" name="max_with" placeholder="Maximum Withdrawal" value="<?php echo $getsite['max_with'];?>">
                                            </div>
                                            </div>
                                                
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="site_info" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Change Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label >Username</label>
                                                <input type="text" name="username" class="form-control"  placeholder="Username" value="<?php echo $getadmin['user'] ?? ''?>">
                                            </div>
                                            <div class="form-group">
                                                <label >Current Password</label> <em class="text-warning" style="font-size: 0.8rem;"> <?php echo $_SESSION["info"]['password'] ?? '';?></em>
                                                <input type="password" name="password" class="form-control"  placeholder="Current Password">
                                            </div>
                                            <div class="form-group">
                                                <label >New Password</label> <em class="text-warning" style="font-size: 0.8rem;"> <?php echo $_SESSION["info"]['new_password'] ?? '';?></em>
                                                <input type="password" name="new_password" class="form-control"  placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <label>Retype New Password</label>
                                                <input type="password" name="new_password_retype" class="form-control"  placeholder="Retype New Password">
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="update_username_password_admin" class="btn btn-primary waves-effect waves-light">Update Password</button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>


                         <!-- end row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <?php include 'includes/footer.php';?>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->

        <?php include 'includes/script.php';?>

    
    </body>
</html>
