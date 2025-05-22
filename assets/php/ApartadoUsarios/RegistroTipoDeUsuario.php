<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Registro Tipo de Usuario - Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoUsuario/RegistroTipoDeUsuario.css" />
</head>
<body>
  <div class="form">
    <p id="heading">Tipo de usuario a registrar</p>

    <form action="/Visualestudio/2entregablephp/public/index.php" method="GET">
      <!-- Enviamos ruta y idCargophp -->
      <input type="hidden" name="ruta" value="usuario/registro" />

      <div class="btn-container">
        <button type="submit" name="idCargophp" value="1" class="button1">Gerente</button>
        <button type="submit" name="idCargophp" value="2" class="button1">Asistente</button>
        <button type="submit" name="idCargophp" value="3" class="button1">Conductor</button>
        <button type="submit" name="idCargophp" value="4" class="button1">Auxiliar</button>
      </div>
    </form>
  </div>
</body>
</html>
