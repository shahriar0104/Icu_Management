<?php 
    if (!session_id()) {
      # code...
      session_start();
    }
    include 'db.php';
 ?>

 <!DOCTYPE html>
   <html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aldrich">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body><nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><img src="assets/img/logo.jpg" style="width:128px;height:60px;" />
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li role="presentation" class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
                    <li role="presentation" class="nav-item"><a href="about-us.php" class="nav-link">About Us</a></li>
                    <li role="presentation" class="nav-item"><a href="contact-us.php" class="nav-link">Contact Us</a></li>
                    <li role="presentation" class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                    <li role="presentation" class="nav-item"><a href="registration.php" class="nav-link">Register</a></li>
                </ul>
            </div>
    </div>
</nav>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">About Us</h2>
                    <p>Our Experts</p>
                </div>
                <div class="row d-flex flex-row justify-content-center align-items-center">
                    <div class="col-2 col-sm-6 col-lg-1 d-inline-flex d-flex flex-column align-self-center" style="width:32px;height:64px;"><button class="btn btn-primary" type="button" id="arrow-left" style="background-color:rgba(0,123,255,0);font-size:32px;width:64px;height:64px;"><i class="icon ion-ios-arrow-left" style="color:rgb(0,0,0);width:32px;height:64px;"></i></button></div>
                    <div
                        class="col-sm-6 col-lg-3">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/scenery/image5.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Dr. Kibria</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/scenery/image1.jpg">
                        <div class="card-body info">
                            <h4 class="card-title">Dr. X</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/scenery/image4.jpg">
                        <div class="card-body info">
                            <h4 class="card-title">Dr. Z</h4>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-2 col-sm-6 col-lg-1 d-inline-flex d-flex flex-column align-self-center" style="width:32px;height:64px;"><button class="btn btn-primary" type="button" id="arrow-right" style="background-color:rgba(0,123,255,0);"><i class="icon ion-ios-arrow-forward" style="color:rgb(0,0,0);font-size:32px;"></i></button></div>
            </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright Text</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>