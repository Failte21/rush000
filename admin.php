<?php
	session_start();
	include("includes/header.php");
	include("db_connect.php");
	$db = db_connect();
	if (!$db)
		exit;
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<title>Admin</title>
		<link rel="stylesheet" type="text/css" href="dir-css/admin.css">
	</head>
	<body>
<?php
	if ($_SESSION["admin"])
	{
?>
	<div id="admin">
	<br>

	<div class="ajoutpr">
		<h1>Ajouter un produit</h1><br>
		<form action="admin/add_product.php" method="post">
			<span id="name" ><b>Nom</b> : <input type="text" name="name" required><br></span>
			<span id="url"><b>Img url</b> : <input type="text" name="img"><br></span>
			<div id="cat" ><b>Categorie</b> :
<?php
		$req = mysqli_query($db, "SELECT `nom`, `id` FROM `categorie`");
		while ($cat = mysqli_fetch_assoc($req))
		{
?>
			<span><?php echo $cat['nom']." : "?></span>
			<input type="checkbox" name=<?php echo $cat['nom']." : ";
		}
?>			<br><br>
			</div>
			<span id="prix"><b>Prix</b> : <input type="number" min="0" max="15" step="0.5" name="price" required>$<br></span>
			<input type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br><br>
	</div>

	<div class="modif">
		<h1>Modifier un prix</h1><br>
		<form action="admin/modif_price.php" method="post">
			<span id="name" ><b>Nom</b> : <input type="text" name="name" required><br></span>
			<span id="new" ><b>Nouveau prix</b> : <input type="number" min="0" max="15" step="0.5" name="price" required>$<br></span>
			<input id="submit" type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br><br>
	</div>

	<div class="rest">
		<h1>Supprimer un produit</h1><br>
		<form action="admin/delete_product.php" method="post">
			<span class="champ"><b>Produit a supprimer</b> : <input type="text" name="name" required><br></span>
			<input type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br><br>
		<h1>Supprimer un utilisateur</h1><br>
		<form action="admin/delete_user.php" method="post">
			<span class="champ"><b>Utilisateur a supprimer</b> : <input type="text" name="name" required><br></span>
			<input type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br><br>
		<h1>Ajouter un administrateur</h1><br>
		<form action="admin/add_admin.php" method="post">
			<span class="champ"><b>Utilisateur a ajouter</b> : <input type="text" name="name" required><br></span>
			<input type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br><br>
		<h1>Ajouter une categorie</h1><br>
		<form action="admin/add_cat.php" method="post">
			<span class="champ"><b>Nom</b> : <input type="text" name="name" required><br></span>
			<input type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br><br>
		<h1>Supprimer une categorie</h1><br>
		<form action="admin/delete_cat.php" method="post">
		<div id="cat" ><b>Categorie</b> :
<?php
		$req = mysqli_query($db, "SELECT `nom`, `id` FROM `categorie`");
		while ($cat = mysqli_fetch_assoc($req))
		{
?>
			<span><?php echo $cat['nom']." : "?></span>
			<input type="checkbox" name="cat" value=<?php echo $cat['nom']?>>
<?php
		}
?>			<br><br>
			<input type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br><br>
	</div>
	</div>
</body>
</html>
<?php
	}
	else
	{
		echo "<div id=\"no-admin\">";
		echo "<br><span id=\"error\">Vous n'avez pas les droits d'administrateurs</span><br>";
		echo "<a id=\"retour\" href='/rush00/index.php'>Retour</a>";
?>
	<br>
	<h1 id="title">Admin<h1>
	<form action="admin_db.php" method="post">
		<span id="text-name" >Nom d'administrateur : </span><input id="name" type="text" name="name"><br>
		<span id="text-passwd" >Mot de passe : </span><input id="passwd" type="password" name="pass"><br>
		<input id="submit" type="submit" name="submit" value="Valider">
	</form>
<?php
	echo "</div>";
	}
?>
