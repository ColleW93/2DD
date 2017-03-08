<?php
$dbc = mysqli_connect('localhost', 'root', '', '2DD');
$dbc->set_charset("utf8");

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2Day Design</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>Tlf.: 53352944</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>E-mail: info@2daydesign.dk</a></li>
							</ul>
						</div>
					</div>
					<div class="topMenu">
						<div class="index-menu pull-right" id="topIcon">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
								<li><a href="Kurv.php"><i class="fa fa-shopping-basket"></i> Kurv</a></li>
								<li><a href="mobilepay.php"><i class="fa fa-credit-card"></i> Til Kassen</a></li>
								
								<?php
									if ( (!(isset($_SESSION["admin"]))==NULL) && !empty($_SESSION['email'])) {
									echo '<li><a href="Lager.php"><i class="fa fa-home"></i>Lager</a> </li>';
									}
									?>

								<?php
									if ( isset($_SESSION["email"])==true) {
									?>
									Welcome <?php echo $_SESSION["name"]; ?>. <li><a href="logout.php" tite="Logout" id="top-logout"><i class="fa fa-sign-out"></i>Logout.</a></li>
									<?php
									}
									else if (!(isset($_SESSION['email']) && $_SESSION['email'] != '')) {
										echo '<li><a href="Login.php"><i class="fa fa-sign-in"></i>Log ind</a> </li>';
									}
									?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle" id="headmid"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo-banner" id="Logo">
							<a href="index.php"><img src="img/2DDLogo.jpg" height="100px;" /></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Forside</a></li>
								<li class="dropdown"><a href="Produkter.php">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="Toej.php">Tøj</a></li> 
						                <li><a href="Varmp.php">Øjen- & Varmepuder</a></li>        
						                <li><a href="Taepper.php">Tæpper</a></li>
						                <li><a href="Boern.php">Børn</a></li> 
						                <li><a href="StofGarn.php">Stof & Garn</a></li> 
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="Markeder-&-Livsstilsmesser.php">Markeder & Livsstilsmesser<i class="fa fa-leaf"></i></a></li> 
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="body"><!--maingreet-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="maingreet">
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>2Day</span>Design</h1>
									
									<p><?php

										$fornavn = $_POST['fornavn'];
										$efternavn = $_POST['efternavn'];
										$email = $_POST['email'];
										$tlf = $_POST['tlf'];
										$adresse = $_POST['adresse'];
										$adresse2 = $_POST['adresse2'];
										$postnummer = $_POST['postnummer'];
										$by = $_POST['by'];


										if (isset($_POST['rbgroup'])) {
										  // Show the radio button value, i.e. which one was checked when the form was sent
										  $levering = $_POST['rbgroup'];

										}

										if (isset($_POST['rbgroup2'])) {
										  // Show the radio button value, i.e. which one was checked when the form was sent
										  $betaling = $_POST['rbgroup2'];

										}

										$produktnavn = $_POST['produktnavn'];
										$antal = $_POST['antal'];
										$produktpris = $_POST['produktpris'];
										$pris = $_POST['pris'];


										echo $fornavn, $efternavn, $email, $tlf, $adresse, $adresse2, $postnummer, $by, $levering, $betaling, $produktnavn, $antal, $produktpris, $pris, $ordreID;
										 
										?> </p>
									<button type="button" class="btn btn-default get">Se Varesortimentet</button>
								</div>
							</div>							
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section><!--/maingreet-->
	
	
	<footer id="footer"><!--Footer-->				
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Handelsbetingelser</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="Bestilling.php">Bestilling</a></li>
								<li><a href="Betaling.php">Betaling</a></li>
								<li><a href="Fortrydelsesret.php">Fortrydelsesret</a></li>
								<li><a href="Levering.php">Levering</a></li>
								<li><a href="Personlige-Oplysninger.php">Personlige Oplysninger</a></li>
								<li><a href="Reklamationsret.php">Reklamationsret</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Om 2DayDesign</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Mærkesager</a></li>
								<li><a href="#">Brands</a></li>
								<li><a href="#">Kontakt</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>	
				</div>
			</div>
		</div>		
	</footer><!--/Footer-->
</body>
</html>

