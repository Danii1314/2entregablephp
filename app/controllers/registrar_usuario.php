<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);
    $id_cargo = mysqli_real_escape_string($conn, $_POST['tipo_cargo']); // Cambiado a 'tipo_cargo'

    // Verificar que el cargo existe (usando id_cargo como en tu tabla)
    $query_verificar = "SELECT id_cargo FROM cargos WHERE id_cargo = '$id_cargo'";
    $result_verificar = mysqli_query($conn, $query_verificar);
    
    if (!$result_verificar) {
        die("Error en la consulta: " . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($result_verificar) == 0) {
        $_SESSION['error_registro'] = "El cargo seleccionado no es válido";
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registro");
        exit;
    }

    // Encriptar contraseña
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar usuario (usando id_cargo como en tu tabla)
    $query_insert = "INSERT INTO usuarios (nombre, apellido, email, contrasena, id_cargo) 
                    VALUES ('$nombre', '$apellido', '$correo', '$contrasena', '$id_cargo')";
    
    if (mysqli_query($conn, $query_insert)) {
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login");
        exit;
    } else {
        $_SESSION['error_registro'] = "Error al registrar: ".mysqli_error($conn);
        header("Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/registro");
    }
    
    mysqli_close($conn);
}
?>