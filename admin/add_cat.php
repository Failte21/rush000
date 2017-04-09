<?php
session_start();
include("../includes/header.php");
function check_categorie($db, $name)
{
	if (!($cat = mysqli_query($db, "SELECT `nom` FROM `categorie` WHERE `nom` = '$name'")))
		return (FALSE);
	if (mysqli_num_rows($cat) > 0)
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
			$name = mysqli_real_escape_string($db, htmlentities($_POST["name"]));
			if (!check_categorie($db, $name))
			{
				echo("La categorie $name existe deja");
			}
			else
			{
				if (!mysqli_query($db, "INSERT INTO categorie (nom) VALUES (\"$name\");") === TRUE)
					echo "ko\n";
				else
					echo ("La categorie $name a bien ete ajouter");
			}
		}
}
else
	echo "fail\n";
 ?>
<br><a href="/rush00/index.php">Retour a l'accueil</a>
