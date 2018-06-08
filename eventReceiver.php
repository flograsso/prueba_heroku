<!DOCTYPE html>
    <html lang="en" >
<?php

include ("includes/example_login.php");

$data = json_decode(file_get_contents('php://input'), true);
http_response_code(200);

    $id = ($data["user_id"]);
    $topic=($data["topic"]);
    $resource=($data["resource"]);
    $attempts=($data["attempts"]);

$date1='2018-04-05';
$date2='2018-04-05';

$str = "{";
foreach ($data as $key => $value) {
    $str=$str ."$key" . ":" . "$value" . ",";
}
$str=$str."}";



global $conn;

setValueDb("preguntas","idPregunta,textoPregunta,estadoPregunta,fechaRecibida,textoRespuesta,fechaRespuesta,idUsuario,idItem,demoraRtaSeg","'1','$topic','$resource',NULL,'$str',NULL,NULL,NULL,NULL");

$conn->close;

?>