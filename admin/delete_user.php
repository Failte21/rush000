<?php
	include("../includes/header.php");

	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}
	if ($_POST['name'])
	{
		$query = "SELECT id FROM client WHERE email='".$_POST['name']."';";
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
