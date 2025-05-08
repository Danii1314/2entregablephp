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
<div class="form-container">
    <h1><span class="dot"></span> Asignación de Fletes</h1>
    <p class="subtitulo">Complete los campos para asignar un flete a un vehículo</p>

    <form action="procesar_asignacion.php" method="POST">
        <label for="fleteAsignar">Flete por asignar</label>
        <input type="text" name="fleteAsignar" id="fleteAsignar" placeholder="Ej: F12345" required>

        <label for="placaVehiculo">Placa del vehículo</label>
        <input type="text" name="placaVehiculo" id="placaVehiculo" placeholder="Ej: ABC123" required>

        <button type="submit">Asignar Flete</button>
    </form>
</div>

</body>
</html>
