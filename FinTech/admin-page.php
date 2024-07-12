<?php
	session_start();
	if(!isset($_SESSION['user_level']) || $_SESSION['user_level'] != 1)
	{
		header("Location: login.php");
		exit();
	} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/profile.css">
  
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

	
		<div class="Wrapper" style="margin-top: 30px;">
			
			<div class="iq-sidebar">
				<div class="iq-navbar-logo d-flex justify-content-between">
					<a href="index.php" class="header-logo">
					<img src="images/logo.png" class="img-fluid rounded" alt="">
					<span>FinTech</span>
					</a>
					<div class="iq-menu-bt align-self-center">
						<div class="wrapper-menu">
							<div class="main-circle"><i class="ri-menu-line"></i></div>
							<div class="hover-circle"><i class="ri-close-fill"></i></div>
						</div>
					</div>
				</div>
				<div id="sidebar-scrollbar">
					<nav class="iq-sidebar-menu">
						<ul id="iq-sidebar-toggle" class="iq-menu">
							<li class="active">
							<ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
								
								<?php include 'includes/nav.php'; ?>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="iq-top-navbar">
				<div class="iq-navbar-custom">
					<nav class="navbar navbar-expand-lg navbar-light p-0">
						<div class="iq-menu-bt d-flex align-items-center">
							<div class="wrapper-menu">
								<div class="main-circle"><i class="ri-menu-line"></i></div>
								<div class="hover-circle"><i class="ri-close-fill"></i></div>
							</div>
							<div class="iq-navbar-logo d-flex justify-content-between ml-3">
								<a href="index.html" class="header-logo">
								<img src="images/logo.png" class="img-fluid rounded" alt="">
								<span>FinDash</span>
								</a>
							</div>
						</div>
						
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
						<i class="ri-menu-3-line"></i>
						</button>
					
						<?php include 'includes/admin-header.php';?>
						
					</nav>
				</div>
			</div>

      <div class="content-page">
				<div class="container-fluid">
          <div class="row" style="padding-left: 0px;">
      
        <div class="col-sm-12">
        <h2 class="text-center">Administrator</h2>
        <h3>Project Employees:</h3>
          <?php require 'process-admin-view-users.php'?>
        </div>
          
        </div>
      </div>
    </div>

<footer class="jumbotron text-center row"
style="padding-bottom:1px; padding-top:8px;">
  <?php include('includes/footer.php'); ?>
</footer>
</div>
</body>
</html>
