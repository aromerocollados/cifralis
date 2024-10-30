<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../logo/logo.svg">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css">
    <title>Cifralis</title>
</head>
<body id="home">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="sidebar-logo">
                    <img src="../logo/logo.svg" alt="Logo" width="120" height="120">
                    <h2>Cifralis</h2>
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-house-door"></i> Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-key"></i> Contraseñas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-shuffle"></i> Generador
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-folder"></i> Carpetas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-gear"></i> Ajustes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link logout" href="#" onclick="cerrarSesion()">
                                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <!-- Main Content -->
            <main id="content" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">    
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 mb-0">Página Principal</h1>
                    <button id="sidebarToggle" class="btn btn-primary d-md-none ms-auto">
                        <i class="bi bi-list"></i>
                    </button>
                </div>

                <div class="quick-access mb-4">
                    <h4>Acceso Rápido</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <button class="btn btn-light w-100"><i class="bi bi-plus-circle"></i> Nueva Contraseña</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-light w-100"><i class="bi bi-search"></i> Buscar Contraseña</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-light w-100"><i class="bi bi-shield-check"></i> Análisis de Seguridad</button>
                        </div>
                    </div>
                </div>
                
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Resumen de Contraseñas</h5>
                                <p class="card-text">Total: 30</p>
                                <p class="card-text">Fuertes: 18</p>
                                <p class="card-text">Débiles: 12</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script.js"></script>
    <script>
        cambiarActive() 
        mostrarSidebar()
    </script>
</body>
</html>
