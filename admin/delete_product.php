<?php
	include("../includes/header.php");

	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}

	$name = mysqli_real_escape_string($db, htmlentities($_POST["name"]));
	if ($name)
	{
		$query = "SELECT id FROM produit WHERE nom='".$name."';";
		$sql = mysqli_query($db, $query);
	 	$product_id = mysqli_fetch_assoc($sql);
	 	if (count($product_id) > 0)
	 	{
			$query1 = "DELETE FROM categorie_produit WHERE id_produit=".$product_id['id'].";";
			$query2 = "DELETE FROM produit WHERE id=".$product_id['id'].";";
			if (mysqli_query($db, $query1) === TRUE && mysqli_query($db, $query2) === TRUE)
				echo "Product Deleted.\n";
		}
		else
			echo "Product does not exist.\n";
	}
	mysqli_free_result($sql);
?>