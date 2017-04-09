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
		<h1>Ajouter un produit</h1><br><br>
		<form action="admin/add_product.php" method="post">
			<b>Nom</b> : <input type="text" name="name" required><br>
			<b>Img url</b> : <input type="text" name="img"><br>
			<b>Categorie</b> :
<?php
		$req = mysqli_query($db, "SELECT `nom`, `id` FROM `categorie`");
		while ($products = mysqli_fetch_assoc($req))
		{
?>
			<span><?php echo $products['nom']." : "?></span>
			<input type="checkbox" name=<?php echo $products['id']." : ";
		}
?>			<br><br>
			<b>Prix</b> : <input type="number" min="0" max="15" step="0.5" name="price" required>$<br>
			<input type="submit" id="submit" name="submit" value="Valider">
		</form>
		<br><br>
	</div>
	<b>Modifier un prix</b><br><br>
	<form action="admin/modif_price.php" method="post">
		<b>Nom</b> : <input type="text" name="name" required><br>
		<b>Nouveau prix</b> : <input type="number" min="0" max="15" step="0.5" name="price" required>$<br>
		<input type="submit" id="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Supprimer un produit</b><br><br>
	<form action="admin/delete_product.php" method="post">
		<b>Produit a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" id="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Supprimer un utilisateur</b><br><br>
	<form action="admin/delete_user.php" method="post">
		<b>Utilisateur a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" id="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Ajouter un administrateur</b><br><br>
	<form action="admin/add_admin.php" method="post">
		<b>Utilisateur a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" id="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Ajouter une categorie</b><br><br>
	<form action="admin/add_cat.php" method="post">
		<b>Nom</b> : <input type="text" name="name" required><br>
		<input type="submit" id="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Supprimer une categorie</b><br><br>
	<form action="admin/delete_cat.php" method="post">
		<b>Categorie a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" id="submit" name="submit" value="Valider">
	</form>
	<br><br>
	</div>
</body>
</html>
<?php
	}
	else
	{
		echo "<div id=\"no-admin\">";
		echo "<br id=\"error\" >Vous n'avez pas les droits d'administrateurs<br>";
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
