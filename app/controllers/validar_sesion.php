<?php
// Incluir la conexión a la base de datos
include($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');  // Ajusta la ruta según la ubicación de tu archivo

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
        if ($contrasena == $usuario['contrasena']) {
            // Contraseña correcta, redirigir a otro apartado dependiendo del cargo
            session_start();  // Iniciar la sesión para guardar datos de sesión
            $_SESSION['usuario_id'] = $usuario['id_usuario'];  // Almacenar el ID de usuario en la sesión
            $_SESSION['usuario_email'] = $usuario['email'];  // Almacenar el correo en la sesión
            $_SESSION['usuario_cargo'] = $usuario['id_cargo'];  // Almacenar el cargo del usuario

            // Redirigir según el cargo del usuario
            switch ($usuario['id_cargo']) {
                case 1: // Gerente
                    header('Location: /Visualestudio/2entregablephp/assets/php/ApartadoGerente/Inicio.php');
                    break;
                case 2: // Asistente
                    header('Location: /Visualestudio/2entregablephp/assets/php/ApartadoAsistente/auxiliaresAsistente.php');
                    break;
                case 3: // Conductor
                    header('Location: /Visualestudio/2entregablephp/assets/php/ApartadoConductor/Inicio.php');
                    break;
                
                default:
                    echo "Cargo no reconocido.";
                    break;
            }
            exit();  // Asegúrate de agregar exit() después de header() para detener el script
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta. Por favor, intente nuevamente.";
        }
    } else {
        // El correo no existe en la base de datos
        echo "El correo no está registrado. Por favor, verifique sus datos.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    // Los campos no fueron enviados correctamente
    echo "Por favor, complete todos los campos del formulario.";
}
?>