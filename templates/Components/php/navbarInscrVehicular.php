<?php
/**
 * navbarAsistente.php
 * Componente de barra de navegación para Xpedite Freight.
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xpedite Freight - Barra de navegación</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/templates/Components/css/navbarInscrVehicular.css">
</head>
<body>

<header>
  <div class="logo">
    <a href="/inicio.php">
      <img src="/Visualestudio/2entregablephp/assets/Images/image%20(1).png"
           alt="Logo Xpedite Freight">
    </a>
  </div>
  
  <nav>
    <ul>
      <li><a href="/Visualestudio/2entregablephp/assets\php\ApartadoUsarios\ApartadoUsuario.php">Inicio</a></li>
      <li><a href="/Visualestudio/2entregablephp/assets/php/ApartadoAsistente/auxiliaresAsistente.php">Apartado Asistente</a></li>
      <li><a href="/Visualestudio/2entregablephp/assets/php/ApartadoGerente/inicio.php">Apartado Gerente</a></li>
      <li class="logout">
        <a href="/logout.php" title="Cerrar sesión">
        <img src="/Visualestudio/2entregablephp/assets/Images/IconoCerrarSecion.jpg" alt="Cerrar sesión" style="height: 35px; padding-left: 0%; padding-right: 35px;">
        </a>
      </li>
    </ul>
  </nav>
</header>

</body>
</html>

