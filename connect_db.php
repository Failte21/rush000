<?php
	session_start();
	header('Location: /rush00/result_co.php');
	function check($db, $mail, $pass)
	{
		if (!($result = mysqli_query($db, "SELECT `id` FROM `client` WHERE `email` = '$mail' AND `mdp` = '$pass'")))
			return (FALSE);
		$array = mysqli_fetch_array($result, MYSQLI_NUM);
		if (count($array) < 1)
			return (FALSE);
		return (TRUE);
	}
	$error = FALSE;
	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}
	if ($_POST["submit"] == "OK" && $_POST["mail"] && $_POST["passwd"])
	{
		$mail = mysqli_real_escape_string($db, htmlentities($_POST['mail']));
		$pass = hash("whirlpool", mysqli_real_escape_string($db, htmlentities($_POST['passwd'])));
		if (!check($db, $mail, $pass))
			header('Location: /rush00/result_co.php?error=true');
		else
			$_SESSION["user"] = $mail;
	}
	else
		echo "ERROR\n";
?>
