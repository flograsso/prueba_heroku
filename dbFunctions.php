
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

function getAllValuesDb($table)
{
    global $conn;
    $sql="SELECT * FROM `$table` WHERE 1;";
    $result = $conn->query($sql);
    $outp = array();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp). "<br>";
    echo $outp["access_token"] ."<br>" ;
    return $outp[$field];

  
}



function emptyDB($table)
{
    global $conn;
    $sql="DELETE FROM `$table` WHERE 1;";
    $conn->query($sql);
 
}




?>