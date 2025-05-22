<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/data/database.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$id_usuario = isset($_GET['id_usuario']) ? intval($_GET['id_usuario']) : null;
if (!$id_usuario) {
    die("ID de usuario no válido.");
}

// Obtener lista de vehículos desde la base de datos
$queryVehiculos = "SELECT id_vehiculo, tipo_vehiculo FROM vehiculos"; // Ajusta si el nombre de tabla o columna es distinto
$resultVehiculos = $conn->query($queryVehiculos);

$vehiculos = [];
if ($resultVehiculos && $resultVehiculos->num_rows > 0) {
    while ($row = $resultVehiculos->fetch_assoc()) {
        $vehiculos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Datos adicionales Conductor - Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoUsuario/RegistroConductor.css" />
</head>
<body>
  <form class="form" action="/Visualestudio/2entregablephp/app/controllers/ControllerConductor.php" method="POST">
    <p id="heading">Datos adicionales para Conductor</p>

    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario); ?>">

    <div class="field">
  <select name="tipo_pase" class="input-field" required>
    <option value="" disabled selected>Selecciona tipo de pase</option>
    <option value="C1">C1</option>
    <option value="C2">C2</option>
    <option value="C3">C3</option>
    <option value="C4">C4</option>
    <option value="C5">C5</option>
    <option value="E1">E1</option>
    <option value="E2">E2</option>
    <option value="E3">E3</option>
    <option value="E4">E4</option>
  </select>
</div>


    <div class="field">
      <input type="text" name="identificacion" placeholder="Identificación" class="input-field" required />
    </div>

    <div class="field">
      <input type="text" name="telefono" placeholder="Teléfono" class="input-field" required />
    </div>

    <div class="field">
      <select name="id_vehiculo" class="input-field" required>
        <option value="" disabled selected>Selecciona un vehículo</option>
        <?php foreach ($vehiculos as $vehiculo): ?>
          <option value="<?= htmlspecialchars($vehiculo['id_vehiculo']); ?>">
            <?= htmlspecialchars($vehiculo['tipo_vehiculo']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="btn">
      <button type="submit" class="button1">Guardar datos Conductor</button>
    </div>
  </form>
</body>
</html>
