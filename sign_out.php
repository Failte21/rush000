<?php
	header('Location: /rush00/index.php');
	session_start();
	if ($_SESSION['user'])
		unset($_SESSION['user']);
	if ($_SESSION['admin'])
		$_SESSION['admin'] = NULL;
?>
