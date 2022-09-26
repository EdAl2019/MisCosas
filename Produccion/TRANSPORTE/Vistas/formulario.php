<?php

session_start();
$sesion=session_get_cookie_params();

if (isset($_SESSION['Id_usuario'])) { ?>
  <!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../src/dist/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../src/dist/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../src/dist/bootstrap/css/bootstrap.css.map">
  <link rel="stylesheet" href="../src/dist/fontawesome/font-awesome-4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="../src/css/estilos.css">
  <link rel="stylesheet" href="../src/dist/sweetalert2/dist/sweetalert2.min.css">




  <title>TRANSPORTE URBANO CENSO</title>
  <script src="../src/js/html5-qrcode.min.js"></script>


</head>

<body style="background-color:#57D0E1;">
  <div class="container">


    <div class="row">
    <?php require 'cabecera.php'; ?>

      <div class="col-xl-12">


        <div class="card card-primary " style="background-color:white ;">
          <div class="card-header "
            style="background-image:url('../src/img/logo.jpg') ; background-repeat: no-repeat; ">

            <div class="row">
              <div class="col-lg-12 text-center">

                <img src="../src/img/firma.jpg" width="100" height="100" class="img-fluid rounded-circle">

              </div>

            </div>
            <br>
            <br>
            <br>
            <br>
            <h2 class="card-title text-center" style="color:darkblue ;"><strong> CENSO USUARIO DE TRANSPORTE</strong>
            </h2>






          </div>
          <div class="row" style="background-color:beige; ">


          </div>
          <div class="form-group col-xl-12 text-center"  id="contenedor_comenzar">
          <br>

          <h5><i class="fa fa-users" aria-hidden="true"></i> MAYORES DE EDAD</h5>
                        <button id="comenzar" class=" btn btn-success btn-xs"><h3>COMENZAR</h3></button>
                        <br><br>
          </div>
          <h1>
            <?php
            echo $_SERVER['REMOTE_ADDR'];
            print_r( $_SERVER['HTTP_X_FORWARDED_FOR']);
            print_r($_SERVER['HTTP_CLIENT_IP']);

            ?>
          </h1>
          <input type="text" id="IP">
          <br>
          <div id="formulario">
          <form id="formulario-encuesta" >

            <div class="row">

              <div class="col-xl-6 card card-secundary">


                <br>

                <h6 class="card-title text-center"><i class="fa fa-user" aria-hidden="true"></i>
                  <u>DATOS PERSONALES</u>
                </h6>
                <br>

                <div class="card-body">

                  <div class="form-group col-md-12" id="contenedor_scaner">
                    <input type="text" id="FECHAINICIO" name="FECHAINICIO" hidden>

                    <label><strong>1. ESCANER QR </strong><i class="fa fa-qrcode" aria-hidden="true"></i>
                    </label>
                    <i id="check_scan" class="fa fa-check-circle" style="color:green ;" aria-hidden="true"></i>
                    <div class="form-control" style="" id="reader"></div>


                    <input type="text" hidden id="QR" name="QR" class="form-control">
                  </div>
                  <br>
                  <div class="form-group col-xl-12">
                    <label for="IDENTIDAD"><strong> 2. INGRESE SU NÚMERO DE IDENTIDAD </strong>

                      <i class="fa fa-id-card-o" aria-hidden="true"></i>
                    </label>
                    <input type="number" max="13" min="13" class="form-control" id="IDENTIDAD" name="IDENTIDAD" min="1" max="99999999"
                      placeholder="0000000000000">
                  </div>
                  <br>
                  <div class="form-group col-xl-6">
                                                <label for="DIRECCION"><strong> 3. INGRESE DIRECCIÓN </strong>

                                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                </label>
                                                <textarea type="text" class="form-control" id="DIRECCION"
                                                    name="DIRECCION"></textarea>
                                            </div>
                                            <br>
                  <div class="form-group col-md-12">
                    <label for="TELEFONO"><strong>4. NÚMERO DE TELÉFONO </strong><i class="fa fa-mobile"
                        aria-hidden="true"></i>
                    </label>
                    <input type="number" class="form-control" id="TELEFONO" placeholder="0000-0000" name="TELEFONO" min="1" max="99999999" required>
                  </div>




                </div>
              </div>
              <div class="col-md-6 card card-secundary">
                <br>
                <h6 class="card-title text-center"><i class="fa fa-file-text" aria-hidden="true"></i>

                  <u>CENSO</u>
                </h6>
                <br>
                <div class="card-body">
                  <div class="form-group col-md-12">
                    <label for="DONDESEDIRIGE"><strong>¿A DÓNDE SE DIRIGE? </strong><i class="fa fa-location-arrow"
                        aria-hidden="true"></i>
                    </label>
                    <select name="1" id="1" class="form-control">
                      <option value="TRABAJO">TRABAJO.</option>
                      <option value="CENTRO EDUCATIVO">CENTRO EDUCATIVO.</option>
                      <option value="VISITA">VISITA.</option>
                      <option value="OTROS">OTROS.</option>
                    </select>
                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="FRECUENCIA"><strong>¿CON QUÉ FRECUENCIA (DÍAS) UTILIZA TRANSPORTE
                        URBANO? </strong><i class="fa fa-user-o" aria-hidden="true"></i>
                    </label>
                    
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="1" name="2" id="2">
                      <label class="form-check-label" for="3">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="2" name="2" id="2">
                      <label class="form-check-label" for="3">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="3" name="2" id="2">
                      <label class="form-check-label" for="3">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="4" name="2" id="2">
                      <label class="form-check-label" for="3">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="5" name="2" id="2">
                      <label class="form-check-label" for="3">
                        5
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="6" name="2" id="2">
                      <label class="form-check-label" for="3">
                        6
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="7" name="2" id="2">
                      <label class="form-check-label" for="3">
                        7
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input frecuencia-mas" type="radio" name="2" id="2">
                      <label class="form-check-label" for="2">
                        OTROS:

                      </label> <input class="2-mas" type="text" onkeydown="filtro();" id="2" placeholder="Especifique.."  name="2"  required>
                    </div>
                  </div>

                   
                    
                 

                  <br>
                  <div class="form-group col-md-12">
                    <label for="DESTINO"><strong>¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA
                        LLEGAR A SU
                        DESTINO? </strong><i class="fa fa-bus" aria-hidden="true"></i>
                    </label>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="1" name="3" id="3">
                      <label class="form-check-label" for="3">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="2" name="3" id="3">
                      <label class="form-check-label" for="3">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="3" name="3" id="3">
                      <label class="form-check-label" for="3">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" value="4" type="radio" name="3" id="3">
                      <label class="form-check-label" for="3">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input transporte-mas" type="radio" name="3" id="3">
                      <label class="form-check-label" for="3">
                        Más de 4:

                      </label> <input class="3-mas" type="number" onkeydown="filtro();" focusout="minimo();"id="3" placeholder="5"  name="3"  min="5" max="15" required>
                    </div>

                  </div>


                    <div class="form-group col-md-12" id="contenedor_rutas">

                    </div>


                  <br>
                  <div class="form-group col-xs-12">
                    <label for="exampleInputPassword1"><strong>¿CUÁNTAS PERSONAS UTILIZAN TRANSPORTE EN SU
                        HOGAR? </strong>
                      <i class="fa fa-home" aria-hidden="true"></i>
                    </label>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="1" name="4" id="4">
                      <label class="form-check-label" for="4">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="2" name="4" id="4">
                      <label class="form-check-label" for="4">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="3" name="4" id="4">
                      <label class="form-check-label" for="4">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="4" name="4" id="4">
                      <label class="form-check-label" for="4">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input transporte-hogar" type="radio" name="4" id="4">
                      <label class="form-check-label" for="hogar_transporte5">
                                    Más de 4:
                                  </label>
                                  <input type="number" onkeydown="filtro();" focusout="minimo();" class="4-mas" name="4" id="4" placeholder="5" min="5" max="15"  required>
                    </div>

                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="exampleInputPassword1"><strong>¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA
                        FRECUENTEMENTE ? </strong><i class="fa fa-taxi" aria-hidden="true"></i>
                    </label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="COLECTIVOS" name="5[]"
                        id="5">
                      <label class="form-check-label" for="flexCheckDefault">
                        COLECTIVOS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="MOTO-TAXIS" name="5[]"
                        id="5">
                      <label class="form-check-label" for="OTROS_SERVICIOS">
                        MOTO-TAXIS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value='MICRO-BUS "BRUJITOS"' name="5[]"
                        id="5">
                      <label class="form-check-label" for="OTROS_SERVICIOS">
                        MICRO-BUS "BRUJITOS"
                      </label>
                    </div>
                  </div>
                  <br>



                  </div>
                  <button type="button" id="guardar" class="btn btn-primary">GUARDAR</button>
                  <br>

                </div>


              </div>
 </div>
              <div class="card-footer text-center"style="background-image:url('../src/img/logo.jpg') ; background-repeat: no-repeat; ">
                    <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                  
                </div>

            </div>
        </div>
                    </div>


          </form>
        </div>
        </div>




      </div>

    </div>


  </div>

  <?php require 'pie.php'; ?>

  <script src="../src/js/formulario.js"></script>

</body>

</html>


  <?php } else {# code...
     echo "<script> window.location='https://190.130.9.62/TRANSPORTE/index.php'; </script>";}
?>
