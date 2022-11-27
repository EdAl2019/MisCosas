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
    <button id="2" tipo="doughnut" type="button" class="btn btn-primary"><h2>GENERAR GRÁFICO</h2></button>
    <h1>¿CON QUÉ FRECUENCIA UTILIZA TRANSPORTE URBANO?</h1>
    
    <div class="col-xg-12" style="padding-top:20px;">
    <div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-lg-6">
        <table id="tabla" id_preg="2" class="table table-striped table-bordered table-condensed" style="width:100%">
              <thead>
                <tr>
                  <th>RESPUESTA</th>
                  <th>CANTIDAD </th>
                </tr>
              </thead>

            </table>
      </div>
      <div class="col-lg-4">
      <canvas id="myChartdoughnut2" width="400" height="400"></canvas>
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