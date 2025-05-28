
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
      <li><strong>Ruta(s) asignada(s):</strong>
        <?php
          if (!empty($fletes)) {
              $rutas = [];
              foreach ($fletes as $flete) {
                  $rutas[] = htmlspecialchars($flete['origen']) . " → " . htmlspecialchars($flete['destino']);
              }
              echo implode(' | ', $rutas);
          } else {
              echo "No hay rutas asignadas.";
          }
        ?>
      </li>
      <li><strong>Gasolina:</strong> Gasolina gastada hasta el momento</li>
      <li><strong>Flete(s) a entregar:</strong>
        <?php
          if (!empty($fletes)) {
              $ids = [];
              foreach ($fletes as $flete) {
                  $ids[] = htmlspecialchars($flete['id_flete']);
              }
              echo "ID Flete(s): " . implode(', ', $ids);
          } else {
              echo "No hay fletes asignados.";
          }
        ?>
      </li>
    </ul>
  </div>

</body>
</html>