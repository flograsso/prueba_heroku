
<?php

require_once 'connection.php';


function setValueDb($table, $field, $value)
{
    global $conn;
    $sql="INSERT INTO `$table` (`$field`) VALUES ('$value');";
    $conn->query($sql);

}

function updateAllValuesDb($table, $field, $value)
{
    global $conn;
    $sql="UPDATE `$table` SET '$field'='$value' WHERE 1;";
    $conn->query($sql); 
}

function getValueDb($table, $field)
{
    global $conn;
    $sql="SELECT `$field` FROM `$table` WHERE 1;";
    $result = $conn->query($sql);
    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    return $outp['$field'];

  
}

function emptyDB($table)
{
    global $conn;
    $sql="DELETE FROM `$table` WHERE 1;";
    $conn->query($sql);
 
}



echo "acces_token: ". getValueDb("token","access_token") ;

?>