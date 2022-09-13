<?php
session_start();
if (isset($_SESSION['Id_usuario'])) { ?>
    <?php require 'header.php'; ?>
<body style="background-color:#57D0E1;">
    <div class="container">
       

        <div class="row">
        <?php require 'cabecera.php'; ?>

            <div class="col-xl-0">

            </div>
            <div class="col-xl-12">

                <div class="card card-primary " style="background-color:white ;">
                    <div class="card-header "
                        style="background-image:url('../src/img/logo.jpg') ; background-repeat: no-repeat; ">

                        <div class="row">
                            <div class="col-lg-12 text-center">

                                <img src="../src/img/firma.jpg" width="100" height="100"
                                    class="img-fluid rounded-circle">

                            </div>

                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h2 class="card-title text-center" style="color:darkblue ;"><strong> CENSO USUARIO DE
                                TRANSPORTE</strong>
                        </h2>






                    </div>
                  
                    <div class="form-group col-xl-12 text-center" id="contenedor_comenzar"style="background-color:white; ">
                    <br>
                        <h5><i class="fa fa-child" aria-hidden="true"></i> MENORES DE EDAD</h5>
                        
                        <button id="comenzar" class=" btn btn-success btn-xs"><h2>COMENZAR</h2></button>
                        <br><br>
                    </div>
                    <br>
                    <div id="formulario">
                        <form id="formulario-encuesta">

                            <div class="row">

                                <div class="col-xl-6 card card-secundary">


                                    <br>

                                    <h6 class="card-title text-center"><i class="fa fa-user" aria-hidden="true"></i>
                                        <u>DATOS PERSONALES</u>
                                    </h6>
                                    <br>

                                    <div class="card-body">
                                        <div class="row">


                                            <br>
                                            <div class="form-group col-xl-6">
                                                <input type="text" id="FECHAINICIO" name="FECHAINICIO" hidden>
                                                <label for="NOMBRES"><strong> 1. NOMBRES </strong>

                                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                </label>
                                                <input type="text" class="form-control" id="NOMBRES" name="NOMBRES">
                                            </div>
                                            <br>
                                            <div class="form-group col-xl-6">
                                                <label for="APELLIDOS"><strong> 2. APELLIDOS </strong>

                                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                                </label>
                                                <input type="text" class="form-control" id="APELLIDOS" name="APELLIDOS">
                                            </div>
                                            <br>
                                            <div class="form-group col-md-12">
                                                <label for="TELEFONO"><strong>3. EDAD </strong><i
                                                        class="fa fa-id-card-o" aria-hidden="true"></i>
                                                </label>
                                                <input type="number" class="form-control" id="EDAD" name="EDAD" max="99"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="TELEFONO"><strong>4. NÚMERO DE TELÉFONO </strong><i
                                                        class="fa fa-mobile" aria-hidden="true"></i>
                                                </label>
                                                <input type="number" class="form-control" id="TELEFONO"
                                                    placeholder="0000-0000" name="TELEFONO" min="1" max="99999999"
                                                    required>
                                            </div>
                                            <br>
                                            <div class="form-group col-xl-6">
                                                <label for="DIRECCION"><strong> 5. INGRESE DIRECCIÓN </strong>

                                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                </label>
                                                <textarea type="text" class="form-control" id="DIRECCION"
                                                    name="DIRECCION"></textarea>
                                            </div>
                                            <label for="ESTUDIA"><strong>¿ESTUDIA? </strong><i
                                                    class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            </label>
                                            <div class="form-check">
                                                <input class="form-check-input radio3 " type="radio"
                                                    value="Si" name="ESTUDIA" id="ESTUDIA">
                                                <label class="form-check-label" for="3">
                                                    SI
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input radio3" type="radio"
                                                    value="No" name="ESTUDIA" id="ESTUDIA">
                                                <label class="form-check-label " for="3">
                                                    NO
                                                </label>
                                            </div>

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
                                 <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="DONDESEDIRIGE"><strong>¿A DÓNDE SE DIRIGE? </strong><i
                                                class="fa fa-location-arrow" aria-hidden="true"></i>
                                        </label>
                                        <select name="1" id="1" class="form-control">
                                            <option value="ESCUELA">ESCUELA</option>
                                            <option value="SUPERMERCADO">SUPERMERCADO</option>
                                            <option value="ENTRENIMIENTO U OTROS">ENTRETENIMIENTO U OTROS.</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-12">
                                        <label for="FRECUENCIA"><strong>¿CON QUÉ FRECUENCIA UTILIZA TRANSPORTE
                                                URBANO? </strong><i class="fa fa-user-o" aria-hidden="true"></i>
                                        </label>
                                        <select name="2" id="2" class="form-control">
                                            <option value="DIARIO">DIARIO</option>
                                            <option value="SEMANAL">SEMANAL</option>

                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-12">
                                        <label for="DESTINO"><strong>¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA
                                                LLEGAR A SU
                                                DESTINO? </strong><i class="fa fa-bus" aria-hidden="true"></i>
                                        </label>
                                        <div class="form-check">
                                            <input class="form-check-input radio3" type="radio" value="1" name="3"
                                                id="3">
                                            <label class="form-check-label" for="3">
                                                1
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio3" type="radio" value="2" name="3"
                                                id="3">
                                            <label class="form-check-label" for="3">
                                                2
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio3" type="radio" value="3" name="3"
                                                id="3">
                                            <label class="form-check-label" for="3">
                                                3
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radio3" value="4" type="radio" name="3"
                                                id="3">
                                            <label class="form-check-label" for="3">
                                                4
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input transporte-mas" type="radio" name="3" id="3">
                                            <label class="form-check-label" for="3">
                                                Más de 4:

                                            </label> <input class="3-mas" type="number" id="3" name="3" required>
                                        </div>

                                    </div>


                                    <br>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputPassword1"><strong>¿QUÉ OTROS SERVICIOS DE TRANSPORTE
                                                UTILIZA
                                                FRECUENTEMENTE ? </strong><i class="fa fa-taxi" aria-hidden="true"></i>
                                        </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="COLECTIVOS"
                                                name="4a[]" id="4">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                COLECTIVOS
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="MOTO-TAXIS"
                                                name="4a[]" id="4">
                                            <label class="form-check-label" for="OTROS_SERVICIOS">
                                                MOTO-TAXIS
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value='MICRO-BUS "BRUJITOS"'
                                                name="4a[]" id="4">
                                            <label class="form-check-label" for="OTROS_SERVICIOS">
                                                MICRO-BUS "BRUJITOS"
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-12">
                    <label for="exampleInputPassword1"><strong>¿QUÉ RUTA ESPERA UTILZAR?  </strong> </label> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    <br>
                    <select name="5" id="5" class="form-control">
                     

                    </select>
                   
                  </div>
                                </div>

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
        <div class="col-xl-0">

        </div>
    </div>

    

    </div>
    <?php require 'pie.php'; ?>
        <script src="../src/js/formulario_menor.js"></script>
</body>

</html>


<?php } else {# code...
    //echo "<script> window.location='https://".$_SERVER['SERVER_ADDR']."/TRANSPORTE/index.php'; </script>";
    echo "<script> window.location='../index.php'; </script>";}

?>
