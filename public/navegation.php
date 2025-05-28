<?php
// Archivo: /public/navegation.php

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Configuración de rutas ABSOLUTAS desde el root del proyecto
$rutasValidas = [
    'usuario' => [
        
        // Rutas para el apartado de usuarios
        'inicio' => __DIR__.'/../assets/php/ApartadoUsarios/ApartadoUsuario.php',
        'login' => __DIR__.'/../assets/php/ApartadoUsarios/InicioSeccion.php',
        'registroTdCargo' => __DIR__.'/../assets/php/ApartadoUsarios/RegistroTipoDeUsuario.php',
        'registroConductor' => __DIR__.'/../assets/php/ApartadoUsarios/RegistroConductor.php',
        'registroAuxiliar' => __DIR__.'/../assets/php/ApartadoUsarios/RegistroAuxiliar.php',
        'registroAsistente' => __DIR__.'/../assets/php/ApartadoUsarios/RegistroAsistente.php',
        'registro'=> __DIR__.'/../assets/php/ApartadoUsarios/Registro.php',

        // Rutas para el apartado de gerente
        'contabilidad' => __DIR__.'/../assets/php/ApartadoGerente/Contabilidad.php',
        'gerente'=> __DIR__.'/../assets/php/ApartadoGerente/Inicio.php',

        // Rutas para el apartado de conductor
        'conductor'=> __DIR__.'/../assets/php/ApartadoConductor/Inicio.php',
        'mantenimientoCorrectivo'=> __DIR__.'/../assets/php/ApartadoConductor/mantenimientosCorrectivos.php',
        'registrarRodamiento' => __DIR__.'/../assets/php/ApartadoConductor/Rodamientos.php',

        // Rutas para el apartado de asistente
        'asistente'=> __DIR__.'/../assets/php/ApartadoAsistente/auxiliaresAsistente.php',
        'registroFlete'=>__DIR__.'/../assets/php/ApartadoAsistente/RegistrosFletes.php',
        'asignacionFletes'=>__DIR__.'/../assets/php/ApartadoAsistente/asignacionFletes.php',
        'MantenimientoPreventivo'=> __DIR__.'/../assets/php/ApartadoAsistente/MantenimientoPreventivo.php',
        'inscripcionVehiculo' => __DIR__.'/../assets/php/ApartadoAsistente/inscripcionVehicular.php',
       
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