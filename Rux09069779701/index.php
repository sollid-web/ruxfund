<?php
include('../includes/server.php');
include('../includes/functions.php');

$getadmin=get_data($con,'flow','id',1);

if(isset($_POST["log_ad"])){
$username= test_input($_POST["username"]);
$password= test_input($_POST["password"]);
$code= test_input($_POST["code"]);
$_SESSION['info']['info'] = 1;

if(empty($username) || empty($password)){
 $_SESSION["info"]['info']='Login Failed, invalid input.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);   
}

if(validate_password($password) === FALSE){
   $_SESSION["info"]['info']='Login Failed, invalid input.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]); 
}

if(strlen($password) < 5){
    $_SESSION["info"]['info']='Login Failed, password must be at least 5 characters.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
}

if(strlen($password) > 12){
    $_SESSION["info"]['info']='Login Failed, password must be less than 12 characters.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);
}

if(validate_username($username) === FALSE){
   $_SESSION["info"]['info']='Login Failed, invalid input.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]); 
}

if(!$getadmin || !hash_equals((string) $getadmin['code'], (string) clean_complex_para($code))){
   $_SESSION["info"]['info']= 'Login Failed, invalid security code.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]); 
}

if($_SESSION['info']['info'] === 1){
 
	 if($getadmin['username'] === md5($username) && $getadmin['password'] === md5($password)){
	  session_regenerate_id();
	  $_SESSION['admin_auth'] = hash('sha256', (string) $getadmin['code'].'|'.(string) $getadmin['password']);
	  setcookie('rux_admin', admin_session_token($getadmin), [
	      'expires' => time() + 28800,
	      'path' => '/',
	      'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
	      'httponly' => true,
	      'samesite' => 'Lax',
	  ]);
	  $_SESSION["info"]['info']='Welcome to control panel.';
  $_SESSION["time"]=time();
  $_SESSION["theme"]="alert-success";
  header('location: flower.php');   
 }else{
  $_SESSION["info"]['info']='Login Failed, invalid input.';
                $_SESSION["time"]=time();
                $_SESSION["theme"]="alert-warning";
                header('location: '.$_SERVER["PHP_SELF"]);   
 }
}
}

$activemenu=1;
$pagetitle= 'Admin Login';
?>

<html lang="en">
    <?php include 'includes/head.php';?>
    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
            
            <div class="m-t-40">
                <!-- Start content -->
                <div class="m-t-40">
                    <div class="container">

                        <!-- Page-Title -->
                        

                        <div class="row m-t-40">
                            <div class="col-md-4"></div>
                            <div class="col-md-4 m-t-40">
                                <div class="card">
                                    <div class="card-header bg-primary"><h3 class="text-white card-title">Login to Admin</h3></div>
                                    <div class="card-body text-center">
                                        <?php include 'includes/welcome.php';;?>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="current-password">
                                            </div>
                                            <input type="hidden" name="code" value="<?php echo complex_para($getadmin['code'])?>">
                                            <button type="submit" name="log_ad" class="btn btn-primary waves-effect waves-light">Login</button>
                                            
                                        </form>
                                    </div><!-- card-body -->
                                </div>
                            </div>
                             <div class="col-md-4"></div>
                        </div>  <!-- End Row -->


                        <!-- End Row -->



                        <!-- End Row -->


                         <!-- End Row -->


                        <!-- End Row -->


                    </div> <!-- container-fluid -->
                               
                </div> <!-- content -->

                

            </div>
            
            </div>
        <!-- END wrapper -->

        <?php include 'includes/script.php';?>

    
    </body>
</html>
