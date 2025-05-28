<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoUsuario/ApartadoUsuario.css">
</head>
<body>
  <!-- HEADER -->
  <header>
    <div class="logo">
      <img src="/Visualestudio/2entregablephp/assets/Images/image (1).png" alt="Logo Xpedite Freight">
    </div>
    <nav>
      <ul>
        <li><a href="?ruta=usuario/inicio">Inicio</a></li>
        <li><a href="?ruta=usuario/login">Mis Envíos</a></li>
        <li><a href="?ruta=usuario/login">Mis Entregas</a></li>
        <li><a href="#">Soporte</a></li>
      </ul>
    </nav>
    <div class="productos">
      <span>Productos Enviados</span>
      <span class="contador">0</span>
    </div>
  </header>

  <!-- BANNER PRINCIPAL -->
  <section class="banner">
    <img src="/Visualestudio/2entregablephp/assets/Images/Usuario.avif" alt="Camión" class="fondo">
    
    <!-- Contenedor derecho para título y recuadros -->
    <div class="contenido-derecho">
      <h1 class="titulo-derecho">Xpedite Freight</h1>
      
      <div class="recuadros-derecha">
        <div class="info-box">
          <strong>Eres Administrador?</strong>
          <a href="/Visualestudio/2entregablephp/public/index.php?ruta=usuario/login" class="boton-naranja">INICIA ONLINE</a>
        </div>
            
        <div class="info-box">
          <strong>LLÁMANOS</strong>
          <p>+52-1-33-12345678</p>
        </div>
        
      </div>
    </div>
  </section>
</body>
</html>