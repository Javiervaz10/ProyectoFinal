<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LINA INDUSTRY - Lista de Empleados</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>LINA INDUSTRY - Lista de Empleados</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Puesto</th>
                    <th>Días de Trabajo</th>
                    <th>Horas de Trabajo</th>
                    <th>Días de Vacaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'includes/config.php';

                $sql = "SELECT * FROM empleados";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['apellido_paterno']}</td>
                            <td>{$row['apellido_materno']}</td>
                            <td>{$row['puesto']}</td>
                            <td>{$row['dias_trabajo']}</td>
                            <td>{$row['horas_trabajo']}</td>    
                            <td>{$row['dias_vacaciones']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='10'>No hay empleados registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="index.html">Registrar nuevo</a>
    </main>
</body>
</html>
