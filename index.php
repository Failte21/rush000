
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
	.panier {
		position: relative;
		display: block;
		margin: auto;
		margin-top: 14px;
	}
	</style>
</head>
<body>
  <?php include("includes/header.php");?>
	<?php include("includes/categories.php");?>
	<div>
		<?php
		$db = mysqli_connect("localhost", "root", "root", "market");
		$tab = mysqli_query($db, "SELECT `nom`, `image` FROM `produit`");
		while ($array = mysqli_fetch_assoc($tab)) {
			?>
		<form action="panier.php" method="post">
		<div class="container">
				<div class="image"><img src=<?php echo $array['image'];?> style="width:120px;height:120px";></div>
				<div class="prod"><?php echo $array['nom']?></div>
				<div class="prix"></div>
				<input class="panier" type="submit" name=<?php echo $array['nom'];?> value="Ajouter">
		</div>
		</form>
		<?php } ?>
	</div>
</body>
</html>
