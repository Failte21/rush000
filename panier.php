<?php include("includes/header.php");
if($_POST)
{
	$elem = key($_POST);
	foreach($_SESSION['panier'] as $key => $value)
	{
		if ($key == $elem)
			$value--;
		if ($value == 0)
			unset($key);
		$panier[$key] = $value;
	}
	$_SESSION['panier'] = $panier;
}
?>
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
	.total {
		border-style: solid;
		border-width: 2px;
		background:#ededed;
		position: relative;
		float: right;
		height: 50px;
		width: 100px;
	}
	.valider_button {
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
if (count($_SESSION['panier']) > 1)
{
		$db = mysqli_connect("localhost", "root", "root", "market");
			$tab = mysqli_query($db, "SELECT `nom`, `image`, `prix` FROM `produit`");
			$find = true;
      foreach ($_SESSION['panier'] as $key => $value) {
        $tab = mysqli_query($db, "SELECT `nom`, `image`, `prix` FROM `produit`");
			  while ($array = mysqli_fetch_assoc($tab)) {
				      if ($array['nom'] == $key) {?>
			<form action="panier.php" method="post">
			<div class="container">
					<div class="image"><img src=<?php echo $array['image'];?> style="width:120px;height:120px";></div>
					<div class="prod"><?php echo $array['nom'];?></div>
					<div class="prix"><?php echo $array['prix'];?> &euro; - Quantité : <?php echo $value;?></div>
		  <?php $sous_tot = $array['prix'] * $value;
				$total += $sous_tot?>
          <div class="prix"><?php echo $sous_tot;?> &euro;</div>
          <input class="panier" type="submit" name=<?php echo $array['nom'];?> value="Supprimer">
			</div>
			</form>
		<?php } } }}
					  else
echo "Vous n'avez rien dans votre panier."?>
<div class="total">
<?PHP
if ($sous_tot == 0)
	echo "TOTAL : 0€";
else
	echo "TOTAL : ".$total."€";
?>
<form action="commande.php" method="post">
<?PHP
	if ($total)
	{?>
	<input class="valider_button" type="submit" name="valider" value="Valider">
<?PHP
	}
?>
</form>
</div>
</body>
</html>
