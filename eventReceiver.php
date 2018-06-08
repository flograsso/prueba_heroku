<!DOCTYPE html>
    <html lang="en" >
<?php

include "example_login.php";

$data = json_decode(file_get_contents('php://input'), true);
http_response_code(200);

    $id = ($data["user_id"]);
    $topic=($data["topic"]);
    $resource=($data["resource"]);
    $attempts=($data["attempts"]);

$date1='2018-04-05';
$date2='2018-04-05';

echo "id: " . $id ;



global $conn;

$sql="INSERT INTO `tabla1` (`idPregunta`, `datePregunta`, `dateRespuesta`, `pregunta`, `respuesta`, `demora`) VALUES ('$id', '2018-04-04', '2018-04-05', '$topic', '$resource', '$attempts');";
$conn->query($sql);
echo $sql;
$conn->close();

?>