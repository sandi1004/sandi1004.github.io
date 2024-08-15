<?php
// Conexión a la base de datos
include 'ConexionBD.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['usuario'];

    // Verifica si el correo existe en la base de datos
    $result = $conn->query("SELECT * FROM usuarios WHERE usuario='$email'");
    echo "Holaa";
    
    if ($result->num_rows > 0) {
        // Genera un token único
        $token = bin2hex(random_bytes(50));
        $expiry = date("Y-m-d H:i:s", strtotime('+1 hour')); // Token válido por 1 hora

        // Almacena el token y su caducidad en la base de datos
        $conn->query("UPDATE usuarios SET reset_token='$token', token_expiry='$expiry' WHERE usuario='$email'");

        // URL para restablecer la contraseña
        $resetLink = "https://tusitio.com/auth/reset_password.php?token=$token";
        
        // Enviar correo electrónico
        $subject = "Restablece tu contraseña";
        $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: $resetLink";
        $headers = "From: no-reply@tusitio.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "Correo de recuperación enviado. Por favor, revisa tu bandeja de entrada.";
        } else {
            echo "Error al enviar el correo. Intenta nuevamente.";
        }
    } else {
        echo "Correo no encontrado.";
    }
}
?>
