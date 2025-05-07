<?php
header('Content-Type: text/html; charset=UTF-8');
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Asistente Xpedite Freight</title>

  <!-- Estilos del asistente -->
  <link rel="stylesheet"
        href="/Visualestudio/2entregablephp/assets/Css/ApartadoAsistente/estiloAsistente.css">

  <!-- Estilos de la barra de navegación -->
  <link rel="stylesheet"
        href="/Visualestudio/2entregablephp/assets/Css/components/navbarAsistente.css">
</head>

 <!-- 1) Incluimos la navbar lo antes posible -->
 <?php
    include __DIR__ . '/../../../templates/components/navbarAsistente.php';
  ?>

<body>

  <!-- 2) Contenedor principal (se desplazará debajo de la navbar fija) -->
  <div class="container">
    <h1>Asistente<br>De<br>Xpedite Freight</h1>
  </div>

</body>
</html>