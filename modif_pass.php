<?php
	header('Location: /rush00/result.php');
	session_start();
	function check($db, $mail, $pass)
	{
		//echo "old : $pass\nmail : $mail\n";
		if (!($result = mysqli_query($db, "SELECT `id` FROM `client` WHERE `email` = '$mail' AND `mdp` = '$pass'")))
			return (FALSE);
		while ($array = mysqli_fetch_array($result, MYSQLI_NUM))
			$i++;
		//echo $i."\n";
		if ($i < 1)
			return (FALSE);
		return (TRUE);
	}
	$error = FALSE;
	include("db_connect.php");
	if (!($db = db_connect()))
		exit;
	if ($_POST["submit"] == "OK" && $_POST["old_passwd"] && $_POST["new_passwd"])
	{
		$old = hash("whirlpool", htmlentities($_POST['old_passwd']));
		$new = hash("whirlpool", htmlentities($_POST['new_passwd']));
		$mail = $_SESSION['user'];
		if (!check($db, $mail, $old))
			header('Location: /rush00/result.php?error=wrongpwd');
		else
		{
			if (!(mysqli_query($db, "UPDATE `client` SET `mdp`='$new' WHERE `email` = '$mail'")))
				echo "Query error\n";
			else
				$_SESSION['user'] = $new;
		}
	}
	else
		echo "ko\n";
?>
