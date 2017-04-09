<?php include("includes/header.php");?><br />
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="dir-css/connect-and-up.css">
</head>
<body>
	<h1 id="se-connecter">Se connecter</h1>
	<form action="connect_db.php" method="post">
		<span id="text-mail">Email : </span><input id="mail" type="email" name="mail"><br>
		<span id="text-passwd">Mot de passe : </span><input id="passwd" type="password" name="passwd">
		<input id="submit" type="submit" name="submit" value="OK"><br>
		<a id="retour" href="/rush00/index.php">Retour</a>
	</form>
</body>
</html>
