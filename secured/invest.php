<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Account Login | BitStock Capital Investments</title>

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
                <a class="hide_sm_stefan" href="/"><img class="logo_stef" src="../site-images/logo-cropped-2.png" alt=""></a>
                <a class="hide_lg_stefan" href="/"><img class="logo_stef_2" src="../site-images/cover__2_-removebg-preview.png" alt=""></a>
            </div>
            <div class="container-md">
                <div class="row">
                    <div class="col-lg-7 offset-lg-5">
                        <div class="ugf-content pt270 ghehw">
                            <h2>Login your account</h2>
                            <p>Enter your valid email address and password to login your account</p>
                                                        <form method="POST">
                                <div class="form-group">
                                    <label for="inputMail">Email Address</label>
                                    <input type="email" name="email" placeholder="example@gmail.com"
                                        class="form-control" id="inputMail">
                                </div>
                                <div class="form-group">
                                    <label for="inputPass">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-control"
                                        id="inputPass">
                                </div>
                                <div class="form-group check-flex mb10">
                                    <div class="custom-checkbox mb10">
                                        <input type="checkbox" class="custom-control-input"
                                            id="customControlValidation1">
                                        <label class="custom-control-label" for="customControlValidation1">Remember
                                            me</label>
                                    </div>
                                    <div class="forget-pass mb10">
                                        <a href="recover-password.php">Forgot password?</a>
                                    </div>
                                </div>
                                <button class="btn">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alternet-access">
                <p>Don't have an account? <a href="register-stepone.php">Sign up now!</a></p>
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