<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y limpiar datos
    $id_usuario = isset($_POST['id_usuario']) ? intval($_POST['id_usuario']) : null;
    $tipo_pase = trim($_POST['tipo_pase'] ?? '');
    $identificacion = trim($_POST['identificacion'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $id_vehiculo = isset($_POST['id_vehiculo']) ? intval($_POST['id_vehiculo']) : null;

    // Validaciones básicas
    if (!$id_usuario || !$tipo_pase || !$identificacion || !$telefono || !$id_vehiculo) {
        $_SESSION['error_registro'] = "Todos los campos son obligatorios.";
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registroConductor&id_usuario=$id_usuario");
        exit;
    }

    // Insertar en tabla conductor
    $stmt = $conn->prepare("INSERT INTO conductores (id_usuario, tipo_pase, identificacion, telefono, id_vehiculo) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error_registro'] = "Error al preparar la consulta: " . $conn->error;
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registroConductor&id_usuario=$id_usuario");
        exit;
    }

    $stmt->bind_param("isssi", $id_usuario, $tipo_pase, $identificacion, $telefono, $id_vehiculo);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        // Registro exitoso, redirigir a login
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
        exit;
    } else {
        $_SESSION['error_registro'] = "Error al registrar conductor: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registroConductor&id_usuario=$id_usuario");
        exit;
    }
} else {
    // Si no es POST, redirigir a login
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
    exit;
}
