<!DOCTYPE html>
    <html lang="en" >
<?php



    $id = ($_POST["_id"]);
    $resource=($_POST["resource"]);
    $attempts=($_POST["attempts"]);

$date1='2018-04-05';
$date2='2018-04-05';
http_response_code(200);


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="INSERT INTO `tabla1` (`idPregunta`, `datePregunta`, `dateRespuesta`, `pregunta`, `respuesta`, `demora`) VALUES ('666', '2018-04-04', '2018-04-05', '123', '$id', '111');";
$conn->query($sql);

$conn->close();

?>