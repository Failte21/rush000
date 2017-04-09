<?php include("includes/header.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	<style>
		form
		{
			color: #F5F5F5;
			position: relative;
			margin: auto;
			border: solid;
			border-color: green;
			border-radius: 5%;
			width: 300px;
			height: 200px;
			background-color: green;
		}

		#se-connecter
		{
			position: relative;
			z-index: 10;
			width: 160px;
			font-size: x-large;
			text-align: center;
			margin: auto;
			top: 40px;
			color: white;
			text-decoration: underline;
		}

		#retour
		{
			text-decoration: none;
			color: rgb(252, 252, 252);
			position: relative;
			border-style: solid;
			text-align: center;
			top: 100px;
			right: -220px;
			border-color: green;
			background-color: green;
			box-shadow: 1px 1px 1px #000000;
		}

		#submit
		{
			border-radius: 10%;
		    background-color: #F5F5F5;
		    box-shadow: 1px 1px 1px #000000;
		    position: relative;
		    top: 80px;
		    width: 70px;
		    left: 120px;
		}

		#mail, #passwd
		{
			color: #F5F5F5;
		}

		#mail
		{
			position: relative;
			top: 50px;
			left: 57px;
		}

		#passwd
		{
			position: relative;
			top: 60px;
			left: 10px;
		}

		#text-passwd
		{
			position: relative;
			top: 60px;
			left: 5px
		}

		#text-mail
		{
			position: relative;
			top: 50px;
			left: 50px;
		}

		#submit:hover
		{
			color: #F5F5F5;
			background-color: green;
			border-color: green;
		}

		#retour:hover
		{
			background-color: rgb(245, 62, 62);
			border-color: rgb(245, 62, 62);
			color: #F5F5F5;
		}
	</style>
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
