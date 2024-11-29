<?php
session_start();
require('../conexion.php');

// Consultar suscriptores
$result = $conn->query("SELECT * FROM suscriptores");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevos Suscriptores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Nuevos Suscriptores</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre Cliente</th>
                    <th>Email</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['nombre_cliente']; ?></td>
                        <td><?php echo $fila['email']; ?></td>
                        <td><?php echo $fila['fecha_registro']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
