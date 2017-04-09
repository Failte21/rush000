<?php
	if 	($_GET['error'])
		echo "<h1 id=\"wrong\" >Oups... This Mail already exists</h1><br>";
	else
	{
			echo "<h1  id=\"Success\">Success</h1><br>\n";
	}
?>
<link rel="stylesheet" type="text/css" href="dir-css/result.css">
<a id="Retour" href="/rush00/index.php">Retour</a>
