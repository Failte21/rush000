<?php
	session_start();
	include("includes/header.php");
	if($_GET['error'])
		echo "<h1 id=\"wrong\">Wrong password or mail<h1><br>\n";
	else
		echo "<h1 id=\"Success\">Success</h1><br>\n";
?>
<link rel="stylesheet" type="text/css" href="dir-css/result.css">
<a id="Retour" href="/rush00/index.php">Retour</a>
