<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<!--Bootstrap css file-->
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">

		<!-- Favicon -->
			<link rel="shortcut icon" href="images/favicon.ico" />
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Typography CSS -->
		<link rel="stylesheet" href="css/typography.css">
		<!-- Style CSS -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="css/responsive.css">
	</head>
	<body>
		<!-- loader Start -->
		<div id="loading">
			<div id="loading-center">
			</div>
		</div>
      <!-- loader END -->
        <!-- Sign in Start -->
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				require 'process-login.php';
				}
			?>
        <section class="sign-in-page">
          <div id="container-inside">
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
              <div class="cube"></div>
          </div>
            <div class="container p-0">
                <div class="row no-gutters height-self-center">
                  <div class="col-sm-12 align-self-center bg-primary rounded">
                    <div class="row m-0">
                      <div class="col-md-6 bg-white sign-in-page-data">
                          <div class="sign-in-from">
                              <h1 class="mb-0 text-center">Sign in</h1>
                              <p class="text-center text-dark">Enter your email address and password to Sign in.</p>
                              <form class="mt-4" action="login.php" method="post" name="loginform" id="loginform">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Email address</label>
                                      <input type="email" class="form-control mb-0" id="email" name="email" placeholder="Enter email">
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Password</label>
                                      
                                      <input type="password" class="form-control mb-0" id="password" name="password" placeholder="Password">
                                  </div>
                                  
                                  <div class="sign-info text-center">
                                      <button type="submit" class="btn btn-primary d-block w-100 mb-2">Sign in</button>
                                      <span class="text-dark dark-color d-inline-block line-height-2">Don't have an account? <a href="register.php">Sign up</a></span>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <div class="col-md-6 text-center sign-in-page-image">
                          <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="images/logo-full.png" class="img-fluid" alt="logo"></a>
                              <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                  <div class="item">
                                      <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                      <h4 class="mb-1 text-white">Find Financial Services</h4>
                                      <p>It is a long established fact that a good savings is a good way to start investing.</p>
                                  </div>
                                  <div class="item">
                                      <img src="images/login/1.png" class="img-fluid mb-4" alt="logo"> 
                                      <h4 class="mb-1 text-white">Connect with the world</h4>
                                      <p>Get our high quality money management services</p>
                                  </div>
                                  <div class="item">
                                      <img src="images/login/1.png" class="img-fluid mb-4" alt="logo">
                                      <h4 class="mb-1 text-white">Meet new Fiancial advicers</h4>
                                      <p>Get unbiased Fiancial advise</p>
                                  </div>
                              </div>
                          </div>
                      </div>


                    </div>
                  </div>
                </div>
            </div>
        </section>
 
				
			</footer>
		</div> 
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="js/lottie.js"></script>
      <!-- am core JavaScript -->
      <script src="js/core.js"></script>
      <!-- am charts JavaScript -->
      <script src="js/charts.js"></script>
      <!-- am animated JavaScript -->
      <script src="js/animated.js"></script>
      <!-- am kelly JavaScript -->
      <script src="js/kelly.js"></script>
      <!-- am maps JavaScript -->
      <script src="js/maps.js"></script>
      <!-- am worldLow JavaScript -->
      <script src="js/worldLow.js"></script>
      <!-- Style Customizer -->
      <script src="js/style-customizer.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="js/custom.js"></script>
	</body>
</html>