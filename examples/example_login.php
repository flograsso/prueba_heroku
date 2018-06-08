<?php

require ('../Meli/meli.php');
require ('../configApp.php');
include ("../dbFunctions.php");




$meli = new Meli($appId, $secretKey);

$access_token=getValueDb("token","access_token");
$refresh_token=getValueDb("token","refresh_token");
$expires_in=getValueDb("token","expires_in");

echo "Access token:".$access_token ."<br>";
echo "Referesh token:".$refresh_token ."<br>";
echo "Expires:".$expires_in ."<br>";


if(isset($_GET['code']) || !empty($access_token)) {	

	if(isset($_GET['code']) && empty($access_token)) {
		echo "No hay token y si hay code <br>";
		//Con el code pido un token
		try{
			$redirectURI='https://pruebameli.herokuapp.com/examples/example_login.php';
			$user = $meli->authorize($_GET["code"], $redirectURI);
			// Now we create the sessions with the authenticated user
			setValueDb("token","`access_token`,`refresh_token`,`expires_in`","'" . $user['body']->access_token . "','" . $user['body']->refresh_token. "','" . (time() + $user['body']->expires_in)."'");

			echo "Autenticado<br>";
			
		}catch(Exception $e){
			echo "Exception: ",  $e->getMessage(), "\n";
		}
	} else {
		//Access token seteado
		echo "Access token seteado<br>";
		// We can check if the access token in invalid checking the time
		if($expires_in < time()) {
			echo "Tiempo del token vencido.<br>";
			try {
				// Make the refresh proccess
				$refresh = $meli->refreshAccessToken();

				// Now we create the sessions with the new parameters
				updateAllValuesDb("token",'access_token',$refresh['body']->access_token);
				updateAllValuesDb("token",'expires_in',time() + $refresh['body']->expires_in);
				updateAllValuesDb("token",'refresh_token',$refresh['body']->refresh_token);

				echo "Token actualizado<br>";

			} catch (Exception $e) {
			  	echo "Exception: ",  $e->getMessage(), "\n";
			}
		}
		else
			echo "Sesion NO expirada. Correctamente autenticado<br>";
	}

	echo '<pre>';
		print_r($_SESSION);
	echo '</pre>';

} else {
	echo '<a href="https://auth.mercadolibre.com.ar/authorization?response_type=code&client_id='.$appId.'&redirect_uri=https://pruebameli.herokuapp.com/examples/example_login.php">Login using MercadoLibre oAuth 2.0</a>';
}



?>