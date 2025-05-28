<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y limpiar datos
    $origen = isset($_POST['origen']) ? trim($_POST['origen']) : '';
    $destino = isset($_POST['destino']) ? trim($_POST['destino']) : '';
    $cliente = isset($_POST['cliente']) ? trim($_POST['cliente']) : '';
    $valor = isset($_POST['valor']) ? floatval($_POST['valor']) : null;

    // Validar que los datos no estén vacíos
    if (empty($origen) || empty($destino) || empty($cliente) || $valor === null) {
        $_SESSION['error_flete'] = "Todos los campos son obligatorios.";
        header("Location: /Visualestudio/2entregablephp/assets/php/ApartadoAsistente/RegistrosFletes.php");
        exit;
    }

    // Preparar e insertar (sin id_flete)
    $stmt = $conn->prepare("INSERT INTO fletes (origen, destino, cliente, valor) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error_flete'] = "Error al preparar la consulta: " . $conn->error;
        header("Location: /Visualestudio/2entregablephp/assets/php/ApartadoAsistente/RegistrosFletes.php");
        exit;
    }

    $stmt->bind_param("sssd", $origen, $destino, $cliente, $valor);

    if ($stmt->execute()) {
        $_SESSION['mensaje_flete'] = "Flete registrado exitosamente.";
    } else {
        $_SESSION['error_flete'] = "Error al guardar el flete: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: /Visualestudio/2entregablephp/assets/php/ApartadoAsistente/RegistrosFletes.php");
    exit;
}