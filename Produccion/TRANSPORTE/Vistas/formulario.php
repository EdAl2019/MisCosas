<?php
session_set_cookie_params(60*60*24*1);
session_start();
$id_usuario=$_SESSION['Id_usuario'];



if (isset($_SESSION['Id_usuario'])) { 
  date_default_timezone_set('America/Tegucigalpa');
  
echo "<script> var id_user=$id_usuario</script>";




  $f_a = date('H:i:s', time());
 

  $f_i = date('05:00:00', time());

  $f_f = date('23:40:00', time());

  

  
  ?>
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
    <?php require 'cabecera.php';
    date_default_timezone_set('America/Tegucigalpa');
  
   $data=$_SERVER['REMOTE_ADDR']
   
    ?>

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
                  <input type="text" id="IP" hidden name="IP" value="<?php echo $data; ?>" >
                    <input type="text" id="FECHAINICIO" name="FECHAINICIO" hidden>
                    <input type="text" id="JORNADA" name="JORNADA" value=<?php echo date('a'); ?> hidden>

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
                                                <textarea onkeyup="this.value=this.value.replace('  ',' ');" type="text" class="form-control" id="DIRECCION"
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
                    <label for="DONDESEDIRIGE"><strong>RANGO SALARIAL </strong><i class="fa fa-money"
                        aria-hidden="true"></i>
                    </label>
                    <select name="7" id="7" class="form-control">
                    <option value="MENOS DE 10,000">MENOS DE 10,000</option>
                      <option value="10,000 - 17,000">10,000 - 17,000</option>
                      <option value="17,000 - 25,000">17,000 - 25,000</option>
                      <option value="25,000 EN ADELANTE">25,000 EN ADELANTE</option>
                      
                    </select>
                  </div>
                  <br>
                  <div class="form-group col-md-12">
                    <label for="DONDESEDIRIGE"><strong>¿A DÓNDE SE DIRIGE? </strong><i class="fa fa-location-arrow"
                        aria-hidden="true"></i>
                    </label>
                    <select name="1" id="1" class="form-control">
                    <option value="HOGAR">HOGAR.</option>
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
                      <label class="form-check-label" for="">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="2" name="2" id="2">
                      <label class="form-check-label" for="">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="3" name="2" id="2">
                      <label class="form-check-label" for="">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="4" name="2" id="2">
                      <label class="form-check-label" for="">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="5" name="2" id="2">
                      <label class="form-check-label" for="">
                        5
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="6" name="2" id="2">
                      <label class="form-check-label" for="">
                        6
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio2" type="radio" value="7" name="2" id="2">
                      <label class="form-check-label" for="">
                        7
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input frecuencia-mas" type="radio" name="2" id="2">
                      <label class="form-check-label" for="">
                        OTROS:

                      </label> <input class="2-mas" type="text" onkeyup="this.value=this.value.replace('  ',' ');" onkeydown="filtro2();" id="2" placeholder="Especifique.."  name="2"  required>
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
                      <label class="form-check-label" for="">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="2" name="3" id="3">
                      <label class="form-check-label" for="">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" type="radio" value="3" name="3" id="3">
                      <label class="form-check-label" for="">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio3" value="4" type="radio" name="3" id="3">
                      <label class="form-check-label" for="">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input transporte-mas" type="radio" name="3" id="3">
                      <label class="form-check-label" for="">
                        Más de 4:

                      </label> <input class="3-mas" type="number" onkeydown="filtro();" focusout="minimo();"id="3" value="5" placeholder="5"  name="3"  min="5" max="15" required>
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
                      <label class="form-check-label" for="">
                        1
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="2" name="4" id="4">
                      <label class="form-check-label" for="">
                        2
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="3" name="4" id="4">
                      <label class="form-check-label" for="">
                        3
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input radio4" type="radio" value="4" name="4" id="4">
                      <label class="form-check-label" for="">
                        4
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input transporte-hogar" type="radio" name="4" id="4">
                      <label class="form-check-label" for="hogar_transporte5">
                                    Más de 4:
                                  </label>
                                  <input type="number" onkeydown="filtro();" focusout="minimo();" class="4-mas" name="4" id="4" placeholder="5" min="5" max="15" value="5" required>
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
                      <label class="form-check-label" for="">
                        COLECTIVOS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="MOTO-TAXIS" name="5[]"
                        id="5">
                      <label class="form-check-label" for="">
                        MOTO-TAXIS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value='MICRO-BUS "BRUJITOS"' name="5[]"
                        id="5">
                      <label class="form-check-label" for="">
                        MICRO-BUS "BRUJITOS"
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value='OTROS"' name="5[]"
                        id="5">
                      <label class="form-check-label" for="">
                        OTROS
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
  <script>
        $("#permisoGPS").click(function(){
          location.reload()
            
        });
var denegado
const funcionInit = () => {
	if (!"geolocation" in navigator) {
		return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
	}




	const onUbicacionConcedida = ubicacion => {
		console.log("UBICACION BIEN");
		const coordenadas = ubicacion.coords;
	    coordenadas.latitude;
		 coordenadas.longitude;
         $("#ubicacion").val(coordenadas.latitude+","+coordenadas.longitude)
         $("#comenzar").removeAttr("disabled")
    
		
	}
	const onErrorDeUbicacion = err => {
        $("#comenzar").prop("disabled",true)

        alert("DEBES HABILITAR LA UBICACIÓN GPS EN TU DISPOSITIVO")
      
		
       denegado=true;
     
      
	}

	const opcionesDeSolicitud = {
		enableHighAccuracy: true, // Alta precisión
		maximumAge: 0, // No queremos caché
		timeout: 8000 // Esperar solo 5 segundos
	};

	
	navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);

};
setInterval(funcionInit, 8000);

document.addEventListener("DOMContentLoaded", funcionInit);


    </script>
</body>

</html>


  <?php
 
  if ($f_a<$f_f && $f_a>$f_i) {
  
       # code...
   }else  {
       # code...
       echo "<script>
       Swal.fire({
         position: 'top-center',
         imageUrl: '../src/img/firma.jpg',
         imageWidth: 100,
         imageHeight: 100,
         imageAlt: 'Custom image',
         icon: 'alert',
         title:
           'Ya se terminó la jornada de encuestas, se cerrará la sesión.',
         showConfirmButton: false,
         footer: '".'<a class='.'"btn btn-primary"'.' href="'.'../Controlador/logout_controlador.php'.'">Ok</a>'."',
         timer: 2000,
         timerProgressBar: true,
       }).then(()=>{
        window.location='../Controlador/logout_controlador.php';

       });
       
       </script>";  
    
   }
 
} else {# code...
     
  
     echo "<script> window.location='../Controlador/logout_controlador.php?id=$id_usuario'; </script>";}
?>
