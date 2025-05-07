<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Personal</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/Css/ApartadoGerente/Inscripcion.css">
  <script>
    function mostrarCampos() {
      const tipo = document.getElementById("tipo_registro").value;
      document.getElementById("campos_asistente").style.display = tipo === "asistente" ? "block" : "none";
      document.getElementById("campos_conductor").style.display = tipo === "conductor" ? "block" : "none";
      document.getElementById("campos_auxiliar").style.display = tipo === "auxiliar" ? "block" : "none";
    }
  </script>
</head>
<body>

  <?php include '../Components/NvarGerente.php'; ?>

  <div class="form-wrapper">
    <form class="form" action="procesar_registro.php" method="POST">
      <p class="title">Registrar Personal</p>
      <p class="message">Seleccione el tipo de personal y complete los campos requeridos.</p>

      <label for="tipo_registro">Tipo de registro</label>
      <select id="tipo_registro" name="tipo_registro" class="input" onchange="mostrarCampos()" required>
        <option value="">Seleccionar</option>
        <option value="asistente">Asistente</option>
        <option value="conductor">Conductor</option>
        <option value="auxiliar">Auxiliar de carga</option>
      </select>

      <!-- DATOS COMUNES -->
      <label for="email">Correo electrónico</label>
      <input type="email" name="email" id="email" class="input" required>

      <label for="password">Contraseña</label>
      <input type="password" name="password" id="password" class="input" required>

      <!-- CAMPOS ASISTENTE -->
      <div id="campos_asistente" style="display:none;">
        <p>Datos del Asistente:</p>
        <label for="asistente_identificacion">Identificación</label>
        <input type="text" name="asistente_identificacion" id="asistente_identificacion" class="input">

        <label for="asistente_telefono">Teléfono</label>
        <input type="text" name="asistente_telefono" id="asistente_telefono" class="input">

        <label for="asistente_direccion">Dirección</label>
        <input type="text" name="asistente_direccion" id="asistente_direccion" class="input">
      </div>

      <!-- CAMPOS CONDUCTOR -->
      <div id="campos_conductor" style="display:none;">
        <label for="tipo_pase">Tipo de pase</label>
        <select name="tipo_pase" id="tipo_pase" class="input">
          <option value="">Selecciona pase</option>
          <option value="A1">A1</option>
          <option value="B2">B2</option>
          <option value="C3">C3</option>
        </select>

        <label for="placa_asignada">Asignar placa</label>
        <input type="text" name="placa_asignada" id="placa_asignada" class="input">

        <label for="camion_disponible">Camiones disponibles</label>
        <select name="camion_disponible" id="camion_disponible" class="input">
          <option value="">Seleccionar camión</option>
          <option value="Camión A">Camión A - para A1</option>
          <option value="Camión B">Camión B - para B2</option>
          <option value="Camión C">Camión C - para C3</option>
        </select>

        <p>Datos del Conductor:</p>
        <label for="conductor_identificacion">Identificación</label>
        <input type="text" name="conductor_identificacion" id="conductor_identificacion" class="input">

        <label for="conductor_telefono">Teléfono</label>
        <input type="text" name="conductor_telefono" id="conductor_telefono" class="input">
      </div>

      <!-- CAMPOS AUXILIAR -->
      <div id="campos_auxiliar" style="display:none;">
        <label for="conductor_asignado">Asignar a conductor</label>
        <select name="conductor_asignado" id="conductor_asignado" class="input">
          <option value="">Seleccionar conductor</option>
          <option value="Juan Pérez">Juan Pérez</option>
          <option value="María Gómez">María Gómez</option>
          <option value="Carlos Ruiz">Carlos Ruiz</option>
        </select>

        <p>Datos del Auxiliar:</p>
        <label for="auxiliar_identificacion">Identificación</label>
        <input type="text" name="auxiliar_identificacion" id="auxiliar_identificacion" class="input">

        <label for="auxiliar_telefono">Teléfono</label>
        <input type="text" name="auxiliar_telefono" id="auxiliar_telefono" class="input">
      </div>

      <button class="submit">Registrar</button>
    </form>
  </div>

</body>
</html>