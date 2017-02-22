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
								<div class="col-sm-9">
									<h1><Span>PERSONLIGE OPLYSNINGER</Span></h1>


									<p>Ingen personlige oplysninger der registreres på 2daydesign.dk, bliver på noget tidspunkt overdraget, solgt eller gjort tilgængelige for tredjemand. Alle informationer opbevares på betryggende vis, og er kun tilgængelige for betroede medarbejdere hos 2daydesign.dk. 
									<br><br>
									I forbindelse med evt. elektronisk betaling bruges en sikker krypteret metode gennem Webshopsystemet. Det er godkendt udbyder med godkendelse fra E-mærket. 
									Shopsystemet anvender såkaldte cookies til styring af indholdet i indkøbsvognen. En cookie er blot betegnelsen for en fil som gemmes på din egen PC. Det er desuden muligt at bede systemet gemme egne adresseoplysninger til næste besøg . Ønsker man på et senere tidspunkt at slette disse informationer, kan dette ske via browserindstillingerne. I Internet Explorer sker det eksempelvis via menuen "Funktioner" og menupunktet "Internetindstillinger". 
									<br><br>
									Under et køb udbeder vi os navn, adresse, telefonnummer og emailadresse. Disse informationer bruges udelukkende til behandling af ordren. Informationerne transmitteres og lagres elektronisk på ukrypteret form, og gemmes i 5 år. Selve "kontrakten" (købsaftalen) lagres ikke hos 2daydesign.dk på en måde, så du senere kan logge dig ind og se/ændre status. 
									<br><br>
									Desuden registrerer vi IP-adressen hvorfra evt. køb foretages. Informationen finder normalt ingen anvendelse, men kan bruges i en evt. politiefterforskning. Alle falske bestillinger politianmeldes! 
									Man kan desuden valgfrit få sin emailadresse optaget på en mailingliste hos 2daydesign.dk, således at man løbende modtager nyheder og anden information fra 2daydesign.dk. Denne service kan til enhver tid tilmeldes og frameldes som man ønsker. 
									<br><br>
									Jvf. persondataloven oplyser vi på forespørgsel om registrerede oplysninger og på baggrund af evt. indsigelser foretager vi sletning i det omfang det ønskes.
									<br><br>
									Levering til Bornholm og visse småøer er ikke omfattet af Post Danmarks målsætning om dag-til-dag levering, idet forsendelser til disse område i nogle tilfælde kan vare 2 dage. 2daydesign.dk tager altid udgangspunkt i dag-til-dag levering. Som afsender kan du evt. vælge leveringsdatoen én dag tidligere for at kompensere for dette. 
									<br><br>
									</p>
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