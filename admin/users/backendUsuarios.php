<?php
session_start(); // Iniciar sesión

// Verificar si el usuario es administrador
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');  // Redirigir al login si no está autorizado
    exit;
}

require('../mail/conexion.php');

// Operaciones CRUD (Crear, Leer, Actualizar, Eliminar)

// Leer usuarios
$usuariosQuery = $conn->query("SELECT id, username, email, role FROM usuarios");
$usuarios = $usuariosQuery->fetch_all(MYSQLI_ASSOC);

// Agregar usuario
if (isset($_POST['agregar'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);  // Encriptar contraseña

    if (!empty($username) && !empty($email) && !empty($password) && !empty($role)) {
        $stmt = $conn->prepare("INSERT INTO usuarios (username, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $role);
        if ($stmt->execute()) {
            header('Location: administrar_usuarios.php');  // Redirigir después de agregar
            exit;
        } else {
            echo '<h3 class="error">Error al agregar usuario.</h3>';
        }
    }
}

// Eliminar usuario
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header('Location: administrar_usuarios.php');  // Redirigir después de eliminar
        exit;
    } else {
        echo '<h3 class="error">Error al eliminar usuario.</h3>';
    }
}

// Cerrar conexión
$conn->close();
?>