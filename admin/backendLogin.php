<?php
session_start(); // Iniciar la sesión

require('../mail/conexion.php');

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
    $stmt = $conn->prepare("SELECT username, password FROM usuarios WHERE username = ?");
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
            echo '<h3 class="error">Contraseña incorrecta.</h3>';
        }
    } else {
        echo '<h3 class="error">El usuario no existe.</h3>';
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo '<h3 class="error">Por favor, ingrese usuario y contraseña.</h3>';
}
?>
