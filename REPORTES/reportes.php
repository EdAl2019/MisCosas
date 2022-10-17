<?php 
session_start();
if (isset($_SESSION['Usuario'])) { ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="src/bootstrap.min.css" crossorigin="anonymous">
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

  <div class="col-xs-6">

   
      <div class="row">



        <div class="col-sm-6">

          <div class="col-sm-12" style="padding-top:20px;">
            <div class="card">
              <div class="card-header">
                <div class="card-title">REPORTE GENERAL</div>
                <div> <input type="date" class="form-control" value="2022" min="2022-10-13" max="2022-12-30" name="fecha_general" id="fecha_general"> </div>
               
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div id="contenedor_tabla_general"></div>
                  </div>
                  <div class="col-sm-12">
                    <h1>____________________________________________________________________________________</h1>
                  </div>

                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <div class="card-title">REPORTE ENCUESTADORES</div>
                
                <div> <input type="date" class="form-control" value="2022" min="2022-10-13" max="2022-12-30" name="fecha_encuestadores" id="fecha_encuestadores"> </div>
                <div><select class="form-control" name="" id="" > 
                   <option selected disable style="color: gray;">Por Grupo</option>
                   <option value="">GRUPO 1</option>
                   <option value="">GRUPO 2</option>
                   <option value="">GRUPO 3</option>
                   <option value=""> GRUPO 4</option>
                   <option value="">GRUPO 5</option>
                   <option value="">GRUPO 6 </option>
</select></div>
                  
                 </div>
              </div>
              <div class="card-body">
                <div class="col-sm-12">
                  <div id="contenedor_tabla"></div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6" style="margin-left:0%; margin-right:0%;">

          <div class="col-sm-12" style="padding-top:20px;">
            <div class="card">
              <div class="card-header">
                <div class="card-title">GRÁFICA GENERAL</div>

              </div>
              <div class="card-body">
                <div class="col-sm-12">
                  <canvas></canvas>

                </div>
              </div>
            </div>

          </div>
          <div class="col-sm-12" style="float: left;">
            <div class="card">
              <div class="card-header">
                <div class="card-title">GRÁFICA ENCUESTADORES</div>

              </div>
              <div class="card-body">
                <div class="col-sm-12">
                  <canvas id="equipos"></canvas>

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
<?php } else {# code...
     echo "<script> window.location='index.php'; </script>";}?>