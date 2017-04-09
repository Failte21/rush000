<?php
	header('Location: /rush00/index.php');
	include("includes/header.php");
	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}
	
	$pass = mysqli_real_escape_string($db, htmlentities($_POST["passwd"]));
	$pass = hash("whirlpool", mysqli_real_escape_string($db, $pass));
	$name = $_SESSION['user'];
	if ($name)
	{
		$query1 = "SELECT id FROM client WHERE email='".$name."';";
		$query2 = "SELECT id FROM admin WHERE login='".$name."';";
		$sql1 = mysqli_query($db, $query1);
		$sql2 = mysqli_query($db, $query2);
	 	$user_id = mysqli_fetch_assoc($sql1);
	 	$admin_id = mysqli_fetch_assoc($sql2);
	 	if (count($user_id) > 0)
	 	{
			if (count($admin_id) > 0)
			{
				$query2 = "DELETE FROM admin WHERE id=".$admin_id['id'].";";
				if (mysqli_query($db, $query2) === TRUE)
					echo "User admin rights Deleted.\n";
			}			$query1 = "DELETE FROM client WHERE id=".$user_id['id'].";";
			if (mysqli_query($db, $query1) === TRUE)
				echo "User Deleted.\n";
		}
		else
			echo "User does not exist.\n";
	}
	if ($_SESSION['user'])
		unset($_SESSION['user']);
	if ($_SESSION['admin'])
		$_SESSION['admin'] = NULL;
?>
