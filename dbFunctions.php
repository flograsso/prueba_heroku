
<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
//database
$DB_HOST=$url["host"];
$DB_USERNAME=$url["user"];
$DB_PASSWORD=$url["pass"];
$DB_NAME=substr($url["path"], 1);

//get connection
//(MySQLi Object-Oriented)


$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if(!$conn){
	die("Connection failed: " . $conn->error);
}


function setValueDb($table, $field, $value)
{

    $sql="INSERT INTO `$table` (`$field`) VALUES ('$value');";
    echo "INSERT INTO `$table` (`$field`) VALUES ('$value');";
    $conn->query($sql);

}

function updateAllValuesDb($table, $field, $value)
{
    $sql="UPDATE `$table` SET '$field'='$value' WHERE 1;";
    $conn->query($sql); 
}

function getValueDb($table, $field)
{

    $sql="SELECT `$field` FROM `$table` WHERE 1;";
    $result = $conn->query($sql);
    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    return $outp;

  
}

echo "acces_token: ". getValueDb("token","access_token");

?>