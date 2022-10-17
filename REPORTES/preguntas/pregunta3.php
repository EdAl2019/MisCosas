<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require("../head.php");
    ?>
</head>
<body>
    <?php
    require("../menu.php");
    
    ?>
    <br>
    <button id="3" tipo="line"type="button" class="btn btn-primary"><h2>GENERAR GRÁFICO</h2></button>
    <h1>¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA LLEGAR A SU DESTINO?</h1>
    
    <div class="col-xg-12" style="padding-top:20px;">
    <div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-lg-6">
        <table id="tabla" id_preg="3" class="table table-striped table-bordered table-condensed" style="width:100%">
              <thead>
                <tr>
                  <th>RESPUESTA</th>
                  <th>CANTIDAD </th>
                </tr>
              </thead>

            </table>
      </div>
      <div class="col-lg-6">
      <canvas id="myChartline3" ></canvas>
      </div>
    </div>
    </div>
    </div>

   

    <?php
    require("../pie.php");
    
    ?>
</body>
</html>