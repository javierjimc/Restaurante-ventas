<?php
include('../mail/conexion.php');
function getClientes($conn) {
    $sql = "SELECT 
                id, 
                nombre, 
                documento, 
                email, 
                telefono, 
                direccion, 
                fecha_nacimiento, 
                compras, 
                ultima_compra
            FROM clientes";
    $result = $conn->query($sql);
    $clientes = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Guardar cada cliente en el array
            $clientes[] = $row;
        }
    }

    return $clientes;
}
function getCliente($conn, $id) {
    $sql = "SELECT * FROM clientes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Función para obtener el total de clientes
function getTotalClientes($conn) {
    $sql = "SELECT COUNT(*) as total FROM clientes";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    return 0; // Retorna 0 si no hay resultados
}
?>


