<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_usuario_auxiliar = isset($_POST['id_usuario']) ? intval($_POST['id_usuario']) : null; // auxiliar
    $identificacion = trim($_POST['identificacion'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $id_conductor = isset($_POST['id_conductor']) ? intval($_POST['id_conductor']) : null; // conductor (id_usuario)

    if (!$id_usuario_auxiliar || !$identificacion || !$telefono || !$id_conductor) {
        $_SESSION['error_registro'] = "Todos los campos son obligatorios.";
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/RegistroAuxiliar&id_usuario=$id_usuario_auxiliar");
        exit;
    }

    // Insertar directamente, usando id_conductor = id_usuario del conductor seleccionado
    $stmt = $conn->prepare("INSERT INTO auxiliares (id_usuario, identificacion, telefono, id_conductor) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error_registro'] = "Error al preparar la consulta: " . $conn->error;
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/RegistroAuxiliar&id_usuario=$id_usuario_auxiliar");
        exit;
    }

    $stmt->bind_param("issi", $id_usuario_auxiliar, $identificacion, $telefono, $id_conductor);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
        exit;
    } else {
        $_SESSION['error_registro'] = "Error al registrar auxiliar: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/RegistroAuxiliar&id_usuario=$id_usuario_auxiliar");
        exit;
    }
} else {
    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
    exit;
}
?>
