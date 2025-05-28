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
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/MantenimientoPreventivo");
        exit;
    }
    $stmt->bind_param("s", $placa);
    $stmt->execute();
    $stmt->bind_result($id_vehiculo);
    if ($stmt->fetch()) {
        $stmt->close();

        // Insertar el mantenimiento sin incluir Placa_Vehiculo porque no existe en la tabla
        $stmt = $conn->prepare("INSERT INTO mantenimientos (id_vehiculo, fecha, tipo, costo) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            $_SESSION['error_mantenimiento'] = "Error en la consulta de inserción de mantenimiento: " . $conn->error;
            header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/MantenimientoPreventivo");
            exit;
        }
        $stmt->bind_param("issd", $id_vehiculo, $fecha, $tipo, $costo);

        if ($stmt->execute()) {
            $_SESSION['mensaje_mantenimiento'] = "Mantenimiento registrado correctamente.";
        } else {
            $_SESSION['error_mantenimiento'] = "Error al registrar el mantenimiento: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error_mantenimiento'] = "La placa ingresada no existe.";
        $stmt->close();
    }
    $conn->close();
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/MantenimientoPreventivo");
    exit;
} else {
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/MantenimientoPreventivo");
    exit;
}
