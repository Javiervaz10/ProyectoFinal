<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM empleados WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
echo "<a href='read.php'>Volver a la lista de empleados</a>";
?>
