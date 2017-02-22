<?php

	$dbc = mysqli_connect('localhost', 'root', '', '2DD');


	function altTøj()
	{
		$query = mysqli_query($dbc, "SELECT * FROM toj");

		while ($row = mysqlI_fetch_array($query)) {
                           
            echo '<div class="col-sm-4"><div class="productinfo text-center">'.$row['category'].'<ol><img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" height="200px" width="200px"/>
											<h2>'.$row['price'].'</h2>
											<p>'.$row['name'].'</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</img></ol></div></div>';
             
           }
	}

?>