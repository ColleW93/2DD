<?php
$dbc = mysqli_connect('localhost', 'root', '', '2DD');
   
 session_start();  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["ID"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="produkter.php"</script>';  
                }  
           }  
      }  
 }  
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
	<link href="css/responsive.css" rel="stylesheet">
	<link href="kasse.css" rel="stylesheet">
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

	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="left-sidebar">
						<h2>Faktureringsinformation</h2>
						<div class="payment-details">
							<div class="panel-delivery">
								<div class="container" id="fakturatabel">
									<form id="fakturaform" name="fakturaform" method="post" action="" style="height: 200px;">
										<div class="col-sm-6" id="column1">
										
												<label for="fornavn" id="fakturalabel">Fornavn <span id="star">*</span></label>
										 
										  		<input  type="text" name="fornavn" id="forminput" >
										  		<br>
										 
										  		<label for="efternavn" id="fakturalabel">Efternavn <span id="star">*</span></label>
										
										  		<input  type="text" name="efternavn"  id="forminput" >
										  		<br>
										 	
										  		<label for="email" id="fakturalabel">E-mail <span id="star">*</span></label>
										
										  		<input  type="text" name="email" id="forminput" >
										  		<br>

										 	
										  		<label for="tlf" id="fakturalabel" ">Telefonnummer <span id="star">*</span></label>
											
										  		<input  type="text" name="tlf" id="forminput">
										  		<br>
										 	
										</div>
										<div class="col-sm-6" id="column2">
										
										  		<label for="adresse" id="fakturalabel">adresse <span id="star">*</span></label>
										 	
										  		<input  type="text" name="adresse" id="forminput">
										 		<br>
										  		<label for="adresse2" id="fakturalabel">Addresse 2</label>
										 	
										  		<input  type="text" name="adresse2" id="forminput">
										 		<br>
										  		<label for="Postnummer" id="fakturalabel">Postnummer <span id="star">*</span></label>
										 	
										  		<input  type="text" name="postnummer" id="forminput">
												 <br>
										  		<label for="By" id="fakturalabel">By <span id="star">*</span></label>
										 	
										  		<input  type="text" name="by" id="forminput">
										 		<br>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

				<div class="row">
				<div class="col-sm-4">
					<div class="left-sidebar">
						<h2>Levering</h2>
						<div class="payment-details">
							<div class="panel-delivery">
								<div class="container">
									<form id ="forsendelse" name="form" method="post" action="">
										<input type="radio" id="rb1" name="rbgroup" value="postdk" checked>
											<label for="rb1">Post Danmark (39,00 DKK)</label><br>
										
										<input type="radio" id="rb2" name="rbgroup" value="afhentning">
											<label for="rb2">Afhentning i 2daydesign.dk butikken efter aftale (0,00 DKK)</label><br>
										<p id="adresse">2daydesign.dk, Lars Hansensvej 3, 3600 Frederikssund  </p>										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="left-sidebar">
						<h2>Betaling</h2>
						<div class="payment-details">
							<div class="panel-delivery">
								<div class="container">
									<form id ="betaling" name="form" method="post" action="">
										<input type="radio" id="rb2" name="rbgroup2" value="mobilepay">
											<label for="rb2">Mobile Pay</label><br>							
										<input type="radio" id="rb3" name="rbgroup2" value="bank">
											<label for="rb3">Bankoverførelse</label>
										<p id="bank">Nordea || Reg. 1345 || kontornr. 4386556925 </p>	
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="left-sidebar">
						<h2>Ordre</h2>
						<div class="payment-details">
							<div class="panel-delivery">
								<div class="container">
									<div class="table-responsive">
										<form id="ordreform" name="form" method="post" action="">
						                     <table class="table table-bordered">  
						                          <tr>  
						                               <th width="40%">Produkt</th>  
						                               <th width="10%">Antal</th>  
						                               <th width="20%">Pris</th>  
						                               <th width="15%">Total</th>  
						                                 
						                          </tr>  
						                          <?php   
						                          if(!empty($_SESSION["shopping_cart"]))  
						                          {  
						                               $total = 0;  
						                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
						                               {  
						                          ?>  
						                          <tr>  
						                               <td><?php echo $values["item_name"]; ?></td>  
						                               <td><?php echo $values["item_quantity"]; ?></td>  
						                               <td><?php echo $values["item_price"]; ?> Kr,-</td>  
						                               <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?> Kr,-</td>  
						                               
						                          </tr>  
						                          <?php  
						                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
						                               }  
						                          ?>  
						                          <tr>  
						                               <td colspan="3" align="right">Total</td>  
						                               <td align="right"><?php echo number_format($total, 2); ?> Kr,-</td>  
						                               <td></td>
						                          </tr>  
						                          <?php  
						                          }  
						                          ?>

						                     	<input type="hidden" name="produktnavn" value="<?php echo $values["item_name"]; ?>" />
						                     	<input type="hidden" name="antal" value="<?php echo $values["item_quantity"]; ?>" />
						                     	<input type="hidden" name="produktpris" value="<?php echo $values["item_price"]; ?>" />
						                     	<input type="hidden" name="pris" value="<?php echo $total; ?>" />
						                     </table>
						                </form>
			                		</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<script> 

				submitForms = function()
				{
			    	document.getElementById("fakturaform").submit();
			    	document.getElementById("forsendelse").submit();
			    	document.getElementById("betaling").submit();
			    	document.getElementById("ordreform").submit();
				} 
				</script>
				<div class="payment-details">
					<div class="panel-delivery">
						<div class="container">
							<input type="button" name="submitforms" value="Send Ordre" onclick="submitForms()" formaction="testordre.php" />
						</div>
					</div>
				</div>
				<!--<script language="JavaScript">
					var frmvalidator  = new Validator("fakturaform");
					frmvalidator.addValidation("fornavn","req","Fornavn skal udfyldes");
					frmvalidator.addValidation("efternavn","req","Efternavn skal udfyldes"); 
					frmvalidator.addValidation("email","req","E-mail skal udfyldes"); 
					frmvalidator.addValidation("email","email","Please enter a valid email address"); 
					frmvalidator.addValidation("email","email");
					frmvalidator.addValidation("tlf","maxlen=8");
					frmvalidator.addValidation("tlf","numeric");
					frmvalidator.addValidation("adresse","maxlen=50");
					frmvalidator.addValidation("adresse","req", "Adresse skal udfyldes");
					frmvalidator.addValidation("postnummer","req", "Postnummer skal udfyldes");
					frmvalidator.addValidation("postnummer","numeric");
					frmvalidator.addValidation("postnummer","maxlen=4");
					frmvalidator.addValidation("by","req","By skal udfyldes");
					frmvalidator.addValidation("by","alpha");
				</script>-->
			</div>
		</div>
	</section>
	
	
	
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