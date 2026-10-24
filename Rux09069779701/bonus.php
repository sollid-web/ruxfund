<?php
include('../includes/server.php');
include 'includes/derfdssf.php';
include('../includes/functions.php');


$a = $_GET['a'];
$u = $_GET['u'];
if(isset($u)){
    $bonus_user = get_data($con, 'users', 'id', $u)['username'];
    $header = 'user-det.php?u='.complex_para($u);
}else{
    $header = $_SERVER["PHP_SELF"].'?a='.$a;
}

if(isset($a)){
if($a == 1){
   reward($con,'Bonus',$header); 
   $bsub = 1;
   $pagetitle= 'Bonus';
}

if($a == 2){
   reward($con,'Penalty',$header); 
   $bsub = 2;
   $pagetitle= 'Penalty';
}
}else{
   reward($con,'Bonus',$_SERVER["PHP_SELF"].'?a=1'); 
   $bsub = 1;
   $pagetitle= 'Bonus';
}



$activemenu=7;

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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white">Send <?php echo $pagetitle;?> <?php if(validate_input_length($bonus_user, 1)){ echo 'To '.$bonus_user;}?></h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Username</label>
                                                <input type="text" class="form-control" name="name" placeholder="Username" value="<?php echo $bonus_user;?>" <?php if(validate_input_length($bonus_user, 1)){ echo 'readonly';}?>>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Amount</label>
                                                <input type="number" class="form-control" name="amount" placeholder="0000">
                                            </div>
                                            </div>
                                            <div class="col-md-12">    
                                                <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox1" value="1" name="show_bonus" checked type="checkbox">
                                                    <label for="checkbox1">
                                                        Show on User Transaction Details
                                                    </label>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="reward" class="btn btn-primary waves-effect waves-light">Send <?php echo $pagetitle;?> <?php if(validate_input_length($bonus_user, 1)){ echo 'To '.$bonus_user;}?> </button>
                                            </div>
                                        </form>
                                    </div><!-- card-body -->
                                </div> <!-- card -->
                            </div> <!-- end col -->
                        </div>
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