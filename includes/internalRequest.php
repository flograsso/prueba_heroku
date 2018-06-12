<?php
//setting header to json
//header('Content-Type: application/json');

require ('phpFunctions.php');
global $meli;



$METHOD=$_POST["method"];

switch ($METHOD)
{
    case "executeQuery":
        $path=$_POST["query"];
        echo json_encode(getMeli($path));
        break;

	default:
		break;

}

?>


