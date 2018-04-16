<!DOCTYPE html>
    <html lang="en" >

<p> Hola </p>
<?php
//require '../Meli/meli.php';
//require '../configApp.php';


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
echo $url;
$server = $url["host"];
$username = $url["bb531b11e3bba4"];
$password = $url["66f4ca4f"];
$db = substr($url["path"], 1);
echo $db;
$conn = new mysqli($server, $username, $password, $db);



?>
