<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
} else {
    echo "Token no válido.";
    exit();
}
?>
<form action="update_password.php" method="POST">
    <input type="hidden" name="token" value="<?php echo $token; ?>">
    <label for="password">Nueva contraseña:</label>
    <input type="password" id="clave" name="clave" required>
    <button type="submit">Restablecer contraseña</button>
</form>
