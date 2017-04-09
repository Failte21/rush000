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
	$img = mysqli_real_escape_string($db, htmlentities($_POST["img"]));
	if ($name && $price)
	{
		$query = "SELECT id FROM produit WHERE nom='".$name."';";
		$sql = mysqli_query($db, $query);
		$product = mysqli_fetch_assoc($sql);
		if (count($product) == 0)
		{
			$query = "INSERT INTO produit (nom, prix, image) VALUES ('" . $name . "', " . $price . ", '" . $img . "');";
			if (mysqli_query($db, $query) === TRUE)
			{
				echo "Product ADDED\n";
				$query = "SELECT id FROM produit WHERE nom='".$name."';";
				if ($sql = mysqli_query($db, $query))
				{
					$product_id = mysqli_fetch_assoc($sql);
					foreach ($_POST as $cat => $value)
					{
						$query = "SELECT id FROM categorie WHERE nom='".$cat."';";
						if (($sql = mysqli_query($db, $query)) != FALSE)
						{
							$cat_id = mysqli_fetch_assoc($sql);
							if (count($cat_id) > 0)
							{
								$query = "INSERT INTO categorie_produit (id_produit, id_categorie) VALUES (" . $product_id['id'] . ", " . $cat_id['id'] . ");";
								if (!mysqli_query($db, $query))
									echo "Link to Categorie $cat Failed.\n";
							}
						}
					}
				}
			}
			else
				echo "Failed\n";
		}
		else
			echo "Product already exists.\n";
	}
?>