<?php
header('Content-Type: application/json');
require_once '../config/db.php';

try {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) {
        echo json_encode(['message' => 'Invalid JSON input', 'success' => false]);
        exit;
    }

    $correo = $data['correo'];
    $password = $data['password'];

    // Validar correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['message' => 'Correo electrónico no válido', 'success' => false]);
        exit;
    }

    // Validar longitud de la contraseña
    if (strlen($password) < 8) {
        echo json_encode(['message' => 'La contraseña debe tener al menos 8 caracteres', 'success' => false]);
        exit;
    }

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (correo, password_hash) VALUES (:correo, :password_hash)");
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':password_hash', $password_hash);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Registro exitoso', 'success' => true]);
    } else {
        echo json_encode(['message' => 'Error al registrar usuario', 'success' => false]);
    }
} catch (PDOException $e) {
    echo json_encode(['message' => 'Database error: ' . $e->getMessage(), 'success' => false]);
} catch (Exception $e) {
    echo json_encode(['message' => 'Error: ' . $e->getMessage(), 'success' => false]);
}
?>