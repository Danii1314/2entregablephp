<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');

header('Content-Type: application/json');

try {
    // Inicializamos valores por defecto
    $ingresosMes = 0;
    $gastosMes = 0;
    $utilidadNeta = 0;
    $viajesMes = 0;

    $peajes = 0;
    $mantenimiento = 0;

    // Suma total de costos de rodamientos (peajes y rodamientos)
    $queryRodamientos = "SELECT IFNULL(SUM(costo), 0) AS total_rodamientos FROM rodamientos";
    $resultRodamientos = $conn->query($queryRodamientos);
    if ($resultRodamientos) {
        $row = $resultRodamientos->fetch_assoc();
        $peajes = $row['total_rodamientos'];
    }

    // Suma total costos de mantenimientos
    $queryMantenimientos = "SELECT IFNULL(SUM(costo), 0) AS total_mantenimientos FROM mantenimientos";
    $resultMantenimientos = $conn->query($queryMantenimientos);
    if ($resultMantenimientos) {
        $row = $resultMantenimientos->fetch_assoc();
        $mantenimiento = $row['total_mantenimientos'];
    }


   


    $queryFletes = "SELECT IFNULL(SUM(valor), 0) AS total_fletes FROM fletes";
    $resultFletes = $conn->query($queryFletes);
    $fletes = 0;
    if ($resultFletes) {
        $row = $resultFletes->fetch_assoc();
        $fletes = $row['total_fletes'];
    }
    // Puedes calcular gastosMes, utilidadNeta, viajesMes si tienes esas tablas y datos

    echo json_encode([
        'ingresosMes' => number_format($fletes, 2),   // Ingresos del mes actualizamos con la suma de fletes
        'gastosMes' => number_format($gastosMes, 2),
        'utilidadNeta' => number_format($utilidadNeta, 2),
        'viajesMes' => $viajesMes,
        'peajes' => number_format($peajes, 2),
        'mantenimiento' => number_format($mantenimiento, 2),
        'fletes' => number_format($fletes, 2), // opcional, si quieres mostrar en otro lugar
    ]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

$conn->close();
