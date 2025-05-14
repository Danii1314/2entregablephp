<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de Contabilidad</title>
        <link rel="stylesheet" href="/Visualestudio/2entregablephp/assets/Css/ApartadoGerente/Contabilidad.css">
    </head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/Visualestudio/2entregablephp/templates/Components/php/NvarGerente.php"; ?>
<div class="dashboard">
  <div class="card green">
    <h2>RESUMEN FINANCIERO GENERAL</h2>
    <p>Ingresos del mes: <span id="ingresosMes">$0</span></p>
    <p>Gastos del mes: <span id="gastosMes">$0</span></p>
    <p>Utilidad neta: <span id="utilidadNeta">$0</span></p>
    <p>Viajes realizados en el mes: <span id="viajesMes">0</span></p>
  </div>

  <div class="card orange">
    <h2>GASTOS OPERATIVOS</h2>
    <p>Gasto en combustible: <span id="combustible">$0</span></p>
    <p>Peajes y rodamientos: <span id="peajes">$0</span></p>
    <p>Mantenimiento de vehículos: <span id="mantenimiento">$0</span></p>
    <p>Sueldos y viáticos: <span id="sueldos">$0</span></p>
  </div>

  <div class="card blue">
    <h2>INGRESOS MENSUALES</h2>
    <p>Ingreso por fletes: <span id="fletes">$0</span></p>
    <p>Conductor que más genera ingresos: <span id="mejorConductor">-</span></p>
  </div>
</div>

<button id="actualizarBtn">Actualizar Datos</button>

<script>
document.getElementById("actualizarBtn").addEventListener("click", function () {
  fetch("panel_financiero.php", {
    method: "POST"
  })
    .then(res => res.json())
    .then(data => {
      if (data.error) {
        alert("Error al cargar datos: " + data.error);
        return;
      }

      document.getElementById("ingresosMes").textContent = "$" + data.ingresosMes;
      document.getElementById("gastosMes").textContent = "$" + data.gastosMes;
      document.getElementById("utilidadNeta").textContent = "$" + data.utilidadNeta;
      document.getElementById("viajesMes").textContent = data.viajesMes;

      document.getElementById("combustible").textContent = "$" + data.combustible;
      document.getElementById("peajes").textContent = "$" + data.peajes;
      document.getElementById("mantenimiento").textContent = "$" + data.mantenimiento;
      document.getElementById("sueldos").textContent = "$" + data.sueldos;

      document.getElementById("fletes").textContent = "$" + data.fletes;
      document.getElementById("mejorConductor").textContent = data.mejorConductor;
    });
});
</script>

</html>