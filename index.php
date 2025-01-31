<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="/assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="/assets/style.css">
		
		<!--[if lt IE 9]>
        <script src="assets/js/ie-support/html5.js"></script>
        <script src="assets/js/ie-support/html5.js"></script>
        <![endif]-->

	</head>


	<body>
		

		<div id="site-content">
			<header class="site-header">
				<div class="container">
					<a href="/index.php" id="branding">
						<img src="/assets/images/logo.png" alt="" class="logo">
						<div class="logo-copy">
							<h1 class="site-title">plus2</h1>
							<small class="site-description">Cinema plus 2</small>
						</div>
					</a> <!-- #branding -->

					<div class="main-navigation">
						<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
						<ul class="menu">
							<li class="menu-item current-menu-item"><a href="/index.php">Aceuill</a></li>
							<li class="menu-item"><a href="/vue/about.html">Notre cinéma</a></li>
							<li class="menu-item"><a href="/vue/review.html">Reviews de Films</a></li>
							<li class="menu-item"><a href="/vue/contact.html">Contact</a></li>
							<li class="menu-item"><a href="../Section%20Client/Connexion/Connexion.html">Compte</a></li>
							<li class="menu-item"><a href="/LesTetard93/Réservation/Reservation.html">Réservation</a></li>
							<?php    if ($_SESSION['role']== 'admin')
                                echo '<li class="menu-item"><a href="/LesTetard93/Section%20Admin/Espace%20Admin/IndexAdmin.php">Admin</a></li>' ?>
						</ul> <!-- .menu -->

						<form action="#" class="search-form">
							<input type="text" placeholder="Search...">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div> <!-- .main-navigation -->

					<div class="mobile-navigation"></div>
				</div>
			</header>
			<main class="main-content">
				<div class="container">
					<div class="page">
						<div class="row">
							<div class="col-md-9">
								<div class="slider">
									<ul class="slides">
										<li><a href="#"><img src="/assets/dummy/slide-1.jpg" alt="Slide 1"></a></li>
										<li><a href="#"><img src="/assets/dummy/slide-2.jpg" alt="Slide 2"></a></li>
										<li><a href="#"><img src="/assets/dummy/slide-3.jpg" alt="Slide 3"></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row">
									<div class="col-sm-6 col-md-12">
										<div class="latest-movie">
											<a href="#"><img src="/assets/dummy/thumb-1.jpg" alt="Movie 1"></a>
										</div>
									</div>
									<div class="col-sm-6 col-md-12">
										<div class="latest-movie">
											<a href="#"><img src="/assets/dummy/thumb-2.jpg" alt="Movie 2"></a>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- .row -->
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="/assets/dummy/thumb-3.jpg" alt="Movie 3"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="/assets/dummy/thumb-4.jpg" alt="Movie 4"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="/assets/dummy/thumb-5.jpg" alt="Movie 5"></a>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="latest-movie">
									<a href="#"><img src="/assets/dummy/thumb-6.jpg" alt="Movie 6"></a>
								</div>
							</div>
						</div> <!-- .row -->

			</footer>
		</div>
		<!-- Default snippet for navigation -->

		<script src="/assets/js/jquery-1.11.1.min.js"></script>
		<script src="/assets/js/plugins.js"></script>
		<script src="/assets/js/app.js"></script>
		
	</body>

</html>