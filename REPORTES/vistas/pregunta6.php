<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require("../vistas/head.php");
    ?>
</head>
<body>
    <?php
    require("../vistas/menu.php");
    
    ?>
    <br>
    <button id="6" tipo="doughnut" class="btn btn-primary button"><h2>GENERAR GRÁFICO</h2></button>
    <h1 id="hpregunta">¿QUÉ RUTA ESPERA UTILZAR?</h1>
    
    <div class="col-xg-12" style="padding-top:20px;">
    <div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-lg-6">
        <table id="tabla" id_preg="6" class="table table-striped table-bordered table-condensed" style="width:100%">
              <thead>
                <tr>
                  <th>RESPUESTA</th>
                  <th>CANTIDAD </th>
                </tr>
              </thead>

            </table>
      </div>
      <div class="col-lg-6">
      <canvas id="myChartdoughnut6" ></canvas>
      </div>
    </div>
    </div>
    </div>

   

    <?php
    require("../vistas/pie.php");
    
    ?>
     <script src="../src/preguntas.js"></script>
</body>
</html>