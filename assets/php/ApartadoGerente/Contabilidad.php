<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inicializar variables
$ingresosMes = 0;
$gastosMes = 0;
$utilidadNeta = 0;
$viajesMes = 0;
$peajes = 0;
$mantenimiento = 0;

// Consulta suma total 'valor' en fletes (Ingresos)
$queryFletes = "SELECT IFNULL(SUM(valor), 0) AS total_fletes FROM fletes";
$resultFletes = $conn->query($queryFletes);
if ($resultFletes) {
    $row = $resultFletes->fetch_assoc();
    $ingresosMes = $row['total_fletes'];
}
//contar fletes mamahuevos
    $queryViajes = "SELECT COUNT(*) AS total_viajes FROM fletes";
    $resultViajes = $conn->query($queryViajes);
    if ($resultViajes) {
        $row = $resultViajes->fetch_assoc();
        $viajesMes = $row['total_viajes'];
    } else {
        $viajesMes = 0;
    }

// Consulta suma total 'costo' en rodamientos (Peajes y rodamientos)
$queryRodamientos = "SELECT IFNULL(SUM(costo), 0) AS total_rodamientos FROM rodamientos";
$resultRodamientos = $conn->query($queryRodamientos);
if ($resultRodamientos) {
    $row = $resultRodamientos->fetch_assoc();
    $peajes = $row['total_rodamientos'];
}



// Consulta suma total 'costo' en mantenimientos (Mantenimientos)
$queryMantenimientos = "SELECT IFNULL(SUM(costo), 0) AS total_mantenimientos FROM mantenimientos";
$resultMantenimientos = $conn->query($queryMantenimientos);
if ($resultMantenimientos) {
    $row = $resultMantenimientos->fetch_assoc();
    $mantenimiento = $row['total_mantenimientos'];
}

$gastosMes = $peajes + $mantenimiento;

$utilidadNeta = $ingresosMes - $gastosMes ;


// Cierra conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Panel de Contabilidad</title>
    <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoGerente/Contabilidad.css" />
</head>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/Visualestudio/2entregablephp/templates/Components/php/NvarGerente.php"; ?>
<body>
<div class="dashboard">
  <div class="card green">
    <h2>RESUMEN FINANCIERO GENERAL</h2>
    <p>Ingresos del mes: <span id="ingresosMes">$<?= number_format($ingresosMes, 2) ?></span></p>
    <p>Gastos del mes: <span id="gastosMes">$<?= number_format($gastosMes, 2) ?></span></p>
    <p>Utilidad neta: <span id="utilidadNeta">$<?= number_format($utilidadNeta, 2) ?></span></p>
    <p>Viajes realizados en el mes: <span id="viajesMes"><?= $viajesMes ?></span></p>
  </div>

  <div class="card orange">
    <h2>GASTOS OPERATIVOS</h2>
    <!-- Sin combustible y sueldos -->
    <p>Peajes y rodamientos: <span id="peajes">$<?= number_format($peajes, 2) ?></span></p>
    <p>Mantenimiento de vehículos: <span id="mantenimiento">$<?= number_format($mantenimiento, 2) ?></span></p>
  </div>
</div>
</body>
</html>
