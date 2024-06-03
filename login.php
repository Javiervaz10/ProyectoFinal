<?php
// Iniciar sesión
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

// Obtener los datos del formulario
$input_username = $_POST['username'];
$input_password = $_POST['password'];

// Consultar la base de datos
$sql = "SELECT * FROM administradores WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $input_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($input_password, $row['password'])) {
        // Iniciar sesión
        $_SESSION['admin'] = $input_username;
        header("Location: index.php");
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LINA INDUSTRY</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>LINA INDUSTRY - Login</h1>
    </header>
    <main>
        <form id="loginForm" action="index.php" method="post">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
    </main>
</body>
</html>
