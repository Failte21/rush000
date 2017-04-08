
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>ECOMMERCE</title>
<<<<<<< HEAD
	<style>
	.container {
		background-color: black;
		position: relative;
		float: left;
		height: 200px;
		width: 200px;
		margin: 20px;
	}
	.image {
		background: red;
		height: 120px;
		width: 120px;
		margin: auto;
	}
	.prod {
		background: green;
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
		<form action="panier.php" method="post">
		<div class="container">
				<div class="image"></div>
				<div class="prod"></div>
				<div class="prix"></div>
				<input class="panier" type="submit" name="submit" value="Ajouter">
		</div>
		</form>
		<form action="panier.php" method="post">
		<div class="container">
				<div class="image"></div>
				<div class="prod"></div>
				<div class="prix"></div>
				<input class="panier" type="submit" name="submit" value="Ajouter">
		</div>
		</form>
	</div>
=======
</head>
<body>
  <?php include("includes/header.php");?>


>>>>>>> c7bf8a418d6c9edcdbc6e4e4053cb2e7d73123ef
</body>
</html>
