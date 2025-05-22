<?php
// Incluir la conexión a la base de datos
require_once($_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/data/database.php');

// Obtener el cargo enviado desde la página anterior (tipo de usuario)
$idCargoSeleccionado = isset($_GET['idCargophp']) ? intval($_GET['idCargophp']) : null;


// Consulta para obtener cargos
$query = "SELECT * FROM cargos"; 
$result = $conn->query($query);

if (!$result) {
    die('Error al obtener los cargos: ' . $conn->error);
}

$cargos = [];
while ($row = $result->fetch_assoc()) {
    $cargos[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro - Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoUsuario/Registro.css">
</head>
<body>
  <form class="form" action="/Visualestudio/2entregablephp/app/controllers/registrar_usuario.php" method="POST">
    <p id="heading">Registro de Usuario <br><br>Xpedite Freight</p>

    <?php if (isset($_SESSION['error_registro'])): ?>
    <div style="color: red;"><?= $_SESSION['error_registro']; ?></div>
    <?php unset($_SESSION['error_registro']); ?>
    <?php endif; ?>

    <!-- Campos del formulario -->

    <div class="field">
      <!-- icono nombre -->
      <svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="input-icon">
        <path d="M8 8a3 3 0 100-6 3 3 0 000 6zM2 14s1-4 6-4 6 4 6 4H2z"/>
      </svg>
      <input type="text" name="nombre" class="input-field" placeholder="Nombre" autocomplete="given-name" required>
    </div>

    <div class="field">
      <!-- icono apellido -->
      <svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="input-icon">
        <path d="M8 8a3 3 0 100-6 3 3 0 000 6zM2 14s1-4 6-4 6 4 6 4H2z"/>
      </svg>
      <input type="text" name="apellido" class="input-field" placeholder="Apellido" autocomplete="family-name" required>
    </div>

    <div class="field">
      <!-- icono correo -->
      <svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="input-icon">
        <path d="M0 4a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H2a2 2 0 01-2-2V4zm2 .2v.511l6 3.6 6-3.6V4.2L8 7.8 2 4.2z"/>
      </svg>
      <input type="email" name="correo" class="input-field" placeholder="Correo electrónico" autocomplete="email" required>
    </div>

    <div class="field">
      <!-- icono contraseña -->
      <svg viewBox="0 0 16 16" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg" class="input-icon">
        <path d="M8 1a2 2 0 012 2v4H6V3a2 2 0 012-2zm3 6V3a3 3 0 00-6 0v4a2 2 0 00-2 2v5a2 2 0 002 2h6a2 2 0 002-2V9a2 2 0 00-2-2z"/>
      </svg>
      <input type="password" name="contrasena" class="input-field" placeholder="Contraseña" autocomplete="new-password" required>
    </div>

 <?php if (!$idCargoSeleccionado): ?>
  <!-- Mostrar select para elegir cargo SOLO si no viene uno seleccionado -->
  <div class="field">
    <svg ...></svg>
    <select name="tipo_cargo" class="input-field" required>
      <option value="" disabled selected>Selecciona tipo de cargo</option>
      <?php 
      foreach ($cargos as $row) {
        echo '<option value="'.htmlspecialchars($row['id_cargo']).'">'
             .htmlspecialchars($row['nombre_cargo']).'</option>';
      }
      ?>
    </select>
  </div>
<?php else: ?>
  <!-- Si ya viene cargo, no mostrar select sino input oculto -->
  <input type="hidden" name="tipo_cargo" value="<?= htmlspecialchars($idCargoSeleccionado); ?>">
<?php endif; ?>

    <div class="btn">
      <button type="submit" class="button1">Registrar</button>
      <a href="/Visualestudio/2entregablephp/public/index.php?ruta=usuario/login"><button type="button" class="button2">Volver a Iniciar Sesión</button></a>
    </div>
  </form>
</body>
</html>
