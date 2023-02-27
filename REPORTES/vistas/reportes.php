<?php
session_start();
if (isset($_SESSION['Usuario'])) { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link rel="stylesheet" href="../src/bootstrap.min.css" crossorigin="anonymous">
    <?php
    require("head.php");
    ?>


  </head>

  <body id="contenedor">




    <div class="row">
      <div class="col-sm-12">
        <?php
        require("menu.php");
        ?>
      </div>
      <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">REPORTE GENERAL</div>
          <div> <input type="date" class="form-control" min="2022-10-13" max="2023-12-30" name="fecha_general" id="fecha_general">

          </div>


        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div id="contenedor_tabla_general"></div>
            </div>

          </div>
        </div>
      </div>

      </div>
      <div class="col-sm-12">
        <h1>____________________________________________________________________________________</h1>
      </div>
      <br><br>



      <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">REPORTE ENCUESTADORES</div>
          <input type="text" hidden id="total_encuestas">
          <div class="row">
            <!-- INICIO    -->

           <div class="col-sm-4">
            <div class="row">
            <div class="col-sm-6">
              <form class="form-inline">
                <div class="form-group">
                  <label for="fecha_grafica_e">INICIO: </label>
                  <input type="date" class="form-control" value="-" min="2022-10-13" max="2023-12-30" name="fecha_encuestadores_inicio" id="fecha_encuestadores_inicio">
                </div>

              </form>
            </div>
            <div class="col-sm-6">

              <form class="form-inline">
                <div class="form-group">
                  <label for="fecha_encuestadores_fin">FIN: </label> &nbsp; <input type="date" class="form-control" value="-" min="2022-10-13" max="2023-12-30" name="fecha_encuestadores_fin" id="fecha_encuestadores_fin">


                </div>
              </form>


            </div>
            </div>
           </div>



            <div class="col-sm-4">
              <div class="row">
              <div class="col-sm-6">
              <form class="form-inline">
                <div class="form-group">

                  <select class="form-control" name="ciudad_encuestadores" id="ciudad_encuestadores">

                    <option value="" disabled selected>SELECCIONE CIUDAD</option>
                    <option value="">TODAS</option>
                    <option value="1">TEGUCIGALPA</option>
                    <option value="2">SAN PEDRO SULA</option>
                  </select>
                </div>

              </form>
            </div>
            <div class="col-sm-6">
              <form class="form-inline">
                <div class="form-group">

                  <select class="form-control" name="grupo" id="grupo">

                    <option selected disable value="" style="color: gray;">Por Grupo</option>
                    <option value="1">GRUPO 1</option>
                    <option value="2">GRUPO 2</option>
                    <option value="3">GRUPO 3</option>
                    <option value="4"> GRUPO 4</option>
                    <option value="5">GRUPO 5</option>
                    <option value="6">GRUPO 6 </option>
                  </select>
                </div>

              </form>
            </div>
              </div>
            </div>


           

            <div class="col-sm-3">
              <select class="form-control" name="jornada" id="jornada">
                <option value="" disabled selected>SELECCIONE UNA JORNADA</option>
                <option value="am">AM</option>
                <option value="pm">PM</option>
              </select>
            </div>
            <!-- FINAL -->



          </div>
        </div>
        <div class="card-body">
          <div class="row">

            <div id="contenedor_tabla"></div>



          </div>
        </div>
      </div>

      </div>
      <div class="col-sm-12">
        <h1>____________________________________________________________________________________</h1>
      </div>
      <br>
      <br>


      <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">GRÁFICA ENCUESTADORES</div>

          <div class="row">
            <div class="col-sm-4">
              <div class="row">

                <div class="col-sm-6">
                  <form class="form-inline">
                    <div class="form-group">
                      <label for="fecha_grafica_e">INICIO: </label>
                      <input type="date" id="fecha_grafica_e" name="fecha_grafica_e" min="2022-09-01" max="2023-12-31" value='-' class="form-control fecha_grafica_e">
                    </div>

                  </form>
                </div>
                <div class="col-sm-6">

                  <form class="form-inline">
                    <div class="form-group">
                      <label for="fecha_grafica_e_fin">FIN: </label> &nbsp; <input type="date" id="fecha_grafica_e_fin" name="fecha_grafica_e_fin" min="2022-09-01" max="2023-12-31" value='-' class="form-control fecha_grafica_e">

                    </div>
                  </form>


                </div>

              </div>
            </div>

            <div class="col-sm-8">
              <div class="row">
                <div class="col-sm-6">
                  <form class="form-inline">
                    <div class="form-group">
                      <label for="jornada_grafica">JORNADA : </label>
                      <select class="form-control" name="jornada_grafica" id="jornada_grafica">
                        <option value="" disabled selected>SELECCIONE UNA JORNADA</option>
                        <option value="">COMPLETA</option>
                        <option value="am">AM</option>
                        <option value="pm">PM</option>
                      </select>
                    </div>

                  </form>
                </div>
                <div class="col-sm-6">
                  <form class="form-inline">
                    <div class="form-group">
                      <label for="ciudad">CIUDAD : </label>
                      <select class="form-control" name="ciudad" id="ciudad">

                        <option value="" disabled selected>SELECCIONE CIUDAD</option>
                        <option value="">TODAS</option>
                        <option value="1">TEGUCIGALPA</option>
                        <option value="2">SAN PEDRO SULA</option>
                      </select>
                    </div>

                  </form>
                </div>

              </div>

            </div>


          </div>

        </div>
        <div class="card-body">
          <div class="col-xs-3">
            <canvas id="equipos"></canvas>

          </div>



        </div>

      </div>

      </div>
      





    </div>



    <?php
    require("pie.php");

    ?>
    <!-- JavaScript Bundle with Popper -->

    <script src="../src/index.js"></script>

  </body>

  </html>
<?php } else { # code...
  echo "<script> window.location='../index.php'; </script>";
} ?>