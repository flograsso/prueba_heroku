<!DOCTYPE html>
    <html lang="en" >


<?php
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

$sql = "CREATE TABLE `preguntas` ( `idPregunta` INT NOT NULL , `textoPregunta` TEXT NULL , `estadoPregunta` TEXT NULL , `fechaRecibida` DATE NULL , `textoRespuesta` TEXT NULL , `fechaRespuesta` DATE NULL , `idUsuario` INT NULL , `idItem` TINYTEXT NULL , `demoraRtaSeg` INT NULL );";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>