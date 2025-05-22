<?php
// Incluir la conexión a la base de datos
include($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');  // Ajusta la ruta según la ubicación de tu archivo

session_start();  // Iniciar la sesión

// Verificar si el formulario fue enviado y si los campos están presentes
if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
    // Recuperar datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos para verificar si el correo existe
    $sql = "SELECT * FROM usuarios WHERE email = ?";  // Usamos un prepared statement para evitar inyecciones SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $correo);  // 's' indica que es un string
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $usuario = $result->fetch_assoc();

        // Verificar si la contraseña es correcta
       // if ($contrasena == $usuario['contrasena']) {  <- sirve no encriptar la contraseña
       if (password_verify($contrasena, $usuario['contrasena'])) {
            // Contraseña correcta, redirigir a otro apartado dependiendo del cargo
            $_SESSION['usuario_id'] = $usuario['id_usuario'];  // Almacenar el ID de usuario en la sesión
            $_SESSION['usuario_email'] = $usuario['email'];  // Almacenar el correo en la sesión
            $_SESSION['usuario_cargo'] = $usuario['id_cargo'];  // Almacenar el cargo del usuario

            // Redirigir según el cargo del usuario
            switch ($usuario['id_cargo']) {
                case 1: // Gerente
                    header('Location:../../public/index.php?ruta=usuario/gerente');
                    exit(); // Detener el script después de redirigir
                case 2: // Asistente
                    header('Location:../../public/index.php?ruta=usuario/asistente');
                    exit();
                case 3: // Conductor
                    header('Location:../../public/index.php?ruta=usuario/conductor');
                    exit();
                default:
                    $_SESSION['error'] = "Cargo no reconocido.";
                    break;
            }
        } else {
            // Contraseña incorrecta
            $_SESSION['error'] = "Contraseña incorrecta. Por favor, intente nuevamente.";
        }
    } else {
        // El correo no existe en la base de datos
        $_SESSION['error'] = "El correo no está registrado. Por favor, verifique sus datos.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();

    // Redirigir al formulario de inicio de sesión con el error
    header('Location:../../public/index.php?ruta=usuario/login');
    exit();
} else {
    // Los campos no fueron enviados correctamente
    $_SESSION['error'] = "Por favor, complete todos los campos del formulario.";
    header('Location: /Visualestudio/2entregablephp/public/index.php?ruta=usuario/login');
    exit();
}
?>