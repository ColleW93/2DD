<?php

$dbc = mysqli_connect('localhost', 'root', '', '2DD');

$ordreID = $_POST['ordreID'];
$afsluttet = $_POST['afsluttet'];


	if (!$dbc) 
		{
	    	die("Connection failed: " . mysqli_connect_error());
		}

	$sql = "UPDATE ordrer SET afsluttet='$afsluttet' WHERE ordreID='$ordreID'";
			

	if (mysqli_query($dbc, $sql)) 
		{
	    	echo "New record created successfully";
		} else {
	    	echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
	}

	mysqli_close($dbc);

header("Location:Bestillinger.php");
 
?>