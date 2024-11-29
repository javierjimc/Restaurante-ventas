<?php

session_start(); // Iniciar la sesión

include('../mail/conexion.php');

if (isset($_POST["users"]) && isset($_POST["password"])) {
    // Asignar valores de los campos users y password
    $users = trim($_POST["users"]);
    $password = trim($_POST["password"]);

    // Validar que los campos no estén vacíos
    if (empty($users) || empty($password)) {
        echo '<h3 class="error">Por favor, complete todos los campos.</h3>';
        exit;
    }

    // Usar una consulta preparada para evitar inyección SQL
    $stmt = $conn->prepare("SELECT usuario, password FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $users);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Validar la contraseña
        $fila = $resultado->fetch_assoc();
        if (password_verify($password, $fila['password'])) {
            // Sesión iniciada correctamente
            $_SESSION['username'] = $users;  // Guardar usuario en la sesión
            header('Location: dashboard.php');  // Redirigir al dashboard
            exit;
        } else {
            // Mensaje general, sin detalles sobre la contraseña incorrecta
            echo '<h3 class="error">Credenciales incorrectas.</h3>';
        }
    } else {
        echo '<h3 class="error">Credenciales incorrectas.</h3>';
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo '<h3 class="error"></h3>';
}

function getVentasTotales($conn) {
    $query = "SELECT SUM(total) AS total FROM ventas";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return number_format($row['total'], 2); // Formato para mostrar el total con dos decimales
}

// Función para obtener los clientes únicos
function getClientesUnicos($conn) {
    $query = "SELECT COUNT(DISTINCT id_cliente) AS clientes_unicos FROM ventas";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    return $row['clientes_unicos'];
}

?>
