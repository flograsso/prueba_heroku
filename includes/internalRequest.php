<?php
//setting header to json
//header('Content-Type: application/json');

require ('phpFunctions.php');

$METHOD=$_POST["method"];

switch ($METHOD)
{
    case "executeQuery":
        $path=$_POST["query"];
        echo json_encode(procesarPregunta($path));
        break;

	default:
		break;

}

?>


