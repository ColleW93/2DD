<?php

$dbc = mysqli_connect('localhost', 'root', '', '2DD');

$catID = $_POST['catID'];
$category = $_POST['category'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$amount = $_POST['amount'];


if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO products (catID, category, link, image, name, price, prodImg, description, prodCount, ID) VALUES ('$catID', '$category', NULL, NULL, '$name', '$price', NULL, '$description', '$amount', NULL)";

if (mysqli_query($dbc, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
}

mysqli_close($dbc);

header("Location:lager.php");
 
?>