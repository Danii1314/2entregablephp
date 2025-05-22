<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos y limpiar
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['correo']);
    $contrasena = $_POST['contrasena']; // No limpiar para la contraseña
    $id_cargo = intval($_POST['tipo_cargo']); // Asegurar entero

    // Validar que no estén vacíos
    if (!$nombre || !$apellido || !$correo || !$contrasena || !$id_cargo) {
        $_SESSION['error_registro'] = "Todos los campos son obligatorios.";
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registro");
        exit;
    }

    // Verificar que el cargo existe
    $stmt = $conn->prepare("SELECT id_cargo FROM cargos WHERE id_cargo = ?");
    $stmt->bind_param("i", $id_cargo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        $_SESSION['error_registro'] = "El cargo seleccionado no es válido";
        $stmt->close();
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registro");
        exit;
    }
    $stmt->close();

    // Encriptar contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar usuario con consulta preparada
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, contrasena, id_cargo) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error_registro'] = "Error en la preparación de la consulta: " . $conn->error;
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registro");
        exit;
    }
    $stmt->bind_param("ssssi", $nombre, $apellido, $correo, $contrasena_encriptada, $id_cargo);

    if ($stmt->execute()) {
        $id_usuario = $stmt->insert_id;  // Obtiene el id del usuario creado
        $stmt->close();
        $conn->close();

        // Redirigir según cargo para completar datos adicionales
            switch ($id_cargo) {
                case 1: // Gerente
                    header("Location: /Visualestudio/2entregablephp/public/registro-gerente.php?id_usuario=$id_usuario");
                    break;
                case 2: // Asistente
                    header("Location: /Visualestudio/2entregablephp/public/registro-asistente.php?id_usuario=$id_usuario");
                    break;
                case 3: // Conductor
                   header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registroConductor&id_usuario=$id_usuario");

                    break;
                case 4: // Auxiliar
                    header("Location: /Visualestudio/2entregablephp/public/registro-auxiliar.php?id_usuario=$id_usuario");
                    break;
                default:
                    // Si el cargo no coincide, ir a login o inicio
                    header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
                    break;
            }
        exit;
    } else {
        $_SESSION['error_registro'] = "Error al registrar usuario: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registro");
        exit;
    }
}
?>
