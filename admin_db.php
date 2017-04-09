<?php
	session_start();
	include("db_connect.php");
	header('Location: /rush00/admin.php');
	$db = db_connect();
	if (!$db)
		exit;
	$admin = mysqli_real_escape_string($db, $_POST['name']);
	$pass = hash("whirlpool", mysqli_real_escape_string($db, $_POST['pass']));
	$req = mysqli_query($db, "SELECT `id` FROM `admin` WHERE `login` = '$admin' AND `mdp` = '$pass'");
	$user_admin = mysqli_fetch_assoc($req);
	if (count($user_admin) > 0)
		$_SESSION['admin'] = $admin;
	//echo($_SESSION['admin']);
?>
