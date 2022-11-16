<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require("./head.php");
    ?>
   
</head>
<body id="contenedor">
<?php
    require("./menu.php");
    
    ?>
    <br>
  
    <h1>PRODUCTIVIDAD</h1>
    
    <div class="col-xg-12" style="padding-top:20px;">
    <div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-lg-12">
        <div id="contenedor_tabla_p"></div>
      </div>
      <div class="col-sm-6">
      <canvas id="productividad_grupo_hora" ></canvas>
      </div>
      <div class="col-sm-6">
      <canvas id="productividad" ></canvas>
      </div>
     
    </div>
    </div>
    </div>

   

    <?php
    require("./pie.php");
    
    ?>
    <script src="productividad.js"></script>
</body>
</html>