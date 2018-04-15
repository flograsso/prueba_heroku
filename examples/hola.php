<!DOCTYPE html>
<html>
<body>

<h1>My first PHP page</h1>

<?php
require '../Meli/meli.php';
require '../configApp.php';
$meli = new Meli($appId, $secretKey);
$params = array();
$url = '/users/226384143/'
$result = $meli->get($url);
echo '<pre>';
print_r($result);
echo '</pre>';
?>

</body>
</html>
