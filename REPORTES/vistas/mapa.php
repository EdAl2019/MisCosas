<!DOCTYPE html>
<html lang="en">

<head>
    <?php require './head.php'; ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
    </style>


</head>

<body id="contenedor">
    <?php require './menu.php'; ?>
    <br>

    <h1 style="color:darkcyan">PUNTOS DE CONTROL</h1>
    <!-- <div class="container">
    <div class="row">
    <div class="col-lg-12" >
    <div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-xs-12">
         <iframe src="https://www.google.com/maps/d/embed?mid=1taZOuvoe3aj8_UBX20NNmqgipmh_lnQ&hl=es&ehbc=2E312F" width="100%" height="450%"></iframe>
      </div> 
     
     
    </div>
    </div>
    </div>
    </div>
    </div>
  
    </div> -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-xs-12">

                               
                                    
                                    <select id="puntos_control" type="text" class="form-control form-control-lg"  aria-label="PUNTO DE CONTROL" aria-describedby="basic-addon2"></select>
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

                               
                                    
                                 <h1>PUNTOS DE CONTROL</h1>
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
                op: 'encuesta_punto_control'
            },
            function(data, status) {
                rutas = JSON.parse(data);
                var opt="<option selected disabled>Seleccionar punto de control</option>"


                rutas.forEach(function(value, index) {
                  
                    if ( value.ubicacion_gps !=null) {
                        let array = value.ubicacion_gps.split(',')

                    L.marker([array[0], array[1]]).addTo(maps).bindPopup("<h2 style='color:cadetblue;'><u>"+value.punto_control + "</u></h2><br> <h3>Cantidad de encuestas: <strong style='color: red;'>" + value.cantidad+"</strong><h3>");
                    opt=opt+"<option value='"+value.ubicacion_gps+"'>"+value.punto_control+"</option>"
                
                    }
                    });
                    $("#puntos_control").html(opt).fadeIn()
               

            });
           
        L.Control.geocoder().addTo(maps);

        $(document).ready(function(){
            $("#contenedor_tabla_puntos").load('../tablas/tabla_puntos_control.php')
            $("#puntos_control").on('change', function() {
                let cords=$(this).val().split(",")
                maps.flyTo(cords,18);
            });
        });
    </script>
</body>

</html>