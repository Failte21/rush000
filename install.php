<?PHP
$id = mysqli_connect("localhost");
$content = file_get_contents("database.sql");
$array = explode(";", $content);
//print_r($array);
foreach($array as $elem)
{
	mysqli_query($id, (trim($elem) . ";"));
}
?>
