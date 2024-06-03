<?php
include 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $puesto = $_POST['puesto'];
    $dias_trabajo = $_POST['dias_trabajo'];
    $horas_trabajo = $_POST['horas_trabajo'];
    $dias_vacaciones = $_POST['dias_vacaciones'];

    $sql = "INSERT INTO empleados (nombre, apellido_paterno, apellido_materno, puesto, dias_trabajo, horas_trabajo, dias_vacaciones)
            VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$puesto', '$dias_trabajo', '$horas_trabajo', '$dias_vacaciones')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.html');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
