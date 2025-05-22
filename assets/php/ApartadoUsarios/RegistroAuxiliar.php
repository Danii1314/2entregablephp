<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_usuario = isset($_GET['id_usuario']) ? intval($_GET['id_usuario']) : null;
if (!$id_usuario) {
    die("ID de usuario no válido.");
}

// Obtener usuarios que son conductores
$queryUsuariosConductores = "
    SELECT u.id_usuario, u.nombre, u.apellido
    FROM usuarios u
    INNER JOIN conductores c ON u.id_usuario = c.id_usuario
";
$result = $conn->query($queryUsuariosConductores);

$conductores = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $conductores[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Datos adicionales Auxiliar - Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoUsuario/RegistroAuxiliar.css" />
</head>
<body>
  <?php if (isset($_SESSION['error_registro'])): ?>
    <div style="color: red; margin-bottom: 1em;">
      <?= $_SESSION['error_registro']; unset($_SESSION['error_registro']); ?>
    </div>
  <?php endif; ?>

  <form class="form" action="/Visualestudio/2entregablephp/app/controllers/ControllerAuxiliar.php" method="POST">
    <p id="heading">Datos adicionales para Auxiliar</p>

    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario); ?>">

    <div class="field">
      <input type="text" name="identificacion" placeholder="Identificación" class="input-field" required />
    </div>

    <div class="field">
      <input type="text" name="telefono" placeholder="Teléfono" class="input-field" required />
    </div>

    <div class="field">
      <select name="id_conductor" class="input-field" required>
        <option value="" disabled selected>Selecciona un conductor</option>
        <?php foreach ($conductores as $conductor): ?>
            <option value="<?= htmlspecialchars($conductor['id_usuario']); ?>">
            <?= htmlspecialchars($conductor['nombre'] . ' ' . $conductor['apellido']); ?>
            </option>
        <?php endforeach; ?>
        </select>
    </div>

    <div class="btn">
      <button type="submit" class="button1">Guardar datos Auxiliar</button>
    </div>
  </form>
</body>
</html>
