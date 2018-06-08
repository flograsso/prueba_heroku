<?php

require_once ('includes/Meli/meli.php');
require_once ('includes/configApp.php');
include ("includes/dbFunctions.php");

function sec_session_start() {
    $session_name = 'meliSession';   // Configura un nombre de sesión personalizado.
    $secure = true;
    // Esto detiene que JavaScript sea capaz de acceder a la identificación de la sesión.
    $httponly = true;
    // Obliga a las sesiones a solo utilizar cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Obtiene los params de los cookies actuales.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Configura el nombre de sesión al configurado arriba.
    session_name($session_name);
    session_start();            // Inicia la sesión PHP.
    session_regenerate_id();    // Regenera la sesión, borra la previa. 
}

function login($email, $password, $mysqli) {
    // Usar declaraciones preparadas significa que la inyección de SQL no será posible.
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt 
        FROM users
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Une “$email” al parámetro.
        $stmt->execute();    // Ejecuta la consulta preparada.
        $stmt->store_result();
 
        // Obtiene las variables del resultado.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        // Hace el hash de la contraseña con una sal única.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // Si el usuario existe, revisa si la cuenta está bloqueada
            // por muchos intentos de conexión.
 
            if (checkbrute($user_id, $mysqli) == true) {
                // La cuenta está bloqueada.
                // Envía un correo electrónico al usuario que le informa que su cuenta está bloqueada.
                return false;
            } else {
                // Revisa que la contraseña en la base de datos coincida 
                // con la contraseña que el usuario envió.
                if ($db_password == $password) {
                    // ¡La contraseña es correcta!
                    // Obtén el agente de usuario del usuario.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    //  Protección XSS ya que podríamos imprimir este valor.
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // Protección XSS ya que podríamos imprimir este valor.
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // Inicio de sesión exitoso
                    return true;
                } else {

                    return false;
                }
            }
        } else {
            // El usuario no existe.
            return false;
        }
    }
}

?>