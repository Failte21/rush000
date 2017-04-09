<?php
	include("../includes/header.php");

	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}
	$query = "INSERT INTO produit (nom, prix, image) VALUES ('" . $_POST['name'] . "', " . $_POST['price'] . ", '" . $_POST['img'] . "');";
	if ($_POST['name'] && $_POST['price'])
	{
		if (mysqli_query($db, $query) === TRUE)
			echo "Product ADDED\n";
		else
			echo "Failed\n";
	}
?>