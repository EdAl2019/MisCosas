<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './head.php'; ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <style>
        #map {
            height: 700px;
            width: 100%;
        }
    </style>


</head>

<body id="contenedor">
    <?php require './menu.php'; ?>
    <br>

    <h1 style="color:darkcyan">USUARIOS ENCUESTADORES</h1>
  

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12">



                                <select id="usuarios_activos" type="text" class="form-control form-control-lg" aria-label="PUNTO DE CONTROL" aria-describedby="basic-addon2"></select>
                                <br>

                                <div id="map"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xs-12">



                                <h1>UBICACION USUARIOS</h1>
                                <div class="col-lg-12">
                                    <div id="contenedor_tabla_puntos">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require './pie.php'; ?>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script>
        let maps = L.map('map').setView([14.0839962, -87.2399921], 12);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(maps);


        $.post("../controladores/controlador.php", {
                op: 'ubicacion_usuarios'
            },
            function(data, status) {
                rutas = JSON.parse(data);
                var opt = "<option selected disabled>Seleccionar usuario</option>"
                

                rutas.forEach(function(value, index) {
                    console.log(value.ubicacion_actual);

                    if (value.ubicacion_actual != null) {
                        let array = value.ubicacion_actual.split(',')

                        L.marker([array[0], array[1]]).addTo(maps).bindPopup("<h2 style='color:cadetblue;'><u>" + value.usuario + "</u></h2><br> <h3>Encuestador: <strong style='color: red;'>" + value.nombres +" "+value.apellidos  + "</strong><h3>");
                        opt = opt + "<option value='" + value.ubicacion_actual + "'>" + value.usuario + "</option>"

                    }
                });
                $("#usuarios_activos").html(opt).fadeIn()


            });

        L.Control.geocoder().addTo(maps);
            function volar_map(ubic) {
                let cords =ubic.split(",")
                maps.flyTo(cords, 18);

                
            }
        $(document).ready(function() {
            $("#contenedor_tabla_puntos").load('../tablas/tabla_ubicacion_usuarios.php')
            $("#usuarios_activos").on('click', function() {
                let cords = $(this).val().split(",")
                maps.flyTo(cords, 18);
            });
            $("#CERRAR_SESION").on('click', function() {

                $.ajax({
                    type: "GET",
                    url: "../controladores/controlador_login.php?op=cerrar",

                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            window.location = '../index.php'

                        }
                    }
                });
            })
        });
    </script>
</body>

</html>