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
		$query = "SELECT id FROM client WHERE email='".$name."';";
		$sql = mysqli_query($db, $query);
	 	$product_id = mysqli_fetch_assoc($sql);
	 	if (count($product_id) > 0)
	 	{
			$query = "DELETE FROM client WHERE id=".$product_id['id'].";";
			if (mysqli_query($db, $query) === TRUE)
				echo "User Deleted.\n";
		}
		else
			echo "User does not exist.\n";
	}
	mysqli_free_result($sql);
?>
