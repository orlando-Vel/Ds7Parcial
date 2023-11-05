<?php
$servername = "localhost";
$username = "ds72023";
$password = "ds72023";
$dbname = "bdds7";

try {
    $conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa a la base de datos";
} catch (PDOException $e) {
    echo "Error de conexion" . $e->getMessage();
}
    //$conexion = mysqli_connect($servername, $username, $password, $dbname);
?>