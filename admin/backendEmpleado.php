<?php
// Verificar conexión
include("../mail/conexion.php");
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para obtener todos los empleados
function getEmpleados($conn) {
    $sql = "SELECT 
                id, 
                nombre, 
                documento, 
                email, 
                telefono, 
                direccion, 
                puesto, 
                salario, 
                fecha_contratacion 
            FROM empleados";
    $result = $conn->query($sql);
    $empleados = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $empleados[] = $row;
        }
    }

    return $empleados;
}

// Función para obtener un empleado por su ID
function getEmpleado($conn, $id) {
    $sql = "SELECT * FROM empleados WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>
