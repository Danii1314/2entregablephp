<?php
// Datos de conexión a la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'usuario');
define('DB_PASS', 'contraseña');
define('DB_NAME', 'nombre_basedatos');

// Conexión a MySQL
try {
    $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>