<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Logo del sitio -->
    <a href="index.php" class="brand-link">
        <img src="https://via.placeholder.com/160x160" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sabor a Muerte</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Usuario actual -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://via.placeholder.com/50x50" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Administrador</a>
            </div>
        </div>

        <!-- Menú lateral -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Panel principal -->
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Gestión de Clientes -->
                <li class="nav-item">
                    <a href="cliente.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <!-- Gestión de Ventas -->
                <li class="nav-item">
                    <a href="ventas.php" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Ventas</p>
                    </a>
                </li>

                <!-- Gestión de Empleados -->
                <li class="nav-item">
                    <a href="empleados.php" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Empleados</p>
                    </a>
                </li>

                <!-- Ajustes o Configuración -->
                <li class="nav-item">
                    <a href="settings.php" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Configuración</p>
                    </a>
                </li>

                <!-- Cerrar sesión -->
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar sesión</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Fin del menú lateral -->
    </div>
    <!-- Fin del sidebar -->
</aside>
