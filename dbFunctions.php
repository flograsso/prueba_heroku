
<?php

require_once 'connection.php';


function setValueDb($table, $fields, $values)
{
    global $conn;
    $sql="INSERT INTO `$table` ($fields) VALUES ($values);";
    $conn->query($sql);
    echo $sql . "<br>";

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
    echo $outp[$field];
    echo "<br>";
    return $outp[$field];

  
}



function emptyDB($table)
{
    global $conn;
    $sql="DELETE FROM `$table` WHERE 1;";
    $conn->query($sql);
 
}

emptyDB('token');


?>