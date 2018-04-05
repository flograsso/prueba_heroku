<?php
require '../Meli/meli.php';
require '../configApp.php';

$meli = new Meli($appId, $secretKey);
$params = array();
$url = 'questions/search';
$result = $meli->get($url, array('item'=>'MLA-617699510','access_token' => $_SESSION['access_token']));
echo '<pre>';
print_r($result);
echo '</pre>';
?>
