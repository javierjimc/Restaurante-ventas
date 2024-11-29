<?php
include("../mail/conexion.php");
function getVentasTotales($conn) {
    $query = "SELECT SUM(total) AS totalVentas FROM ventas";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['totalVentas'];
    } else {
        return 0; // Si no hay resultados, devolver 0
    }
}

// Función para obtener las ventas activas
function getVentasActivas($conn) {
    $query = "SELECT SUM(total) AS totalVentasActivas FROM ventas WHERE estado != 'completada'";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['totalVentasActivas'];
    } else {
        return 0;
    }
}

// Función para obtener los clientes únicos
function getClientesUnicos($conn) {
    $query = "SELECT COUNT(DISTINCT id_cliente) AS clientesUnicos FROM ventas";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['clientesUnicos'];
    } else {
        return 0;
    }
}

// Otras funciones o configuraciones de conexión que puedas tener...
?>
