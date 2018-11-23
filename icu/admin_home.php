<?php
  if (!session_id()) {
    session_start();
  }
  include 'db.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Patient Home</title>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="Slicebox - 3D Image Slider with Fallback" />
	<meta name="keywords" content="jquery, css3, 3d, webkit, fallback, slider, css3, 3d transforms, slices, rotate, box, automatic" />
	<meta name="author" content="Pedro Botelho for Codrops" />
	<link rel="shortcut icon" href="../favicon.ico"> 
	<link rel="stylesheet" type="text/css" href="assets/css/demo.css" />
	
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/slicebox.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
	<link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="assets/js/modernizr.custom.46884.js"></script>
</head>
<body>
	<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
		<div class="container"><img src="assets/img/logo.jpg" style="width:128px;height:60px;" />
			<div class="collapse navbar-collapse" id="navcol-1">
				<ul class="nav navbar-nav ml-auto">
					<li role="presentation" class="nav-item"><a href="admin_home.php" class="nav-link">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" id="dropdown-btn" style="padding-left:16px;padding-right:16px;">Modifier</a>
						<div class="dropdown-menu" role="menu">
							<a class="dropdown-item" role="presentation" href="doctor.php">Doctor</a>
							<a class="dropdown-item" role="presentation" href="admin_nurse.php">Admin/Nurse</a>
						</div>
					</li>
					<li role="presentation" class="nav-item"><a href="login.php" class="nav-link active">LogOut</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<main class="page login-page">
		<section class="clean-block clean-form dark">
			<div class="container">

				<div class="block-heading">

					<div class="wrapper">

						<ul id="sb-slider" class="sb-slider">
							<li>
								<a href="http://www.flickr.com/photos/strupler/2969141180" target="_blank"><img src="assets/img/1.png" alt="image1"/></a>
								<div class="sb-description">
									<h3>Critical Care</h3>
								</div>
							</li>
							<li>
								<a href="http://www.flickr.com/photos/strupler/2968268187" target="_blank"><img src="assets/img/2.jpg" alt="image2"/></a>
								<div class="sb-description">
									<h3>Intensive Care Unit</h3>
								</div>
							</li>
							<li>
								<a href="http://www.flickr.com/photos/strupler/2968114825" target="_blank"><img src="assets/img/3.jpg" alt="image1"/></a>
								<div class="sb-description">
									<h3>Monitor System</h3>
								</div>
							</li>
							<!--<li>
								<a href="http://www.flickr.com/photos/strupler/2968122059" target="_blank"><img src="assets/img/4.jpg" alt="image1"/></a>
								<div class="sb-description">
									<h3>Affectionate Decision Maker</h3>
								</div>
							</li>
							<li>
								<a href="http://www.flickr.com/photos/strupler/2969119944" target="_blank"><img src="assets/img/5.jpg" alt="image1"/></a>
								<div class="sb-description">
									<h3>Faithful Investor</h3>
								</div>
							</li>
							<li>
								<a href="http://www.flickr.com/photos/strupler/2968126177" target="_blank"><img src="assets/img/6.jpg" alt="image1"/></a>
								<div class="sb-description">
									<h3>Groundbreaking Artist</h3>
								</div>
							</li>
							<li>
								<a href="http://www.flickr.com/photos/strupler/2968945158" target="_blank"><img src="assets/img/7.jpg" alt="image1"/></a>
								<div class="sb-description">
									<h3>Selfless Philantropist</h3>
								</div>
							</li>-->
						</ul>

						<div id="shadow" class="shadow-img"></div>

						<div id="nav-arrows" class="nav-arrows">
							<a href="#">Next</a>
							<a href="#">Previous</a>
						</div>

						<div id="nav-options" class="nav-options">
							<span id="navPlay">Play</span>
							<span id="navPause">Pause</span>
						</div>

					</div><!-- /wrapper -->

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

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.slicebox.js"></script>
	<script type="text/javascript">
		$(function() {

			var Page = (function() {

				var $navArrows = $( '#nav-arrows' ).hide(),
				$navOptions = $( '#nav-options' ).hide(),
				$shadow = $( '#shadow' ).hide(),
				slicebox = $( '#sb-slider' ).slicebox( {
					onReady : function() {

						$navArrows.show();
					//$navOptions.show();
					$shadow.show();

				},
				orientation : 'h',
				cuboidsCount : 3
			} ),

				init = function() {

					initEvents();

				},
				initEvents = function() {

							// add navigation events
							slicebox.play();
							$navArrows.children( ':first' ).on( 'click', function() {

								slicebox.next();
								return false;

							} );

							$navArrows.children( ':last' ).on( 'click', function() {
								
								slicebox.previous();
								return false;

							} );

							$( '#navPlay' ).on( 'click', function() {
								
								slicebox.play();
								return false;

							} );

							$( '#navPause' ).on( 'click', function() {
								
								slicebox.pause();
								return false;

							} );

						};

						return { init : init };

					})();

					Page.init();

				});
			</script>

		</body>
		</html>	