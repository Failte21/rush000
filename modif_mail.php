<?php
	//include("includes/header.php");
	header('Location: /rush00/result.php');
	$error = FALSE;
	include("db_connect.php");
	if (!($db = db_connect()))
		exit;
	if ($_POST["submit"] == "OK" && $_POST["old_mail"] && $_POST["new_mail"])
	{
		$old = mysqli_real_escape_string($db, $_POST['old_mail']);
		$new = mysqli_real_escape_string($db, $_POST['new_mail']);
		$mailexist = false;
		if ($old != $_SESSION['user'])
			//header('Location: /rush00/result.php?error=notyourmail');
			;
		else
		{
			if (!($query = mysqli_query($db, "SELECT `email` FROM `client`")))
				echo "Query error\n";
			else
			{
				while ($others = mysqli_fetch_assoc($query))
				{
					print_r($others);
					if ($others['email'] == $new)
					{
						echo "hello\n";
						$mailexist = true;
					}
				}
				if ($mailexist)
					//header('Location: /rush00/result.php?error=mailexist');
					;
				else
				{
					if (!(mysqli_query($db, "UPDATE `client` SET `email`='$new' WHERE `email` = '$old'")))
						echo "Query error\n";
					else
					{
						$_SESSION['user'] = $new;
						echo "ok\n";
					}
				}
			}
		}
	}
	else
		echo "ko\n";
?>
