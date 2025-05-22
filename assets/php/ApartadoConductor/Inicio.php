<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio Conductor - Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoConductor/Inicio.css">
</head>
<body>

  <?php 
    // Barra de navegación
    include $_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/templates/Components/php/Nvar.php';

    // Controlador que obtiene los datos del conductor
    include $_SERVER['DOCUMENT_ROOT'] . '/Visualestudio/2entregablephp/app/controllers/ControllerConductorInicio.php'; 
  ?>

  <!-- Contenedor principal -->
  <div class="table-container">
    <ul class="info-list">
      <li><strong>Bienvenido al apartado de conductor:</strong> <?= htmlspecialchars($nombreCompleto) ?></li>
      <li><strong>Camión:</strong> <?= htmlspecialchars($placa) ?></li>
      <li><strong>Ruta:</strong> Ruta asignada</li>
      <li><strong>Gasolina:</strong> Gasolina gastada hasta el momento</li>
      <li><strong>Flete a entregar:</strong> Flete asignado por asistente</li>
    </ul>
  </div>

</body>
</html>

 
