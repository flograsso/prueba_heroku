<?php



require '../Meli/meli.php';
require '../configApp.php';


$meli = new Meli($appId, $secretKey);

if(isset($_GET['code']) || !empty($access_token)) {	

	if(isset($_GET['code']) && empty($access_token)) {
		echo "No hay token y si hay code";
		//Con el code pido un token
		try{
			$redirectURI='https://pruebameli.herokuapp.com/examples/example_login.php';
			$user = $meli->authorize($_GET["code"], $redirectURI);
			// Now we create the sessions with the authenticated user
			putenv("access_token=".$user['body']->access_token);
			putenv("expires_in=". (time() + $user['body']->expires_in));
			putenv("refresh_token=".$user['body']->refresh_token);

			echo "Autenticado";
			
		}catch(Exception $e){
			echo "Exception: ",  $e->getMessage(), "\n";
		}
	} else {
		//Access token seteado
		echo "Access token seteado";
		// We can check if the access token in invalid checking the time
		if($expires_in < time()) {
			echo "Tiempo del token vencido.";
			try {
				// Make the refresh proccess
				$refresh = $meli->refreshAccessToken();

				// Now we create the sessions with the new parameters
				putenv("access_token=".$refresh['body']->access_token);
				putenv("expires_in=".time() + $refresh['body']->expires_in);
				putenv("refresh_token=".$refresh['body']->refresh_token);

				echo "Token actualizado";

			} catch (Exception $e) {
			  	echo "Exception: ",  $e->getMessage(), "\n";
			}
		}
		else
			echo "Sesion NO expirada. Correctamente autenticado";
	}

	echo '<pre>';
		print_r($_SESSION);
	echo '</pre>';

} else {
	echo '<a href="https://auth.mercadolibre.com.ar/authorization?response_type=code&client_id='.$appId.'&redirect_uri=https://pruebameli.herokuapp.com/examples/example_login.php">Login using MercadoLibre oAuth 2.0</a>';
}



