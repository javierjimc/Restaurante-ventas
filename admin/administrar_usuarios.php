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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Usuarios</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/contact-form.css" type="text/css">
</head>
<body>
    <div class="container mt-4">
        <h1>Administrar Usuarios</h1>

        <!-- Formulario para agregar usuario -->
        <h2 class="mt-4">Agregar Usuario</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="agregar">Agregar Usuario</button>
        </form>

        <!-- Listado de usuarios -->
        <h2 class="mt-4">Lista de Usuarios</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['username']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['role']); ?></td>
                        <td>
                            <!-- Botón para eliminar usuario -->
                            <a href="?eliminar=<?php echo $usuario['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

 
</body>
</html>
