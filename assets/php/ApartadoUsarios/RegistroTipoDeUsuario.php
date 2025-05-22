<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Registro Tipo de Usuario - Xpedite Freight</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoUsuario/RegistroTipoDeUsuario.css" />
  <style>
    /* Para alinear iconos y texto en los botones */
    .button1 {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }
    .button1 svg {
      width: 20px;
      height: 20px;
      fill: currentColor;
    }
  </style>
</head>
<body>
  <div class="form">
    <p id="heading">Tipo de usuario a registrar</p>

    <form action="/Visualestudio/2entregablephp/public/index.php" method="GET">
      <!-- Enviamos ruta y idCargophp -->
      <input type="hidden" name="ruta" value="usuario/registro" />

      <div class="btn-container">
        
        <button type="submit" name="idCargophp" value="1" class="button1">
          <img src="/Visualestudio/2entregablephp/assets/Images/iconos/gerente.png" alt="Gerente" style="width:24px; height:24px; vertical-align: middle;"/>
          Gerente
        </button>

        <button type="submit" name="idCargophp" value="2" class="button1">
          <img src="/Visualestudio/2entregablephp/assets/Images/iconos/asistenteico.png" alt = "Asistente" style="width:24px; height:24px; vertical-align: middle;"/>
          Asistente
        </button>

        <button type="submit" name="idCargophp" value="3" class="button1">
          <img src="/Visualestudio/2entregablephp/assets/Images/iconos/conductor.png" alt = "conductor" style="width:24px; height:24px; vertical-align: middle;"/>
          Conductor
        </button>

        <button type="submit" name="idCargophp" value="4" class="button1">
          <img src="/Visualestudio/2entregablephp/assets/Images/iconos/auxiliar.png" alt = "Auxiliar" style="width:24px; height:24px; vertical-align: middle;"/>
          Auxiliar
        </button>
      </div>
    </form>

    <div class="btn-back">
      <button onclick="history.back()" class="button-back" type="button" aria-label="Volver atrás">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
          <path d="M14 7l-5 5 5 5" />
        </svg>
        Atrás
      </button>
    </div>
  </div>
</body>
</html>
