<?php


require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_flete = isset($_POST['flete']) ? intval($_POST['flete']) : 0;
    $placa = isset($_POST['placa_asignar']) ? strtoupper(trim($_POST['placa_asignar'])) : '';

    // Ruta absoluta al formulario
    $form_url = "/Visualestudio/2entregablephp/assets/php/ApartadoAsistente/asignacionFletes.php";

    // Validar campos obligatorios
    if (empty($id_flete) || empty($placa)) {
        $_SESSION['error_asignacion'] = "Todos los campos son obligatorios.";
        header("Location: $form_url");
        exit;
    }

    // Verificar que el flete exista
    $stmt = $conn->prepare("SELECT id_flete FROM fletes WHERE id_flete = ?");
    if (!$stmt) {
        $_SESSION['error_asignacion'] = "Error al preparar la consulta de flete: " . $conn->error;
        header("Location: $form_url");
        exit;
    }
    $stmt->bind_param("i", $id_flete);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 0) {
        $_SESSION['error_asignacion'] = "El flete no existe.";
        $stmt->close();
        header("Location: $form_url");
        exit;
    }
    $stmt->close();

    // Verificar que la placa exista y obtener id_vehiculo
    $stmt = $conn->prepare("SELECT id_vehiculo FROM vehiculos WHERE placa = ?");
    if (!$stmt) {
        $_SESSION['error_asignacion'] = "Error al preparar la consulta de vehículo: " . $conn->error;
        header("Location: $form_url");
        exit;
    }
    $stmt->bind_param("s", $placa);
    $stmt->execute();
    $stmt->bind_result($id_vehiculo);
    if ($stmt->fetch()) {
        $stmt->close();
    } else {
        $_SESSION['error_asignacion'] = "La placa no existe.";
        $stmt->close();
        header("Location: $form_url");
        exit;
    }
 // Verificar que el flete no esté ya asignado
    $stmt = $conn->prepare("SELECT id_asignacion FROM asignacion_fletes WHERE id_flete = ?");
    if (!$stmt) {
        $_SESSION['error_asignacion'] = "Error al preparar la consulta de verificación: " . $conn->error;
        header("Location: $form_url");
        exit;
    }
    $stmt->bind_param("i", $id_flete);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['error_asignacion'] = "Este flete ya está asignado a un vehículo.";
        $stmt->close();
        header("Location: $form_url");
        exit;
    }
    $stmt->close();
    // Insertar la asignación (fecha actual y estado 'pendiente')
    $fecha_asignacion = date('Y-m-d');
    $estado_asignacion = 'ASIGNADO';

    $stmt = $conn->prepare("INSERT INTO asignacion_fletes (id_flete, id_vehiculo, fecha_asignacion, estado_asignacion) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error_asignacion'] = "Error al preparar la consulta de asignación: " . $conn->error;
        header("Location: $form_url");
        exit;
    }
    $stmt->bind_param("iiss", $id_flete, $id_vehiculo, $fecha_asignacion, $estado_asignacion);

    if ($stmt->execute()) {
        $_SESSION['mensaje_asignacion'] = "Flete asignado exitosamente.";
    } else {
        $_SESSION['error_asignacion'] = "Error al asignar el flete: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: $form_url");
    exit;
}