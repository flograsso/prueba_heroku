<!DOCTYPE html>
    <html lang="en" >

<p> Hola </p>
<?php
//require '../Meli/meli.php';
//require '../configApp.php';

$meli = new Meli($appId, $secretKey);
$params = array();
$url = ' questions/search';
echo $url;
$result = $meli->get($url, array('item'=>'MLA-617699510','access_token' => $_SESSION['access_token']));
echo '<pre>';


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["bb531b11e3bba4"];
$password = $url["66f4ca4f"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);



?>
