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

<div class="form-container">
    <h1><span class="dot"></span> Registro de Fletes</h1>
    <p class="subtitulo">Complete los campos para registrar un flete</p>

    <form action="procesar_flete.php" method="POST">
        <label for="idFlete">ID Flete</label>
        <input type="text" name="idFlete" id="idFlete" placeholder="Ej: F12345" required>

        <label for="origen">Origen de la ruta</label>
        <input type="text" name="origen" id="origen" placeholder="Ej: Bogotá" required>

        <label for="destino">Destino de la ruta</label>
        <input type="text" name="destino" id="destino" placeholder="Ej: Medellín" required>

        <label for="cliente">Cliente</label>
        <input type="text" name="cliente" id="cliente" placeholder="Ej: Juan Pérez" required>

        <label for="valorFlete">Valor de flete</label>
        <input type="number" name="valorFlete" id="valorFlete" placeholder="Ej: 250000" required>

        <button type="submit">Registrar Flete</button>
    </form>
</div>

</body>
</html>
