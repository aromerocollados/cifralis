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
$stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE correo = :correo");
$stmt->bindParam(':correo', $correo);
$stmt->execute();
$count = $stmt->fetchColumn();

if ($count > 0) {
    echo json_encode(['message' => 'El correo ya está registrado', 'success' => false]);
    exit;
}

// Encriptar la contraseña e insertar el nuevo usuario
$password_hash = password_hash($password, PASSWORD_BCRYPT);
$stmt = $pdo->prepare("INSERT INTO usuarios (correo, password_hash) VALUES (:correo, :password_hash)");
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password_hash', $password_hash);

if ($stmt->execute()) {
    echo json_encode(['message' => 'Usuario registrado correctamente, redirigiendo...', 'success' => true, 'redirect' => 'index.php']);
} else {
    echo json_encode(['message' => 'Error al registrar usuario', 'success' => false]);
}
?>