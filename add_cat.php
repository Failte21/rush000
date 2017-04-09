<?php
header('');
if ($_SESSION['admin'])
{
	$error = FALSE;
	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}
	if ($_POST["submit"] === "Valider")
		echo "ok";
}
 ?>
