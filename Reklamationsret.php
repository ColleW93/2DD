<?php
$dbc = mysqli_connect('localhost', 'root', '', '2DD');

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
	<!--<link href="css/main.css" rel="stylesheet">-->
	<link href="Infoside.css" rel="stylesheet">
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
								<li><a href="Kasse.php"><i class="fa fa-credit-card"></i> Til Kassen</a></li>
								
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
                                <li class="dropdown"><a href="#">Markeder & Livsstilsmesser<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
	                                 	<li>
	                                 		<ol><a href=>Forår 2017</a></ol>
	                                 	</li>
	                                 	<li>
	                                 		<ol><a href=>Sommer 2017</a></ol>
	                                 	</li>
	                                 	<li>
	                                 		<ol><a href=>Efterår 2017</a></ol>
	                                 	</li>
	                                 	<li>
	                                 		<ol><a href=>Vinter 2017</a></ol>
	                                 	</li>						                					
                                    </ul>
                                </li> 
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
								<div class="col-sm-9">
									<h1><Span>REKLAMATIONSRET</Span></h1>


									<p>2daydesign.dk yder 2 års reklamationsret i henhold til købeloven, omfattende fabrikations- og materialefejl, der konstateres ved varens normale anvendelse. Reklamationsretten dækker ikke fejl, skader eller slitage, direkte eller indirekte opstået som følge af forkert betjening, ringe vedligeholdelse, vold eller uautoriserede indgreb. Reklamation over fejl og mangler, som bør opdages ved sædvanlig undersøgelse af varen, skal meddeles 2daydesign.dk indenfor rimelig tid. Varen kan efterfølgende returneres for reparation, ombytning eller efter aftale evt. kreditering. I forbindelse med reklamationssager afholder 2daydesign.dk returneringsomkostninger i rimeligt omfang. 
									<br>
									Du har som forbruger 14 dage til at meddele 2daydesign.dk, at du fortryder købet og herefter 14 dage til at sende den retur. Du kan fortryde et køb, selvom varen er blevet brugt.
									En vare er kun brugt, hvis den bruges ud over, hvad der er muligt ved at afprøve varen i en fysisk butik.
									Hvis varen er brugt, skal der laves en konkret vurdering af, hvad varen som brugt kan sælges for til en anden forbruger. En evt. værdiforringelse skal forbrugeren ikke have retur.</p>

									<h2 id="infosection">Reklamation og varereturnering</h2> 
									<p>Ved fejl, mangler eller evt. udeblevne leverancer bedes henvendelse rettet til: </p><br><br>

									<ul>
										<li>
									<p id="Addresse">2daydesign.dk <br>
									Lars Hansensvej 3 <br>
									3600 Frederikssund <br>
									E-mail: info@2daydesign.dk </p> <br>
										</li>
									</ul>

									<br>
									<p>Varereturnering foregår også til denne adresse - bemærk at vi ikke modtager pakker sendt pr. efterkrav. Returnering kan også ske ved at nægte modtagelse eller aflevere varen personligt hos os. Det er ikke et krav men ekspeditionen fremmes, hvis fyldestgørende informationer følger pakken - eksempelvis kopi af ordrebekræftelse, registreringsnummer og kontonummer for bankkonto hvortil refusion kan foregå, kopi af evt. forudgående korrespondance mv.</p> 

									<h2  id="infosection">Refusion</h2>
									<p>I tilfælde af aftalte dekorter, returnerede varer eller forudbetalte varer som afbestilles før afsendelse, skal der ske en hel eller delvis refusion af købesummen. Refusion sker normalt altid ved bankoverførsel, og 2daydesign.dk har derfor brug for oplysninger om registreringsnummer og kontonummer for din bankkonto. Disse oplysninger er ikke følsomme, og kan uden videre oplyses pr. email eller anden traditionel korrespondanceform.</p>
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