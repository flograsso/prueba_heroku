<?php

require_once ('includes/phpFunctions.php');
global $meli;
global $access_token;

 
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
                include ("includes/example_login.php");
                $json=getAllValuesDb('questions');
                $params = array();
        
                $array = json_decode( $json, true );
                foreach($array as $item) { //foreach element in $arr
                    $url = '/questions/' . $item['idPregunta'];
                    $result = $meli->get($url, array('access_token' => $access_token));

                    if ($result["httpCode"]==200)
                    {
                        echo '<pre>';
                        print_r($result);
                        echo '</pre>';
                        
                    
                        echo "Linea<br>";
                        $answer=$result["body"]->answer;
                        echo $answer->text;
                        $answer= json_decode($result["body"]->answer);
                        echo $answer->text;
                        echo $aux["answer"]["text"];
                        echo $aux["text"];
                    
                       //echo "VAR=" .  ([$result["body"]->answer]->text);

                    }
                    else
                    {
                        echo $result["httpCode"];
                    }

                }
               


            ?>
        <?php else : ?>
            <p>
                <span class="error">No está autorizado para acceder a esta página.</span> Please <a href="login.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>