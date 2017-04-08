<?php
	header('Location: /rush00/index.php');
	session_start();
	if ($_SESSION['user'])
		$_SESSION['user'] = NULL;
?>
