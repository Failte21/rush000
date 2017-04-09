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
		font-size: 17px;
		text-align: center;
		height: 30px;
		width: auto;
		margin: auto;
		margin-top: 4px;
    margin-bottom: 0px;
	}
	.prix {
    font-size: 15px;
		position: relative;
		text-align: center;
		display: block;
		width: auto;
    margin-top: 1px;
		margin: auto;
	}
	.panier {
		position: relative;
		display: block;
		margin: auto;
		margin-top: 5px;

	}
	</style>
</head>
<body>
	<div>
		<?php
		$db = mysqli_connect("localhost", "root", "root", "market");
			$tab = mysqli_query($db, "SELECT `nom`, `image`, `prix` FROM `produit`");
			$find = true;
      foreach ($_SESSION['panier'] as $key => $value) {
        $tab = mysqli_query($db, "SELECT `nom`, `image`, `prix` FROM `produit`");
			  while ($array = mysqli_fetch_assoc($tab)) {
				      if ($array['nom'] == $key) {?>
			<form action="index.php" method="post">
			<div class="container">
					<div class="image"><img src=<?php echo $array['image'];?> style="width:120px;height:120px";></div>
					<div class="prod"><?php echo $array['nom'];?></div>
					<div class="prix"><?php echo $array['prix'];?> &euro; - Quantité : <?php echo $value;?></div>
          <?php $sous_tot = $array['prix'] * $value;?>
          <div class="prix"><?php echo $sous_tot;?> &euro;</div>
          <input class="panier" type="submit" name=<?php echo $array['nom'];?> value="Supprimer">
			</div>
			</form>
		<?php } } }?>
	</div>
</body>
</html>
