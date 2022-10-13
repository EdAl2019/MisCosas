<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <?php
  require("head.php");
  ?>

  <style type="text/css">


  </style>
   
</head>

<body id="contenedor">
<?php
          require("menu.php");
          ?>

  <div class="container">
    <div class="row">
     
        
        
      <div class="col-xs-12">
       
        <div  class="col-lg-12" style="padding-top:20px;">
          <div class="card">
            <div class="card-header">
              <div class="card-title">REPORTE GENERAL</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <table id="reporte_general" class="display table-striped table-bordered table-condensed" style="width:200%">
                    <thead>
                      <tr>
                        <th>ID ENCUESTA</th>
                        <th>INICIO </th>
                        <th>FINAL</th>
                        <th>IP</th>
                        <th>ID PUNTO CONTROL</th>
                        <th>NOMBRE </th>
                        <th>APELLIDO</th>
                        <th>IDENTIDAD</th>
                        <th>¿A DÓNDE SE DIRIGE?</th>
                        <th>¿CON QUÉ FRECUENCIA UTILIZA TRANSPORTE URBANO?</th>
                        <th>¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA LLEGAR A SU DESTINO?</th>
                        <th>¿CUÁNTAS PERSONAS UTILIZAN TRANSPORTE EN SU HOGAR?</th>
                        <th>¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA FRECUENTEMENTE?</th>
                        <th>¿QUÉ RUTA ESPERA UTILZAR? </th>
                        <th>USUARIO <br> ENCUESTADOR</th>


                      </tr>
                    </thead>

                  </table>
                </div>
                <div class="col-lg-12">
                  <h1>____________________________________________________________________________________</h1>
                </div>
               
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="card-title">REPORTE ENCUESTADORES</div>
            </div>
            <div class="card-body">
            <div class="col-lg-12">
                  
                  <table id="reporte_encuestadores" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>NOMBRES</th>
                        <th>APELLIDOS </th>
                        <th>TÉLEFONO</th>
                        <th>USUARIO</th>
                        <th>CANTIDAD DE ENCUESTAS</th>

                      </tr>
                    </thead>

                  </table>
                </div>
            </div>
          </div>
        </div>
        </div>
      </div>

      
    </div>
  </div>



  <?php
  require("pie.php");

  ?>
  <!-- JavaScript Bundle with Popper -->

  <script src="index.js"></script>

</body>

</html>