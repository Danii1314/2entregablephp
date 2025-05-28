
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Vehículo</title>
 <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/components/navbarAsistente.css">
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/templates/Components/css/inscripcionVehicular.css">
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['error_vehiculo'])) {
    echo '<div style="color:red; margin-bottom:1em;">'.$_SESSION['error_vehiculo'].'</div>';
    unset($_SESSION['error_vehiculo']);
}
if (isset($_SESSION['mensaje_vehiculo'])) {
    echo '<div style="color:green; margin-bottom:1em;">'.$_SESSION['mensaje_vehiculo'].'</div>';
    unset($_SESSION['mensaje_vehiculo']);
}
include $_SERVER['DOCUMENT_ROOT'] . "/Visualestudio/2entregablephp/templates/Components/php/navbarAsistente.php";
?>

  <div class="form-wrapper">
    <form class="form" action="/Visualestudio/2entregablephp/app/controllers/controllerRegistrarVehiculo.php" method="POST">
      <p class="title">Registro de vehículo</p>
      <p class="message">Complete los campos para registrar un nuevo vehículo.</p>

      <label for="tipo_vehiculo">Tipo de vehículo</label>
      <select name="tipo_vehiculo" id="tipo_vehiculo" class="input" required>
        <option value="">Seleccione un tipo</option>
        <option value="Camioneta liviana (1-1.5 Ton)">Camioneta liviana (1-1.5 Ton)</option>
        <option value="Camión pequeño (2-3 Ton)">Camión pequeño (2-3 Ton)</option>
        <option value="Camión mediano (4-6 Ton)">Camión mediano (4-6 Ton)</option>
        <option value="Camión grande (7-10 Ton)">Camión grande (7-10 Ton)</option>
        <option value="Camión rígido (más de 10 Ton)">Camión rígido (más de 10 Ton)</option>
        <option value="Camión con carrocería cerrada">Camión con carrocería cerrada</option>
        <option value="Camión plataforma">Camión plataforma</option>
        <option value="Camión cisterna">Camión cisterna</option>
        <option value="Camión grúa">Camión grúa</option>
        <option value="Camión refrigerado">Camión refrigerado</option>
        <option value="Camión tolva">Camión tolva</option>
        <option value="Camión con furgón">Camión con furgón</option>
        <option value="Camión tipo turbo">Camión tipo turbo</option>
        <option value="Camión articulado (tractomula)">Camión articulado (tractomula)</option>
        <option value="Camión doble troque">Camión doble troque</option>
        <option value="Camión sencillo (chuto)">Camión sencillo (chuto)</option>
        <option value="Tractocamión (cabezal)">Tractocamión (cabezal)</option>
        <option value="Remolque">Remolque</option>
        <option value="Volqueta">Volqueta</option>
        <option value="Vehículo especial (liviano)">Vehículo especial (liviano)</option>
        <option value="Vehículo especial (pesado)">Vehículo especial (pesado)</option>
      </select>

      <label for="placa_vehiculo">Placa del vehículo</label>
      <input type="text" name="placa_vehiculo" id="placa_vehiculo" class="input" placeholder="Ej: ABC123" required>

      <button class="submit">Registrar Vehículo</button>
    </form>
  </div>

</body>
</html>
