<?php
$servername = "empleados-db.privatelink.mysql.database.azure.com.";
$username = "u20051268";
$password = "userL20051268";
$dbname = "industria";
$ssl = "./ssl/Microsoft RSA Root Certificate Authority 2017.crt";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
