<?php
function validarCorreo($correo) {
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        return ['message' => 'Correo electrónico no válido', 'success' => false];
    }
    return ['success' => true];
}

function validarPassword($password) {
    if (strlen($password) < 8) {
        return ['message' => 'La contraseña debe tener al menos 8 caracteres', 'success' => false];
    }
    return ['success' => true];
}
?>