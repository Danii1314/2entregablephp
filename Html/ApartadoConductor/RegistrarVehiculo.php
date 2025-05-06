<!-- registrar_vehiculos.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Vehículos</title>
  <link rel="stylesheet" href="/Visualestudio/2entregablephp/Css/ApartadoConductor/Registrar_Vehiculo.css">
</head>
<body>

  <!-- Barra de navegación (Nvar) -->
    <?php include '../Components/Nvar.html'; ?>
 
  <!-- Contenido principal -->
  <div class="contenido">
    <div class="formulario-contenedor">
      <h2>Registrar un vehículo</h2>
      <form action="procesar_registro.php" method="POST">
        <label for="categoria">Categoría de vehículo</label>
        <select id="categoria" name="categoria">
          <option value="">Seleccione una categoría</option>
          <option value="Camión mediano (7 Ton)">Camión mediano (7 Ton)</option>
          <option value="Camión pequeño (3.5 Ton)">Camión pequeño (3.5 Ton)</option>
          <option value="Camión">Camión</option>
          <option value="Tractomula">Tractomula</option>
          <option value="Furgón">Furgón</option>
         
        </select>

        <label for="placa">Placa del vehículo</label>
        <input type="text" id="placa" name="placa" placeholder="Ejemplo: ABC123">

        <label for="bodega">Bodega Asignada</label>
        <select id="bodega" name="bodega">
          <option value="">Seleccione una bodega</option>
          <option value="Bogotá">Bogotá</option>
          <option value="Medellín">Medellín</option>
          <option value="Cali">Cali</option>
          <option value="Barranquilla">Barranquilla</option>
          <option value=" Bucaramanga"> Bucaramanga</option>
        </select>

        <button type="submit">Registrar</button>
      </form>
    </div>
  </div>

</body>
</html>
