<?php
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

// Consultar todos los usuarios
$sql = "SELECT username, password FROM administradores";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $password = $row['password'];

    // Hashear la contraseña si no está ya hasheada
    if (!password_needs_rehash($password, PASSWORD_DEFAULT)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Actualizar la contraseña en la base de datos
        $update_sql = "UPDATE administradores SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ss", $hashed_password, $username);
        $stmt->execute();
        $stmt->close();
    }
}

$conn->close();
?>
