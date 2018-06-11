<!DOCTYPE html>
    <html lang="en" >
<?php

include ("includes/example_login.php");
global $conn;

$data = json_decode(file_get_contents('php://input'), true);
http_response_code(200);


$topic=($data["topic"]);
$resource=($data["resource"]);
echo $topic;
switch($topic) 
{
    case questions:
        $resource= ereg_replace("[^0-9]", "", $resource);
        setValueDb("questions","idPregunta,textoPregunta,estadoPregunta,fechaRecibida,textoRespuesta,fechaRespuesta,idUsuario,idItem,demoraRtaSeg","'$resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL");
        break;

    default:
        $str = "{";
        foreach ($data as $key => $value) {
            $str=$str ."$key" . ":" . "$value" . ",";
        }
        $str=$str."}";
        setValueDb("preguntas","idPregunta,textoPregunta,estadoPregunta,fechaRecibida,textoRespuesta,fechaRespuesta,idUsuario,idItem,demoraRtaSeg","'1','$topic','$resource',NULL,'$str',NULL,NULL,NULL,NULL");
}

$date1='2018-04-05';
$date2='2018-04-05';


$conn->close;








?>