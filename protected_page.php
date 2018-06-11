<?php
include ("includes/example_login.php");
require_once ('includes/phpFunctions.php');
global $meli;

 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión segura: Página protegida</title>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : 
                $json=getAllValuesDb('questions');
                $params = array();
                $array = json_decode( $json, true );
                foreach($array as $item) { //foreach element in $arr
                    $url = '/question/' . $item['idPregunta'];
                    $result = $meli->get($url, $params);
                    echo '<pre>';
                    print_r($result);
                    echo '</pre>';
                }
               


            ?>
        <?php else : ?>
            <p>
                <span class="error">No está autorizado para acceder a esta página.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>