<?php include("includes/header.php");?><br />
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="dir-css/user_management.css">
</head>
<body>
	<h1 id="title">Changer d'adresse mail</h1>
	<form action="modif_mail.php" method="post">
		<span id="mail" >Email : <input type="email" name="old_mail" required><br></span>
		<span id="newmail"> Nouveau mail : <input type="email" name="new_mail" required><br></span>
		<input id="submit" type="submit" name="submit" value="OK"><br>
	</form>
	<h1 id="title">Changer de mot de passe</h1>
	<form action="modif_pass.php" method="post">
		<span id="passwd">Mot de passe actuel : <input type="password" name="old_passwd" required></span>
		<span id="newpasswd">Nouveau mot de passe : <input type="password" name="new_passwd" required></span>
		<input id="submit" type="submit" name="submit" value="OK"><br>
	</form>
	<a id="retour" href="/rush00/index.php">Retour</a>
	<a id="retour" href="/rush00/sign_out.php">Se deconnecter</a>
</body>
</html>
