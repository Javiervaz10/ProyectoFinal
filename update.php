<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM empleados WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Empleado no encontrado";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $puesto = $_POST['puesto'];
    $dias_trabajo = $_POST['dias_trabajo'];
    $horas_trabajo = $_POST['horas_trabajo'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_salida = $_POST['hora_salida'];
    $dias_vacaciones = $_POST['dias_vacaciones'];

    $sql = "UPDATE empleados SET nombre='$nombre', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', puesto='$puesto', dias_trabajo='$dias_trabajo', horas_trabajo='$horas_trabajo', hora_entrada='$hora_entrada', hora_salida='$hora_salida', dias_vacaciones='$dias_vacaciones' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    echo "<a href='read.php'>Volver a la lista de empleados</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empleado - LINA INDUSTRY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>LINA INDUSTRY</h1>
    </header>
    <main>
        <h2>Actualizar Empleado</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required>

            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo $row['apellido_paterno']; ?>" required>

            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo $row['apellido_materno']; ?>" required>

            <label for="puesto">Puesto:</label>
            <input type="text" id="puesto" name="puesto" value="<?php echo $row['puesto']; ?>" required>

            <label for="dias_trabajo">Días de Trabajo (a la semana):</label>
            <input type="number" id="dias_trabajo" name="dias_trabajo" value="<?php echo $row['dias_trabajo']; ?>" required>

            <label for="horas_trabajo">Horas de Trabajo (al día):</label>
            <input type="number" id="horas_trabajo" name="horas_trabajo" value="<?php echo $row['horas_trabajo']; ?>" required>

            <label for="hora_entrada">Hora de Entrada (hh:mm):</label>
            <input type="time" id="hora_entrada" name="hora_entrada" value="<?php echo $row['hora_entrada']; ?>" required>

            <label for="hora_salida">Hora de Salida (hh:mm):</label>
            <input type="time" id="hora_salida" name="hora_salida" value="<?php echo $row['hora_salida']; ?>" required>

            <label for="dias_vacaciones">Días de Vacaciones:</label>
            <input type="number" id="dias_vacaciones" name="dias_vacaciones" value="<?php echo $row['dias_vacaciones']; ?>" required>

            <button type="submit">Actualizar</button>
        </form>
    </main>
</body>
</html>
