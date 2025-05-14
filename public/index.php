<?php
/**
 * Punto de entrada principal - /public/index.php
 */

// 1. Configuración básica
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 2. Definir constantes de rutas
define('BASE_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);

// 3. Iniciar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// En /public/index.php, añade al inicio:
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/Visualestudio/2entregablephp');

// 4. Incluir el controlador de navegación
require_once PUBLIC_PATH . '/navegation.php'; 
