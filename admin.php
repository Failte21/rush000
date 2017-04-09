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
	</head>
	<body>
<?php
	if ($_SESSION["admin"])
	{
?>
	<br>
	<b>Ajouter un produit</b><br><br>
	<form action="admin/add_product.php" method="post">
		<b>Nom</b> : <input type="text" name="name" required><br>
		<b>Categorie</b> :         
<?php
		$req = mysqli_query($db, "SELECT `nom` FROM `categorie`");
		while ($products = mysqli_fetch_assoc($req))
		{
?>
			<span><?php echo $products['nom']." : "?></span>
			<input type="checkbox" name=<?php echo $products['nom']." : ";
		}
?>		<br><br>
		<b>Prix</b> : <input type="number" min="0" max="15" step="0.5" name="price" required>$<br>
		<input type="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Modifier un prix</b><br><br>
	<form action="admin/modif_price.php" method="post">
		<b>Nom</b> : <input type="text" name="name" required><br>
		<b>Nouveau prix</b> : <input type="number" min="0" max="15" step="0.5" name="price" required>$<br>
		<input type="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Supprimer un produit</b><br><br>
	<form action="admin/delete_product.php" method="post">
		<b>Produit a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Supprimer un utilisateur</b><br><br>
	<form action="admin/delete_user.php" method="post">
		<b>Utilisateur a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Ajouter un administrateur</b><br><br>
	<form action="admin/add_admin.php" method="post">
		<b>Utilisateur a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Ajouter une categorie</b><br><br>
	<form action="admin/add_cat.php" method="post">
		<b>Nom</b> : <input type="text" name="name" required><br>
		<input type="submit" name="submit" value="Valider">
	</form>
	<br><br>
	<b>Supprimer une categorie</b><br><br>
	<form action="admin/add_cat.php" method="post">
		<b>Categorie a supprimer</b> : <input type="text" name="name" required><br>
		<input type="submit" name="submit" value="Valider">
	</form>
	<br><br>
</body>
</html>
<?php
	}
	else
	{
		echo "<br>Vous n'avez pas les droits d'administrateurs<br>";
		echo "<a href='/rush00/index.php'>Retour</a>";
?>
	<br>
	<form action="admin_db.php" method="post">
		<b>Nom d'administrateur</b> : <input type="text" name="name"><br>
		<b>Mot de passe</b> : <input type="password" name="pass"><br>
		<input type="submit" name="submit" value="Valider">
	</form>
<?php
	}
?>
