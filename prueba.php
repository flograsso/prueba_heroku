<!DOCTYPE html>
    <html lang="en" >

<p> Hola </p>
<?php
//require '../Meli/meli.php';
//require '../configApp.php';


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
echo $db;
echo $server;
$conn = new mysqli($server, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql="INSERT INTO `aaaaa` (`idPregunta`, `datePregunta`, `dateRespuesta`, `pregunta`, `respuesta`, `demora`) VALUES ('1', '2018-04-04', '2018-04-05', 'aaa', 'aa', '111');";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "SELECT * FROM `aaaaa` WHERE 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['idPregunta'];
    }
} else {
    echo "0 results";
}


$conn->close();

?>
