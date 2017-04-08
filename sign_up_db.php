<?php
	header('Location: /rush00/result.php');
	function check_mail($db, $mail)
	{
		if (!($mails = mysqli_query($db, "SELECT `email` FROM `client` WHERE `email` = '$mail'")))
			return (FALSE);
		if (mysqli_num_rows($mails) > 0)
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
		$mail = $_POST['mail'];
		$pass = hash("whirlpool", $_POST['passwd']);
		if (!check_mail($db, $mail))
		{
			header('Location: /rush00/result.php?error=true');
			echo ("This email already exists\n");
		}
		else
			if (!mysqli_query($db, "INSERT INTO `client`(`email`, `mdp`) VALUES ('$mail', '$pass')") === TRUE)
				echo "ko\n";
	}
	else
		echo "ERROR\n";
?>
