<?php
session_start();
if ($_POST)
{
	$elem = key($_POST);
	$panier = array();
	if (!$_SESSION['panier'])
		$_SESSION['panier'] = array($elem => 0);
	foreach($_SESSION['panier'] as $key => $value)
	{
		if ($key == $elem)
			$value++;
		else
			$panier += array($elem => 1);
	$panier[$key] = $value;
	}
	$_SESSION['panier'] = $panier;
}
?>
<?php include("includes/header.php");?>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>ECOMMERCE</title>
	<style>
	.container {
		border-style: solid;
		border-width: 2px;
		position: relative;
		float: left;
		height: 200px;
		width: 200px;
		margin: 20px;
	}
	.image {
		height: 120px;
		width: 120px;
		margin: auto;
	}
	.prod {
		font-size: 20px;
		text-align: center;
		height: 30px;
		width: auto;
		margin: auto;
		margin-top: 4px;
	}
	.prix {
		position: relative;
		text-align: center;
		display: block;
		width: auto;
		margin: auto;
	}
	.panier {
		position: relative;
		display: block;
		margin: auto;
		margin-top: 0px;
	}
	</style>
</head>
<body>
	<?php include("includes/categories.php");?>
	<div>
		<?php
		$db = mysqli_connect("localhost", "root", "root", "market");
		if ($_GET['Categorie'] == "") {
			$tab = mysqli_query($db, "SELECT `nom`, `image`, `prix` FROM `produit`");
			$find = true;
			while ($array = mysqli_fetch_assoc($tab)) {
				?>
			<form action="index.php" method="post">
			<div class="container">
					<div class="image"><img src=<?php echo $array['image'];?> style="width:120px;height:120px";></div>
					<div class="prod"><?php echo $array['nom'];?></div>
					<div class="prix"><?php echo $array['prix'];?> &euro;</div>
					<input class="panier" type="submit" name=<?php echo $array['nom'];?> value="Ajouter">
			</div>
			</form>
		<?php } }
		elseif ($_GET['Categorie'] != "") {
			$cat = mysqli_query($db, "SELECT `id`, `nom` FROM `categorie`");
			$cat_array = mysqli_fetch_assoc($cat);
			$find = false;
			while ($cat_array && $cat_array['nom'] != $_GET['Categorie']) {
				$cat_array = mysqli_fetch_assoc($cat);
			}
			if ($cat_array['nom'] == $_GET['Categorie']) {
				$find = true;
				$cat_prod = mysqli_query($db, "SELECT `id_produit`, `id_categorie` FROM `categorie_produit`");
				$cat_prod_id = array();
				while ($find && $cat_prod_ary = mysqli_fetch_assoc($cat_prod)) {

					if ($cat_prod_ary['id_categorie'] == $cat_array['id']) {
						$cat_prod_id[] = $cat_prod_ary['id_produit'];
					}
				}
				$tab = mysqli_query($db, "SELECT `id`, `nom`, `image`, `prix` FROM `produit`");
				while ($find && $array = mysqli_fetch_assoc($tab)) {
					foreach ($cat_prod_id as $value) {
						if ($array['id'] == $value) { ?>
							<form action=
							<?PHP
							if (!$_GET['Categorie'])
								echo "index.php";
							else
								echo "index.php?Categorie=" . $_GET['Categorie'];?> method="post">
										<div class="container">
									<div class="image"><img src=<?php echo $array['image'];?> style="width:120px;height:120px";></div>
									<div class="prod"><?php echo $array['nom']?></div>
									<div class="prix"><?php echo $array['prix'];?> &euro;</div>
									<input class="panier" type="submit" name=<?php echo $array['nom'];?> value="Ajouter">
							</div>
							</form>
				<?php	}
					}
				}
			}
		} ?>
	</div>
</body>
</html>
