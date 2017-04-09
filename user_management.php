<?php include("includes/header.php");?><br />
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="dir-css/connect-and-up.css">
</head>
<body>
	<h1 id="se-connecter">Changer d'adresse mail</h1>
	<form action="modif_mail.php" method="post">
		<span id="text-mail">Email : </span><input id="mail" type="email" name="old_mail" required><br>
		<span id="text-mail">Nouveau mail : </span><input id="mail" type="email" name="new_mail" required><br>
		<input id="submit" type="submit" name="submit" value="OK"><br>
	</form>
	<h1 id="se-connecter">Changer de mot de passe</h1>
	<form action="modif_pass.php" method="post">
		<span id="text-passwd">Mot de passe actuel : </span><input id="passwd" type="password" name="old_passwd" reauired>
		<span id="text-passwd">Nouveau mot de passe : </span><input id="passwd" type="password" name="new_passwd" reauired>
		<input id="submit" type="submit" name="submit" value="OK"><br>
	</form>
	<a id="retour" href="/rush00/index.php">Retour</a>
	<a id="retour" href="/rush00/sign_out.php">Se deconnecter</a>
</body>
</html>
