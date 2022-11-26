<?php
    if (isset($_SERVER['HTTPS'])) {
        # code...
    
    session_start();
    if (isset($_SESSION["Id_usuario"])) {
       // echo "<script> window.location='https://".$_SERVER['SERVER_ADDR']."/TRANSPORTE/Vistas/formulario.php'; </script>";
       echo "<script> window.location='Vistas/formulario.php'; </script>";
    
    }
    else {

              date_default_timezone_set('America/Tegucigalpa');




            $f_a = date('H:i:s', time());

            $f_i = date('06:00:00', time());

            $f_f = date('18:00:00', time());

            echo $f_a;
            $input;
            if ($f_a<$f_f && $f_a>$f_i) {
             $input="";
                # code...
            }else  {
                # code...
            $input="disabled";
            }

       

        ?>
   

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/dist/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="src/dist/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/dist/bootstrap/css/bootstrap.css.map">
    <link rel="stylesheet" href="src/dist/sweetalert2/dist/sweetalert2.min.css">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('src/img/logo.jpg');
        background-repeat: no-repeat;
        height: 100vh;
    }

    img {
        margin-top: 0px;
    }

    .logo_foto {
        margin-top: 0px;
    }

    h3 {
        margin-top: 0px;
    }

    #login .container #login-row #login-column #login-box {
        margin-top: 30px;
        max-width: 600px;
        height: 320px;
        border: 1px solid #9C9C9C;
        background-color: #EAEAEA;
    }

    #login .container #login-row #login-column #login-box #login-form {
        padding: 20px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
        margin-top: -85px;
    }
    optgroup[label] {
    color: blue;
    
    }
    </style>
</head>

<body>
    <br>
    <br><br>

    <div class="row">
        <div class="col-lg-12 text-center logo_foto" style="margin: 0; padding: 0;">

            <img src="src/img/iconotu.jpg" width="100" height="100" class="img-fluid rounded-circle">
            <h3 class="text-center pt-5" style="color:darkblue ;"><strong>CENSO TRANSPORTE TERRESTRE</strong></h3>
        </div>
    </div>

    <div id="login" style="margin: 0; padding: 0;">

        <div class="container" style="">

            <div id="login-row" class="row justify-content-center align-items-center">


                <div id="login-column" class="col-md-6">

                    <div id="login-box" class="col-md-12">


                        <form id="login-form" class="form">
                            <h3 class="text-center text-info">INICIO DE SESIÓN</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">USUARIO:</label><br>
                                <input type="text" name="usuario" id="usuario" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">CONTRASEÑA:</label><br>
                                <input type="password" name="contraseña" id="contraseña" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="text" class="text-info">RUTA:</label><br>
                                <select name="id_punto_control" id="id_punto_control" class="form-control" required>

                                </select>
                              

                            </div>
                            <br>
                            <div class="card-footer text-center">
                                <button type="submit" name="entrar" id="entrar"
                                    class="submit btn btn-primary" <?php echo $input; ?>><h4>ENTRAR</h4></button>
                                   
                            </div>
                          
                           
                         
                        </form>
                        <br>
                            <br><br>

                    </div>
                    
                </div>
                <br>
                            <br><br>
            </div>
        </div>
    </div>

    <script src="src/dist/bootstrap/js/bootstrap.js"></script>
    <script src="src/dist/bootstrap/js/bootstrap.min.js"></script>
   
    <script src="src/dist/Jquery/jquery-3.6.1.min.js"></script>
    <script src="src/dist/sweetalert2/dist/sweetalert2.all.min.js"></script>
   

    <script src="src/js/login.js"></script>
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
		console.log("Tengo la ubicación: ", ubicacion);
		const coordenadas = ubicacion.coords;
	    coordenadas.latitude;
		 coordenadas.longitude;
    
		
	}
	const onErrorDeUbicacion = err => {

        //("FALLO LA UBICACION")
		
       denegado=true;
     
      
	}

	const opcionesDeSolicitud = {
		enableHighAccuracy: true, // Alta precisión
		maximumAge: 0, // No queremos caché
		timeout: 5000 // Esperar solo 5 segundos
	};

	
	navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);

};
document.addEventListener("DOMContentLoaded", funcionInit);



    </script>

</body>

</html>
<?php
        # code...
    }
}else {
    header('location: https://190.130.9.62/TRANSPORTE/');
}
?>