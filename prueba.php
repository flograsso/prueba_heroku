<!DOCTYPE html>
    <html lang="en" >

<p> Hola </p>
<?php
//require '../Meli/meli.php';
//require '../configApp.php';


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
echo $db;
echo $server;
$conn = new mysqli($server, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql="CREATE TABLE `tabla1` ( `idPregunta` INT NOT NULL , `datePregunta` DATE NULL , `dateRespuesta` DATE NULL , `pregunta` TEXT NOT NULL , `respuesta` TEXT NOT NULL , `demora` INT NOT NULL );";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();

?>
