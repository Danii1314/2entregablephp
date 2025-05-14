<?php
// Parámetros de conexión
$servername = "localhost";   // Si estás usando XAMPP en tu máquina local
$username = "root";          // Usuario por defecto de MySQL en XAMPP
$password = "";              // La contraseña está vacía por defecto en XAMPP
$dbname = "xpeditefreightdb";       // El nombre de la base de datos que creaste

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
//echo "Conexión exitosa";
?>