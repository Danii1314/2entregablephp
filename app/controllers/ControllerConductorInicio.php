<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
// session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

// Obtener nombre, apellido, placa e id_vehiculo
$sql = "SELECT u.nombre, u.apellido, v.placa, v.id_vehiculo
        FROM usuarios u
        INNER JOIN conductores c ON u.id_usuario = c.id_usuario
        INNER JOIN vehiculos v ON c.id_vehiculo = v.id_vehiculo
        WHERE u.id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($fila = $resultado->fetch_assoc()) {
    $nombreCompleto = $fila['nombre'] . ' ' . $fila['apellido'];
    $placa = $fila['placa'];
    $id_vehiculo = $fila['id_vehiculo'];
} else {
    $nombreCompleto = "Nombre no encontrado";
    $placa = "Placa no asignada";
    $id_vehiculo = null;
}

// Obtener fletes asignados a este vehículo
$fletes = [];
if ($id_vehiculo) {
    $sqlFletes = "SELECT f.id_flete, f.origen, f.destino
                  FROM asignacion_fletes af
                  INNER JOIN fletes f ON af.id_flete = f.id_flete
                  WHERE af.id_vehiculo = ?";
    $stmtFletes = $conn->prepare($sqlFletes);
    $stmtFletes->bind_param("i", $id_vehiculo);
    $stmtFletes->execute();
    $resultFletes = $stmtFletes->get_result();
    while ($row = $resultFletes->fetch_assoc()) {
        $fletes[] = $row;
    }
    $stmtFletes->close();
}