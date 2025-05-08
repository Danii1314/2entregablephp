<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignación de Fletes</title>
    <link rel="stylesheet"href="/Visualestudio/2entregablephp/assets/Css/components/navbarAsistente.css">
    <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoAsistente/RegistroFletes.css">
</head>
<body>
<?php
    include __DIR__ . '/../../../templates/components/navbarAsistente.php';
  ?>
<div class="form-wrapper">
  <form class="form" method="POST" action="procesar_asignacion.php">
    <h2 class="title">Asignación de fletes</h2>

    <label>Flete por asignar
      <input type="text" name="flete" class="input" required>
    </label>

    <label>Placa del vehículo
      <input type="text" name="placa_asignar" class="input" required>
    </label>

    <button type="submit" class="submit">Asignar Flete</button>
  </form>
</div>

</body>
</html>
