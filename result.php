<?php
	include("includes/header.php");
	//echo($_GET['error']);
	if 	($_GET['error'])
	{
		if ($_GET['error'] == "notyourmail")
			echo "<h1 id=\"wrong\" >Oups... This is not your mail</h1><br>";
		else if ($_GET['error'] == true || $_GET['error'] == "mailexists")
			echo "<h1 id=\"wrong\" >Oups... This Mail already exists</h1><br>";
	}
	else
	{
			echo "<h1  id=\"Success\">Success</h1><br>\n";
	}
?>
<link rel="stylesheet" type="text/css" href="dir-css/result.css">
<a id="Retour" href="/rush00/index.php">Retour</a>
