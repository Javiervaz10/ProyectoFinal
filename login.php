<?php
session_start();

// Definir usuario y contraseña
$stored_username = 'admin';
$stored_password = 'adminpass';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar usuario y contraseña
    if ($username === $stored_username && $password === $stored_password) {
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
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
    <div class="login-container">
        <h1>LINA LOGIN</h1>
    </header>
    <main>
        <form action="login.php" method="post">
            <?php if (!empty($error)) : ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
    </main>
</body>
</html>
