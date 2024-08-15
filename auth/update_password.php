<?php
// Conexión a la base de datos
include '../Modelos/ConexionBD.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verifica si el token es válido y no ha expirado
    $result = $conn->query("SELECT * FROM users WHERE reset_token='$token' AND token_expiry > NOW()");

    if ($result->num_rows > 0) {
        // Actualiza la contraseña en la base de datos
        $conn->query("UPDATE usuarios SET clave='$new_password', reset_token=NULL, token_expiry=NULL WHERE reset_token='$token'");
        echo "Tu contraseña ha sido restablecida.";
    } else {
        echo "Token inválido o expirado.";
    }
}
?>
