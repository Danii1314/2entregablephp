<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Visualestudio/2entregablephp/data/database.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Obtener todas las placas de vehículos para el select
$query = "SELECT placa FROM vehiculos ORDER BY placa ASC";
$result = $conn->query($query);

$placas = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $placas[] = $row['placa'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Mantenimiento Correctivo</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoConductor/MantenimientoCorrectivo.css">
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/templates/Components/php/Nvar.php'; ?>

<div class="form-wrapper">
  <form class="form" action="/Visualestudio/2entregablephp/app/controllers/ControllerMantenimientosCorrectivos.php" method="POST">
    <p class="title">Registrar</p>
    <p class="message">Ingresa los datos para registrar el mantenimiento.</p>

    <label for="placa">Placa del vehículo</label>
    <select required name="placa" id="placa" class="input">
      <option value="">Selecciona placa</option>
      <?php foreach ($placas as $placa): ?>
        <option value="<?= htmlspecialchars($placa) ?>"><?= htmlspecialchars($placa) ?></option>
      <?php endforeach; ?>
    </select>

    <label for="tipo">Tipo de mantenimiento</label>
    <select required name="tipo" id="tipo" class="input">
      <option value="">Selecciona tipo</option>
      <option value="motor">Motor</option>
      <option value="frenos">Frenos</option>
      <option value="transmisión">Transmisión</option>
    </select>

    <label for="costo">Costo del mantenimiento</label>
    <input required type="number" step="0.01" name="costo" id="costo" class="input">

    <button class="submit">Registrar</button>
  </form>
</div>

</body>
</html>
