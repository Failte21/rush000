<?php
	include("../includes/header.php");

	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}

	$name = mysqli_real_escape_string($db, htmlentities($_POST["name"]));
	$price = mysqli_real_escape_string($db, htmlentities($_POST["price"]));
	if ($name && $price)
	{
		$query = "SELECT id FROM produit WHERE nom='".$name."';";
		$sql = mysqli_query($db, $query);
	 	$product = mysqli_fetch_assoc($sql);
	 	if (count($product) > 0)
	 	{
			$query = "UPDATE produit SET prix=" . $price . " WHERE nom='" . $name . "'";
			if (mysqli_query($db, $query) === TRUE)
				echo "Price Updated.\n";
		}
		else
			echo "Product does not exist.\n";
	}
?>