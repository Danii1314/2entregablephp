<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = strtoupper(trim($_POST['placa']));
    $tipo = trim($_POST['tipo']);
    $costo = floatval($_POST['costo']);
    $fecha = date('Y-m-d');

    // Buscar el id_vehiculo por la placa
    $stmt = $conn->prepare("SELECT id_vehiculo FROM vehiculos WHERE placa = ?");
    if (!$stmt) {
        $_SESSION['error_mantenimiento'] = "Error en la consulta de búsqueda de vehículo: " . $conn->error;
        header("Location: mantenimientosCorrectivos.php");
        exit;
    }
    $stmt->bind_param("s", $placa);
    $stmt->execute();
    $stmt->bind_result($id_vehiculo);
    if ($stmt->fetch()) {
        $stmt->close();

        // Insertar el mantenimiento correctivo
        $stmt = $conn->prepare("INSERT INTO mantenimientos (id_vehiculo, fecha, tipo, costo, Placa_Vehiculo, categoria) VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            $_SESSION['error_mantenimiento'] = "Error en la consulta de inserción de mantenimiento: " . $conn->error;
            header("Location: mantenimientosCorrectivos.php");
            exit;
        }
        $categoria = 'correctivo';
        $stmt->bind_param("issdss", $id_vehiculo, $fecha, $tipo, $costo, $placa, $categoria);

        if ($stmt->execute()) {
            $_SESSION['mensaje_mantenimiento'] = "Mantenimiento correctivo registrado correctamente.";
        } else {
            $_SESSION['error_mantenimiento'] = "Error al registrar el mantenimiento: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error_mantenimiento'] = "La placa ingresada no existe.";
        $stmt->close();
    }
    $conn->close();
    header("Location: mantenimientosCorrectivos.php");
    exit;
} else {
    header("Location: mantenimientosCorrectivos.php");
    exit;
}