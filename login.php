<?php
session_start(); 
// Datos de conexión a la base de datos
$servername = "empleados-db.mysql.database.azure.com";
$username = "u20051268@empleados-db";
$password = "userL20051268";
$dbname = "industria";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Datos del formulario de registro
$register_username = $_POST['username'];
$register_password = $_POST['password'];

// Hashear la contraseña antes de almacenarla
$hashed_password = password_hash($register_password, PASSWORD_DEFAULT);

// Insertar el usuario en la base de datos
$sql = "INSERT INTO administradores (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $register_username, $hashed_password);

if ($stmt->execute()) {
    echo "Usuario registrado con éxito.";
} else {
    echo "Error al registrar el usuario: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
