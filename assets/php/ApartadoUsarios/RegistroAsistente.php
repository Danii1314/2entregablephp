<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_usuario = isset($_GET['id_usuario']) ? intval($_GET['id_usuario']) : null;
if (!$id_usuario) {
    die("ID de usuario no válido.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Datos adicionales Asistente - Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoUsuario/RegistroAsistente.css" />
</head>
<body>
  <?php if (isset($_SESSION['error_registro'])): ?>
    <div style="color: red; margin-bottom: 1em;">
      <?= $_SESSION['error_registro']; unset($_SESSION['error_registro']); ?>
    </div>
  <?php endif; ?>

  <form class="form" action="/Visualestudio/2entregablephp/app/controllers/ControllerAsistente.php" method="POST">
    <p id="heading">Datos adicionales para Asistente</p>

    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario); ?>">

    <div class="field">
      <input type="text" name="identificacion" placeholder="Identificación" class="input-field" required />
    </div>

    <div class="field">
      <input type="text" name="telefono" placeholder="Teléfono" class="input-field" required />
    </div>

    <div class="field">
      <input type="text" name="direccion" placeholder="Dirección" class="input-field" required />
    </div>

    <div class="btn">
      <button type="submit" class="button1">Guardar datos Asistente</button>
    </div>
  </form>
</body>
</html>
