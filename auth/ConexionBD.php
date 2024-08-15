<?php
$servername = "localhost";
$username = "root"; // Cambia al nombre de usuario de tu base de datos
$password = "";     // Cambia a la contraseña de tu base de datos
$dbname = "aulas";  // Cambia al nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
