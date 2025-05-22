<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = isset($_POST['id_usuario']) ? intval($_POST['id_usuario']) : null;
    $identificacion = trim($_POST['identificacion'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');

    if (!$id_usuario || !$identificacion || !$telefono || !$direccion) {
        $_SESSION['error_registro'] = "Todos los campos son obligatorios.";
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/RegistroAsistente&id_usuario=$id_usuario");
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO asistentes (id_usuario, identificacion, telefono, direccion) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error_registro'] = "Error al preparar la consulta: " . $conn->error;
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/RegistroAsistente&id_usuario=$id_usuario");
        exit;
    }

    $stmt->bind_param("isss", $id_usuario, $identificacion, $telefono, $direccion);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
        exit;
    } else {
        $_SESSION['error_registro'] = "Error al registrar asistente: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/RegistroAsistente&id_usuario=$id_usuario");
        exit;
    }
} else {
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
    exit;
}
?>
