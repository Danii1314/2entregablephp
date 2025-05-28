<?php


require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_vehiculo = isset($_POST['tipo_vehiculo']) ? trim($_POST['tipo_vehiculo']) : '';
    $placa = isset($_POST['placa_vehiculo']) ? strtoupper(trim($_POST['placa_vehiculo'])) : '';

    // Ruta absoluta al formulario
    $form_url = "/Visualestudio/2entregablephp/public/index.php?ruta=usuario/inscripcionVehiculo";

    // Validar campos obligatorios
    if (empty($tipo_vehiculo) || empty($placa)) {
        $_SESSION['error_vehiculo'] = "Todos los campos son obligatorios.";
        header("Location: $form_url");
        exit;
    }

    // Validar formato de placa (opcional, ejemplo para placas tipo ABC123)
    if (!preg_match('/^[A-Z]{3}[0-9]{3}$/', $placa)) {
        $_SESSION['error_vehiculo'] = "La placa debe tener el formato ABC123.";
        header("Location: $form_url");
        exit;
    }

    // Verificar si la placa ya existe
    $stmt = $conn->prepare("SELECT id_vehiculo FROM vehiculos WHERE placa = ?");
    if (!$stmt) {
        $_SESSION['error_vehiculo'] = "Error al preparar la consulta SELECT: " . $conn->error;
        header("Location: $form_url");
        exit;
    }
    $stmt->bind_param("s", $placa);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['error_vehiculo'] = "La placa ya está registrada.";
        $stmt->close();
        $conn->close();
        header("Location: $form_url");
        exit;
    }
    $stmt->close();

    // Insertar el vehículo
    $stmt = $conn->prepare("INSERT INTO vehiculos (tipo_vehiculo, placa) VALUES (?, ?)");
    if (!$stmt) {
        $_SESSION['error_vehiculo'] = "Error al preparar la consulta INSERT: " . $conn->error;
        header("Location: $form_url");
        exit;
    }
    $stmt->bind_param("ss", $tipo_vehiculo, $placa);

    if ($stmt->execute()) {
        $_SESSION['mensaje_vehiculo'] = "Vehículo registrado exitosamente.";
    } else {
        $_SESSION['error_vehiculo'] = "Error al registrar el vehículo: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: $form_url");
    exit;
}