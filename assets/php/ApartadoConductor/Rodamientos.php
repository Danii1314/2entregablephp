<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Rodamiento</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoConductor/rodamientos.css">
</head>
<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/templates/Components/Nvar.php'; ?>
  
  <div class="form-wrapper">
    <form class="form" action="procesar_rodamiento.php" method="POST">
      <p class="title">Registrar Rodamiento</p>
      <p class="message">Ingresa los datos para registrar el rodamiento.</p>

      <label for="placa">Placa del vehículo</label>
      <input required type="text" name="placa" id="placa" class="input">

      <label for="tipo_rodamiento">Tipo de rodamiento</label>
      <select required name="tipo_rodamiento" id="tipo_rodamiento" class="input">
        <option value="">Selecciona tipo</option>
        <option value="cojinete">Cojinete</option>
        <option value="rodillo">Rodillo</option>
        <option value="bola">De bola</option>
        <option value="aguja">De aguja</option>
      </select>

      <label for="costo">Costo del rodamiento</label>
      <input required type="number" step="0.01" name="costo" id="costo" class="input">

      <button class="submit">Registrar</button>
    </form>
  </div>

</body>
</html>
