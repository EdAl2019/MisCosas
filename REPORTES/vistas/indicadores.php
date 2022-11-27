<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require("./head.php");
    ?>
</head>

<body>
    <?php
    require("./menu.php");

    ?>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <br>
            <div class="row">
                
                <label for="fecha_grafica_g">FILTRAR POR FECHA</label>

                <div><input type="date" id="fecha_general" name="fecha_general" min="2022-10-13" max="2022-12-30" value='2022' class="form-control"><button id="limpiar_f" class="btn btn-primary">Limpiar Filtro</button> </div>
                <div></div>
                <br>
            </div>

        </div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">


        <div class="col-sm-6">

            <div class="row">

                <div class="col-xs-6" style="float: left;">


                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">GRÁFICA POR EDADES</div>

                           
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div id="contenedor_grafico_edades"></div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-6">
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">GRÁFICA ESTADO CIVIL</div>

                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div id="contenedor_grafico_estado_civil"></div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
                <div class="col-xs-6">

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">GRÁFICA POR PUNTO DE CONTROL</div>

                          
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div id="contenedor_grafico_punto_control"></div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-6">
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">GRÁFICA POR SEXO</div>

                          
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                                <div id="contenedor_grafico_sexo"></div>

                            </div>
                        </div>
                    </div>

                </div>






            </div>


        </div>
        <div class="col-sm-4"></div>
    </div>



    <?php
    require("./pie.php");

    ?>
    <script src="../src/indicadores.js"></script>
</body>

</html>