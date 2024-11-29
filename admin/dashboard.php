<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está logueado
if (!isset($_SESSION['username'])) {
    header('Location: login.php');  // Redirigir al login si no está logueado
    exit;
}

// Conectar a la base de datos
require('../mail/conexion.php');

// Obtener los datos para el dashboard
$totalClientesQuery = $conn->query("SELECT COUNT(*) AS total FROM clientes");
$totalClientes = $totalClientesQuery->fetch_assoc()['total'];

$totalVentasQuery = $conn->query("SELECT COUNT(*) AS total FROM ventas");
$totalVentas = $totalVentasQuery->fetch_assoc()['total'];

$platilloMasVendidoQuery = $conn->query("
    SELECT platillo, SUM(cantidad) AS total 
    FROM ventas 
    GROUP BY platillo 
    ORDER BY total DESC 
    LIMIT 1
");
$platilloMasVendido = $platilloMasVendidoQuery->fetch_assoc()['platillo'];

$clienteTopQuery = $conn->query("
    SELECT c.nombre, COUNT(v.id) AS total 
    FROM clientes c
    JOIN ventas v ON c.id = v.cliente_id
    GROUP BY c.nombre 
    ORDER BY total DESC 
    LIMIT 1
");
$clienteTop = $clienteTopQuery->fetch_assoc()['nombre'];

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Control</title>
    <style>
        body {
            background: #f3f4f6;
            padding: 20px;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Bienvenido al Tablero de Control, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        
        <div class="row">
            <div class="col-md-3">
                <div class="card p-3 mb-3">
                    <h2>Total Clientes</h2>
                    <p><?php echo $totalClientes; ?></p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3 mb-3">
                    <h2>Total Ventas/Contratos</h2>
                    <p><?php echo $totalVentas; ?></p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3 mb-3">
                    <h2>Platillo Más Vendido</h2>
                    <p><?php echo $platilloMasVendido ?: 'N/A'; ?></p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card p-3 mb-3">
                    <h2>Cliente con Más Servicios</h2>
                    <p><?php echo $clienteTop ?: 'N/A'; ?></p>
                </div>
            </div>
        </div>
        
        <div class="mt-4">
            <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>
</body>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</html>
