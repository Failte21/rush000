<?php
	include("../includes/header.php");

	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}

	if ($_POST['name'] && $_POST['price'])
	{
		$query = "SELECT id FROM produit WHERE nom='".$_POST['name']."';";
		$sql = mysqli_query($db, $query);
	 	$product = mysqli_fetch_assoc($sql);
	 	if (count($product) > 0)
	 	{
			$query = "UPDATE produit SET prix=" . $_POST['price'] . " WHERE nom='" . $_POST['name'] . "'";
			if (mysqli_query($db, $query) === TRUE)
				echo "Price Updated.\n";
		}
		else
			echo "Product does not exist.\n";
	}
	mysqli_free_result($sql);
?>