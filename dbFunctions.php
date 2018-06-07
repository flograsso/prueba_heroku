
<?php
require_once("connection.php");

function setValue($table, $field, $value)
{
    if ($conn)
    {
        $sql="INSERT INTO `$table` (`$field`) VALUES ('$value');";
        echo "INSERT INTO `$table` (`$field`) VALUES ('$value');";
        $conn->query($sql);

    }
}

function updateAllValues($table, $field, $value)
{
    $sql="UPDATE `$table` SET '$field'='$value' WHERE 1;";
    $conn->query($sql); 
}

function getValue($table, $field)
{
    if ($conn)
    {
        $sql="SELECT `$field` FROM `$table` WHERE 1;";
        $result = $conn->query($sql);
        $outp = array();
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        return $outp;


    }
}

echo "acces_token: ". getValue("token","access_token");

?>