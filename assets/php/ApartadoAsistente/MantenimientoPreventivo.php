<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mantenimientos Preventivos</title>
<link rel="stylesheet"href="/Visualestudio/2entregablephp/assets/Css/components/navbarAsistente.css">
<link rel="stylesheet"href="/Visualestudio/2entregablephp/assets/Css/ApartadoAsistente/MantenimientosPreventivos.css">
</head>
<body>

  
</head>
<?php
    include __DIR__ . '/../../../templates/components/php/navbarAsistente.php';
  ?>

<div class="form-wrapper">
  <form class="form" method="POST" action="procesar_mantenimiento.php">
    <h2 class="title">Mantenimientos Preventivos</h2>

    <label>Placa del vehículo
      <input type="text" name="placa" class="input" required>
    </label>

    <label>Tipo de mantenimiento
      <select name="tipo" class="input" required>
        <option value="">Seleccione una opción</option>
        <option value="cambio_aceite">Cambio de aceite</option>
        <option value="revision_frenos">Revisión de frenos</option>
        <option value="alineacion">Alineación</option>
      </select>
    </label>

    <label>Costo del mantenimiento
      <input type="number" name="costo" class="input" required>
    </label>

    <button type="submit" class="submit">Registrar Mantenimiento</button>
  </form>
</div>

</body>
</html>
