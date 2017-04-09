<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: auto;
    max-width: 1100px;
    background-color: #FDF5E6;
}
.header {
  margin: auto;
  border: 3px solid #000;
  text-align: center;
  background-image: url("img/fetl.jpg");
  padding: 5px;
  max-width: 1100px;
  height: auto;
}
ul {
    list-style-type: none;
    margin: 0	;
    padding: 0;
    overflow: hidden;

    background-color: #228B22;
}
li {
    float: left;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li a:hover {
    background-color: #D3D3D3;
}
</style>
</head>
<body>
  <header class="header">
     <h1><font color="white">Fruits Légumes &amp; co.</font></h1>
  </header>
<ul>
	<li><a class="active" href="/rush00/index.php">Home</a></li>
	<li><a href="sign_up.php">Inscription</a></li>
<?php
	if ($_SESSION['user'] || $_SESSION['admin'])
	{
?>
	<li><a href="/rush00/sign_out.php">Me deconnecter</a></li>
<?php
	}
	else
	{
?>
		<li><a href="/rush00/connect.php">Me connecter</a></li>
<?php
	}
?>
	<li><a href="/rush00/panier.php">Panier</a></li>
	<li><a href="/rush00/admin.php">Admin</a></li>
</ul>

</body>
</html>
