<?php
// Archivo: /public/navegation.php

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuración de rutas ABSOLUTAS desde el root del proyecto
$rutasValidas = [
    'usuario' => [
        'inicio' => __DIR__.'/../assets/php/ApartadoUsarios/ApartadoUsuario.php',
        'login' => __DIR__.'/../assets/php/ApartadoUsarios/InicioSeccion.php',
    ],
];

// Obtener la ruta solicitada
$ruta = $_GET['ruta'] ?? 'usuario/inicio';

// Dividir la ruta en módulo y acción
$partes = explode('/', $ruta);
$modulo = $partes[0] ?? 'usuario';
$accion = $partes[1] ?? 'inicio';

// Verificar si la ruta existe
if (isset($rutasValidas[$modulo][$accion])) {
    // Verificar si el archivo existe
    if (file_exists($rutasValidas[$modulo][$accion])) {
        require_once $rutasValidas[$modulo][$accion];
    } else {
        error_log("Error: Archivo no encontrado - ".$rutasValidas[$modulo][$accion]);
        header("HTTP/1.0 404 Not Found");
        include __DIR__.'/../templates/404.php';
        exit();
    }
} else {
    header("HTTP/1.0 404 Not Found");
    include __DIR__.'/../templates/404.php';
    exit();
}