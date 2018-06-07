<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//database
define('DB_HOST', $url["host"]);
define('DB_USERNAME', $url["user"]);
define('DB_PASSWORD', $url["pass"]);
define('DB_NAME', substr($url["path"], 1));

//get connection
//(MySQLi Object-Oriented)
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
	die("Connection failed: " . $conn->error);
}


?>