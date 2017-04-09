<?php include("includes/header.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="dir-css/connect-and-up.css">
</head>
<body>
	<br />
	<h1 id="se-connecter">Inscription</h1>
	<form action="sign_up_db.php" method="post">
		<span id="text-mail">Email : </span><input id="mail" type="email" name="mail"><br>
		<span id="text-passwd">Mot de passe : </span><input id="passwd" type="password" name="passwd">
		<input id="submit" type="submit" name="submit" value="OK"><br>
		<a id="retour" href="/rush00/index.php">Retour</a>
	</form>
</body>
</html>
