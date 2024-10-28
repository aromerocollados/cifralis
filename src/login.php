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

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {
        echo json_encode(['message' => 'Login exitoso, redirigiendo...', 'success' => true]);
    } else {
        echo json_encode(['message' => 'Correo o contraseña incorrectos', 'success' => false]);
    }
} catch (PDOException $e) {
    echo json_encode(['message' => 'Database error: ' . $e->getMessage(), 'success' => false]);
} catch (Exception $e) {
    echo json_encode(['message' => 'Error: ' . $e->getMessage(), 'success' => false]);
}
?>