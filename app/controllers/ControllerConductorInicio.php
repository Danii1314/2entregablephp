<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

$sql = "SELECT u.nombre, u.apellido, v.placa 
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
} else {
    $nombreCompleto = "Nombre no encontrado";
    $placa = "Placa no asignada";
}
