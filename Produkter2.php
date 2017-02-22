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
								<li><a href="#"><i class="fa fa-phone"></i> +Ninette tlf</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> Ninette@2DayDesign.dk</a></li>
							</ul>
						</div>
					</div>
					<div class="topMenu">
						<div class="index-menu pull-right" id="topIcon">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
								<li><a href="#"><i class="fa fa-shopping-cart"></i> Indkøbsvogn</a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i> Til Kassen</a></li>
								
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
							<a href="index.html"><img src="img/2DDLogo.jpg" height="100px;" /></a>
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
                                    
						                 <?php 
						                    $result=mysqli_query($dbc, "SELECT category, link FROM products WHERE link IS NOT NULL;");
						                    while ($row = mysqli_fetch_array($result)) { 
  
  											echo '<li><a href="' . $row['link'] . '">'.$row['category'].'</a></li>'; 
						                       }
						                ?>
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


	
	<section onload="mainQuery()">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<form name="form" method="post" action="produkter.php" id="catInput">
											<input type="submit" name="submit1" value="Tøj"></input>
										</form>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<form name="form" method="post" action="produkter.php" id="catInput">
											<input type="submit" name="submit2" value="Øjen- & Varmepuder"></input>
										</form>
									</h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<form name="form" method="post" action="produkter.php" id="catInput">
											<input type="submit" name="submit3" value="Tæpper & Plaider"></input>
										</form>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<form name="form" method="post" action="produkter.php" id="catInput">
											<input type="submit" name="submit4" value="Børn"></input>
										</form>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<form name="form" method="post" action="produkter.php" id="catInput">
											<input type="submit" name="submit5" value="Stof & Garn"></input>
										</form>
									</h4>
								</div>
							</div>
						</div><!--/category-products-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sortiment</h2>

							<?php
								$queryMain = mysqli_query($dbc, "SELECT * FROM products WHERE link IS NOT NULL");
								$query1 = mysqli_query($dbc, "SELECT * FROM products WHERE link IS NULL AND catID = 1");
								$query2 = mysqli_query($dbc, "SELECT * FROM products WHERE link IS NULL AND catID = 2");
								$query3 = mysqli_query($dbc, "SELECT * FROM products WHERE link IS NULL AND catID = 3");
								$query4 = mysqli_query($dbc, "SELECT * FROM products WHERE link IS NULL AND catID = 4");
								$query5 = mysqli_query($dbc, "SELECT * FROM products WHERE link IS NULL AND catID = 5");
							?>


							<!-- TØJ QUERY -->


				            <?php

				           
					            if (isset($_POST['submit1'])) {
					            	
					            	while ($row = mysqlI_fetch_array($query1)) 
					            	{
					            	?>  
						    <div class="col-md-4">  
			                    <form method="post" action="produkter.php?action=add&id=<?php echo $row["ID"]; ?>">  
			                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
		                       		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Billede'] ).'" height="200px" width="200px"/> '?>
	                                <br />  
	                                <h4 class="text-info"><?php echo $row["Navn"]; ?></h4>  
	                                <h4 class="text-danger">$ <?php echo $row["Pris"]; ?></h4>  
	                                <input type="text" name="quantity" class="form-control" value="1" />  
	                                <input type="hidden" name="hidden_name" value="<?php echo $row["Navn"]; ?>" />  
	                                <input type="hidden" name="hidden_price" value="<?php echo $row["Pris"]; ?>" />  
	                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
		                           </div>  
			                    </form>  
			                </div> 
			                <?php
			                	}
			            	}
			                ?> 

			                <!-- ØJEN & VARMEPUDE QUERY -->
 
								<?php
								if (isset($_POST['submit2'])) {
					            	
					            	while ($row = mysqlI_fetch_array($query2)) 
					            	{
					            	?>  
						        <div class="col-md-4">  
			                    <form method="post" action="produkter.php?action=add&id=<?php echo $row["ID"]; ?>">  
			                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
		                       		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Billede'] ).'" height="200px" width="200px"/> '?>
	                                <br />  
	                                <h4 class="text-info"><?php echo $row["Navn"]; ?></h4>  
	                                <h4 class="text-danger">$ <?php echo $row["Pris"]; ?></h4>  
	                                <input type="text" name="quantity" class="form-control" value="1" />  
	                                <input type="hidden" name="hidden_name" value="<?php echo $row["Navn"]; ?>" />  
	                                <input type="hidden" name="hidden_price" value="<?php echo $row["Pris"]; ?>" />  
	                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
		                           </div>  
			                    </form>  
			                </div>
			                <?php
			                	}
			            	}
			                ?>  
						           

						    <!-- TÆPPE QUERY -->


								<?php
								if (isset($_POST['submit3'])) {
					            	
					            	while ($row = mysqlI_fetch_array($query3)) 
					            	{
					            	?>  
						        <div class="col-md-4">  
			                    <form method="post" action="produkter.php?action=add&id=<?php echo $row["ID"]; ?>">  
			                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
		                       		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Billede'] ).'" height="200px" width="200px"/> '?>
	                                <br />  
	                                <h4 class="text-info"><?php echo $row["Navn"]; ?></h4>  
	                                <h4 class="text-danger">$ <?php echo $row["Pris"]; ?></h4>  
	                                <input type="text" name="quantity" class="form-control" value="1" />  
	                                <input type="hidden" name="hidden_name" value="<?php echo $row["Navn"]; ?>" />  
	                                <input type="hidden" name="hidden_price" value="<?php echo $row["Pris"]; ?>" />  
	                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
		                           </div>  
			                    </form>  
			                </div> 
						    <?php
			                	}
			            	}
			                ?>        
							
			                <!-- BØRN QUERY -->

								<?php
								if (isset($_POST['submit4'])) {
					            	
					            	while ($row = mysqlI_fetch_array($query4)) 
					            	{
					            	?>  
						        <div class="col-md-4">  
			                    <form method="post" action="produkter.php?action=add&id=<?php echo $row["ID"]; ?>">  
			                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
		                       		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Billede'] ).'" height="200px" width="200px"/> '?>
	                                <br />  
	                                <h4 class="text-info"><?php echo $row["Navn"]; ?></h4>  
	                                <h4 class="text-danger">$ <?php echo $row["Pris"]; ?></h4>  
	                                <input type="text" name="quantity" class="form-control" value="1" />  
	                                <input type="hidden" name="hidden_name" value="<?php echo $row["Navn"]; ?>" />  
	                                <input type="hidden" name="hidden_price" value="<?php echo $row["Pris"]; ?>" />  
	                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
		                           </div>  
			                    </form>  
			                </div> 
						    <?php
			                	}
			            	}
			                ?>         
							
			                <!-- STOF & GARN QUERY -->

								<?php
								if (isset($_POST['submit5'])) {
					            	
					            	while ($row = mysqlI_fetch_array($query5)) 
					            	{
					            	?>  
						        <div class="col-md-4">  
			                    <form method="post" action="produkter.php?action=add&id=<?php echo $row["ID"]; ?>">  
			                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
		                       		<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Billede'] ).'" height="200px" width="200px"/> '?>
	                                <br />  
	                                <h4 class="text-info"><?php echo $row["Navn"]; ?></h4>  
	                                <h4 class="text-danger">$ <?php echo $row["Pris"]; ?></h4>  
	                                <input type="text" name="quantity" class="form-control" value="1" />  
	                                <input type="hidden" name="hidden_name" value="<?php echo $row["Navn"]; ?>" />  
	                                <input type="hidden" name="hidden_price" value="<?php echo $row["Pris"]; ?>" />  
	                                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
		                           </div>  
			                    </form>  
			                </div> 
						    <?php
			                	}
			            	}
			                ?>       
								

				            <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
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
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br /> 
					</div><!--features_items-->
				</div>
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
								<li><a href="#">Bestilling</a></li>
								<li><a href="#">Betaling</a></li>
								<li><a href="#">Fortrydelsesret</a></li>
								<li><a href="#">Levering</a></li>
								<li><a href="#">Personlige Oplysninger</a></li>
								<li><a href="#">Reklamationsret</a></li>
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
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © Nicole's PHP Assignment Autumn 2016.</p>
				</div>
			</div>
		</div>		
	</footer><!--/Footer-->
</body>
</html>