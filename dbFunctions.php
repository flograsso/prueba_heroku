
<?php
require_once("connection.php");

function setValueDb($table, $field, $value)
{
    if ($conn)
    {
        $sql="INSERT INTO `$table` (`$field`) VALUES ('$value');";
        echo "INSERT INTO `$table` (`$field`) VALUES ('$value');";
        $conn->query($sql);

    }
}

function updateAllValuesDb($table, $field, $value)
{
    $sql="UPDATE `$table` SET '$field'='$value' WHERE 1;";
    $conn->query($sql); 
}

function getValueDb($table, $field)
{
    if ($conn)
    {
        $sql="SELECT `$field` FROM `$table` WHERE 1;";
        echo "SELECT `$field` FROM `$table` WHERE 1;";
        $result = $conn->query($sql);
        $outp = array();
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        return $outp;
    }
    else
        {
            echo "error";
        }
}

echo "acces_token: ". getValueDb("token","access_token");

?>