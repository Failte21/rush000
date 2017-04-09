<?php
session_start();
include("../includes/header.php");
function check_admin($db, $name)
{
	if (!($cat = mysqli_query($db, "SELECT `login` FROM `admin` WHERE `login` = '$name'")))
		return (FALSE);
	if (mysqli_num_rows($cat) > 0)
		return (FALSE);
	return (TRUE);
}

function check_mail($db, $mail)
{
	if (!($mails = mysqli_query($db, "SELECT `email` FROM `client` WHERE `email` = '$mail'")))
		return (FALSE);
	if (mysqli_num_rows($mails) > 0)
		return (FALSE);
	return (TRUE);
}

if ($_SESSION['admin'])
{
	$error = FALSE;
	$db = mysqli_connect("localhost","root", "root", "market");
	if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}
	if ($_POST["submit"] === "Valider" && $_POST[name] !== "")
		{
			$name = mysqli_real_escape_string($db, $_POST['name']);
			if (!check_admin($db, $name))
			{
				echo("L'utilisateur $name est deja un admin");
			}
			else if(check_mail($db, $name))
			{
				echo("L'utilisateur $name n'est pas inscrit");
			}
			else
			{
				if (!($pass = mysqli_query($db, "SELECT `mdp` FROM `client` WHERE `email` = '$name';")))
					echo "ko\n";
				$pass = mysqli_fetch_array($pass, MYSQLI_NUM);
				if (!mysqli_query($db, "INSERT INTO `admin` (`login`, `mdp`) VALUES (\"$name\", \"$pass[0]\")") === TRUE)
					echo "ko\n";
				else
					echo ("L'utilisateur $name a bien ete ajouter");
			}
		}
}
else
	echo "fail\n";
 ?>
<br><a href="/rush00/index.php">Retour a l'accueil</a>
