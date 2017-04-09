<?PHP
include("./includes/header.php");
echo "Commande termine, merci d'avoir utilise legumes and co.\n";
$db = mysqli_connect("localhost", "root", "root", "market");
if (mysqli_connect_errno())
	{
		echo "Connection error\n";
		exit;
	}
$id_commande = mysqli_query($db, "SELECT id FROM commande ORDER BY id DESC");
$result3 = mysqli_fetch_array($id_commande, MYSQLI_ASSOC);
foreach($_SESSION['panier'] as $key =>$value)
{
	$id_client = mysqli_query($db, "SELECT `id` FROM client WHERE email='".$_SESSION['user']."'");
	$result = mysqli_fetch_array($id_client, MYSQLI_ASSOC);
	$prix = mysqli_query($db, "SELECT prix FROM produit WHERE nom='".$key ."'");
	$result1 = mysqli_fetch_array($prix, MYSQLI_ASSOC);
	$id_produit = mysqli_query($db, "SELECT `id` FROM produit WHERE nom='".$key."'");
	$result2 = mysqli_fetch_array($id_produit, MYSQLI_ASSOC);
	$query = "INSERT INTO commande (id_client, id_commande, id_produit, quantite, total) VALUES (" . $result['id'] . ", ".$result3['id'].", ".$result2['id'].", " . $value . ", " . $value * $result1['prix']. ");";
	mysqli_query($db, $query);
}
$_SESSION['panier'] = array();
?>
