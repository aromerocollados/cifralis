<?php
header('Content-Type: application/json');
require_once '../config/db.php';
require_once 'utils/utils.php';

$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    echo json_encode(['message' => 'Invalid JSON input', 'success' => false]);
    exit;
}

$correo = $data['correo']; 
$password = $data['password'];

// Validar correo electrónico
$validacionCorreo = validarCorreo($correo);
if (!$validacionCorreo['success']) {
    echo json_encode($validacionCorreo);
    exit;
}

// Validar longitud de la contraseña
$validacionPassword = validarPassword($password);
if (!$validacionPassword['success']) {
    echo json_encode($validacionPassword);
    exit;
}

// Comprobar si el correo existe en la base de datos
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
$stmt->bindParam(':correo', $correo);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el usuario existe y la contraseña es correcta
if ($user && password_verify($password, $user['password_hash'])) {
    echo json_encode(['message' => 'Login exitoso, redirigiendo...', 'success' => true, 'redirect' => 'inicio.php']);
} else {
    echo json_encode(['message' => 'Correo o contraseña incorrectos', 'success' => false]);
}
?>