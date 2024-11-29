<?php
include("../mail/conexion.php");
include 'backendEmpleado.php'; // Incluye las funciones del backend
$empleados = getEmpleados($conn); // Obtén la lista de empleados

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados - AdminLTE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Sidebar y Navbar se reutilizan -->
        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">Empleados</h1>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Empleados</h3>
                        </div>
                        <div class="card-body">
                            <table id="tablaEmpleados" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Documento</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Puesto</th>
                                        <th>Salario</th>
                                        <th>Fecha de Contratación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($empleados as $empleado): ?>
                                        <tr>
                                            <td><?= $empleado['id']; ?></td>
                                            <td><?= $empleado['nombre']; ?></td>
                                            <td><?= $empleado['documento']; ?></td>
                                            <td><?= $empleado['email']; ?></td>
                                            <td><?= $empleado['telefono']; ?></td>
                                            <td><?= $empleado['direccion']; ?></td>
                                            <td><?= $empleado['puesto']; ?></td>
                                            <td><?= number_format($empleado['salario'], 2); ?></td>
                                            <td><?= $empleado['fecha_contratacion']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>&copy; <?= date("Y"); ?> Sabor a Muerte.</strong>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tablaEmpleados').DataTable();
        });
    </script>
</body>
</html>
