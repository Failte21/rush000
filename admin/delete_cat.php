<?php
	include("../includes/header.php");
	include("../db_connect.php");
	if (!($db = db_connect()))
		exit;
	if ($_POST["submit"] == "Valider")
	{
		$to_remove = mysqli_real_escape_string($db, $_POST["cat"]);
		echo $to_remove."\n";
		$cat = mysqli_query($db, "SELECT `nom`, `id` FROM `categorie` WHERE `nom` = '$to_remove'");
		$id = 0;
		while ($e = mysqli_fetch_assoc($cat))
			$id += $e['id'];
		if ($id < 1)
			echo ("$to_remove n'est pas une categorie existante\n");
		else
		{
			if (mysqli_query($db, "DELETE FROM `categorie` WHERE `nom` = '$to_remove'"))
				echo ("La categorie a bien ete supprimee");
			else
				echo ("Failure\n");
			if (mysqli_query($db, "DELETE FROM `categorie_produit` WHERE `id_categorie` = '$id'"))
				echo ("\n");
			else
				echo ("Failure\n");
		}
	}
	else
		echo "fail\n";
?>
<br><a href="/rush00/index.php">Retour a l'accueil</a>
