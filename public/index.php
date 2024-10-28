<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../logo/logo.svg">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css">
    <title>Cifralis</title>
</head>
<body id="login">
    <div id="alert-container"></div>
    <div class="bienvenida mb-4">
        <h1>Inicia sesión en <span>Cifralis</span></h1>
    </div>
    <div class="login-container">
        <div class="logo">
            <img src="../logo/logo.svg" alt="Logo" width="84" height="84">
        </div>
        <form id="loginForm">
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña Maestra</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="show-password" onclick="mostrarContrasena()">
                <label class="form-check-label" for="show-password">Mostrar Contraseña</label>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary" onclick="login()">Acceder</button>
            </div>
        </form>
    </div>
    <div class="footer-links mt-4">
        <p>No estoy registrado, <a href="register.php">Registrarse</a></p>
        <a href="#" class="politica-privacidad">Aviso Legal y Política de Privacidad</a>
    </div>
    <script src="assets/script.js"></script>
</body>
</html>