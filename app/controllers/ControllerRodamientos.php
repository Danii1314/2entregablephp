<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $placa = strtoupper(trim($_POST['placa']));
    $tipo_rodamiento = trim($_POST['tipo_rodamiento']);
    $costo = floatval($_POST['costo']);

    // Buscar id_vehiculo por placa
    $stmt = $conn->prepare("SELECT id_vehiculo FROM vehiculos WHERE placa = ?");
    if (!$stmt) {
        $_SESSION['error_rodamiento'] = "Error en la consulta de búsqueda de vehículo: " . $conn->error;
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registrarRodamiento");
        exit;
    }
    $stmt->bind_param("s", $placa);
    $stmt->execute();
    $stmt->bind_result($id_vehiculo);

    if ($stmt->fetch()) {
        $stmt->close();

        // Insertar rodamiento
        $stmt = $conn->prepare("INSERT INTO rodamientos (id_vehiculo, tipo_rodamiento, costo) VALUES (?, ?, ?)");
        if (!$stmt) {
            $_SESSION['error_rodamiento'] = "Error en la inserción del rodamiento: " . $conn->error;
            header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registrarRodamiento");
            exit;
        }

        $stmt->bind_param("isd", $id_vehiculo, $tipo_rodamiento, $costo);

        if ($stmt->execute()) {
            $_SESSION['mensaje_rodamiento'] = "Rodamiento registrado correctamente.";
        } else {
            $_SESSION['error_rodamiento'] = "Error al registrar el rodamiento: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $_SESSION['error_rodamiento'] = "La placa ingresada no existe.";
        $stmt->close();
    }
    $conn->close();

    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registrarRodamiento");
    exit;
} else {
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registrarRodamiento");
    exit;
}
