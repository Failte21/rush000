<?php
	session_start();
	include("includes/header.php");
	if($_GET['error'])
		echo "Wrong password or mail<br>\n";
	else
		echo "Success<br>\n";
?>
<a href="/rush00/index.php">Retour</a>
