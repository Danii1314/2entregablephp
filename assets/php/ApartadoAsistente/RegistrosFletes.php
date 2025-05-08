<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Fletes</title>
    <link rel="stylesheet"href="/Visualestudio/2entregablephp/assets/Css/components/navbarAsistente.css">
    <link rel="stylesheet" href="http://127.0.0.1/Visualestudio/2entregablephp/assets/Css/ApartadoAsistente/RegistroFletes.css"> <!-- Asegúrate que este es tu archivo CSS con el estilo -->
</head>
<body>
<?php
    include __DIR__ . '/../../../templates/components/navbarAsistente.php';
  ?>

<div class="form-wrapper">
  <form class="form" method="POST" action="procesar_flete.php">
    <h2 class="title">Registro de fletes</h2>

    <label>ID flete
      <input type="text" name="id_flete" class="input" required>
    </label>

    <label>Origen de la ruta
      <input type="text" name="origen" class="input" required>
    </label>

    <label>Destino de la ruta
      <input type="text" name="destino" class="input" required>
    </label>

    <label>Cliente
      <input type="text" name="cliente" class="input" required>
    </label>

    <label>Valor de flete
      <input type="number" name="valor" class="input" required>
    </label>

    <button type="submit" class="submit">Registrar Flete</button>
  </form>
</div>


</body>
</html>
