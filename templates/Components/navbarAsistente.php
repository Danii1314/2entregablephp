<?php
/**
 * navbarAsistente.php
 * Componente de barra de navegación para Xpedite Freight.
 */
?>
<header>
  <div class="logo">
    <a href="/inicio.php">
      <img src="/Visualestudio/2entregablephp/assets/Images/image%20(1).png"
           alt="Logo Xpedite Freight">
    </a>
  </div>

  <nav>
    <ul>
      <li><a href="/inicio.php">Inicio</a></li>
      <li><a href="/registerVehicle.php">Registrar vehículos</a></li>
      <li><a href="/preventiveMaintenance.php">Mantenimientos<br>preventivos</a></li>
      <li><a href="/freightRecord.php">Registro fletes</a></li>
      <li><a href="/assignFreight.php">Asignación de fletes</a></li>
      <li class="logout">
        <a href="/logout.php" title="Cerrar sesión">
        <img src="../../Images/IconoCerrarSecion.jpg" alt="Cerrar sesión" style="height: 35px; padding-left: 0%; padding-right: 35px;">
        </a>
      </li>
    </ul>
  </nav>
</header>