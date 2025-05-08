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
    include __DIR__ . '/../../../templates/components/navbarAsistente.php';
  ?>

<div class="form-container">
    <h1><span class="dot"></span> Mantenimientos Preventivos</h1>
    <p class="subtitulo">Complete los campos para registrar un mantenimiento</p>

    <label for="placa">Placa del vehículo</label>
    <input type="text" id="placa" placeholder="Ej: ABC123">

    <label for="tipo">Tipo de mantenimiento</label>
    <select id="tipo">
        <option value="">Seleccione un tipo</option>
        <option value="aceite">Cambio de aceite</option>
        <option value="frenos">Revisión de frenos</option>
        <option value="llantas">Cambio de llantas</option>
    </select>

    <label for="costo">Costo del mantenimiento</label>
    <input type="number" id="costo" placeholder="Ej: 150000">

    <button>Registrar Mantenimiento</button>
</div>

</body>
</html>
