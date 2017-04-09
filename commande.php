<?PHP
include("./includes/header.php");
//echo "Commande termine, merci d'avoir utilise legumes and co.\n";
$db = mysqli_connect("localhost", "root", "root", "market");
foreach($_SESSION['panier'] as $key =>$value)
{
	$id_client = mysqli_query($db, "SELECT `id` FROM client WHERE email='".$_SESSION['user']."'");
	$result = mysqli_fetch_array($id_client, MYSQLI_ASSOC);
	echo $result[0];
	//$query = mysqli_query($db, "INSERT INTO commande (`id_client`, `id_produit`, `quantite`, `total`) VALUES ('". $result"', '" $key"', '"$value)"', );
	
}
?>
