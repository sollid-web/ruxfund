<?php
$mobileview = 1;
$logged = 1;
$me_menu = 1;
include('../includes/server.php');
include('../includes/functions.php');

if (empty($_SESSION['signup_csrf'])) {
    $_SESSION['signup_csrf'] = bin2hex(random_bytes(32));
}

register($con,$getsite);
$logo_link = 'index.php';
$get_ref = $_GET['ref'] ?? '';
if(isset($get_ref) && !empty($get_ref)){
    $get_ref = $_GET['ref'] ?? '';
}else{
    $get_ref = '';
}

$page = array('id'=>8,'title'=>'Register New Account | '.$getsite['name'].' ','bread'=>'Transfer');



?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign Up | <?php echo ucwords($page['title']);?> | <?php echo ucwords($getsite['name']);?> | Bitcoin Investment | Cryptocurrency Investment</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/theme-1.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet">


    <!-- Favicon -->
    
    <link rel="stylesheet" type="text/css" href="./auth.css">
    <style>
    .ugf-sidebar-bg {
        background-image: linear-gradient(to bottom, rgb(117 127 187 / 52%), rgb(1 44 106)),
            url('../site-images/bitstock-capital-16.jpg') !important;
        background-size: cover;
    }

    .logo_stef {
        width: 340px;
    }

    .logo_stef_2 {
        width: 240px;
    }
    </style>
</head>

<body>

    <div class="ugf-wrapper theme-bg">
        <div class="ugf-content-block">
            <div class="logo">
                <a class="hide_sm_stefan" href="/"><img class="logo_stef" src="../images/logo.png" alt=""></a>
                <a class="hide_lg_stefan" href="/"><img class="logo_stef_2" src="images/logo.png" alt=""></a>
            </div>
            <div class="container-md">
                <div class="row">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="ugf-content pt270 ghehw">
                            <h2>Create an account</h2>
                            <p>Enter your valid details to create your account</p>
                                <?php include '../user/includes/alert.php';?>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div class="form-group">
                                    <label for="inputMail">Username</label>
                                    <input type="text" name="username" placeholder="" required minlength="3"
                                        class="form-control" id="inputMail" autocomplete="username" pattern="[A-Za-z0-9_-]+">
                                </div>
                                <div class="form-group">
                                    <label for="inputMail">Email Address</label>
                                    <input type="email" name="email" placeholder="" required
                                        class="form-control" id="inputMail" autocomplete="email">
                                </div>
                                <div class="form-group">
                                    <label for="inputPass">Password</label>
                                    <input type="password" name="password" placeholder="" required class="form-control"
                                        id="inputPass" autocomplete="new-password" minlength="8">
                                </div>
                                <div class="form-group">
                                    <label for="inputPass">Confirm Password</label>
                                    <input type="password" name="password2" placeholder="" required class="form-control"
                                        id="inputPass" autocomplete="new-password" minlength="8">
                                </div>
                                <div class="form-group">
                                    <label for="inputMail">Referral Username(Optional)</label>
                                    <input type="text" name="ref" value="<?php echo isset($_GET['ref']) ? htmlspecialchars($_GET['ref']) : ''; ?>" placeholder=""
                                        class="form-control" id="inputMail" autocomplete="username">
                                </div>
                                <input type="hidden" name="signup_csrf" value="<?php echo htmlspecialchars($_SESSION['signup_csrf']); ?>">
                                <button class="btn" name="create" type="submit">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alternet-access">
                <p>Already hae an account? <a href="login.php">Log in now!</a></p>
                 <p><a href="../index.php">Back To Home</a></p>
            </div>
        </div>
        <div class="ugf-sidebar flex-bottom ugf-sidebar-bg">
            <div class="testimonial-carousel owl-carousel">
                <div class="item">
                    <div class="quote">
                        <img src="images/quote.png" alt="">
                    </div>
                    <p>“I do think Bitcoin is the first [encrypted money] that has the potential to do something like change the world.”</p>
                    <h5 class="name">Peter Thiel</h5>
                    <span class="designation">Co-founder of PayPal</span>
                </div>
                <div class="item">
                    <div class="quote">
                        <img src="images/quote.png" alt="">
                    </div>
                    <p>"Bitcoin is a remarkable cryptographic achievement and the ability to create something that is not duplicable in the digital world has enormous value."</p>
                    <h5 class="name">Eric Schmidt</h5>
                    <span class="designation">CEO, Google (2001 - 2011)</span>
                </div>
                <div class="item">
                    <div class="quote">
                        <img src="images/quote.png" alt="">
                    </div>
                    <p>"Every informed person needs to know about Bitcoin because it might be one of the world’s most important developments."</p>
                    <h5 class="name">Leon Louw</h5>
                    <span class="designation">Two-time Nobel Peace Prize nominee</span>
                </div>
            </div>
            <div class="clients">
                <div class="client">
                    <img src="../site-images/logos/coinone-1.svg" class="img-fluid" alt="">
                </div>
                <div class="client">
                    <img src="../site-images/logos/waves-6.svg" class="img-fluid" alt="">
                </div>
                <div class="client">
                    <img src="../site-images/logos/bbva-2019.svg" class="img-fluid" alt="">
                </div>
                <div class="client">
                    <img src="../site-images/logos/pay-pro.svg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="js/custom.js"></script>
</body>

</html>