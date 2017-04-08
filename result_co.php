<?php
	session_start();
	if($_GET['error'])
		echo "Wrong password or mail<br>\n";
	else
		echo "Success<br>\n";
?>
<a href="/rush00/index.php">Retour</a>
