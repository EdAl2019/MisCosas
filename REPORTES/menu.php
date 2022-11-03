<?php 
if (isset($_SESSION['Usuario'])) { 

}else{

  header('location: https://190.130.9.62/repositorios/MisCosas/REPORTES/');
}

?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-light">
  
  <a class="navbar-brand" id="home" aria-current="page" href="https://190.130.9.62/repositorios/MisCosas/REPORTES/reportes.php"><?php echo $_SESSION['Usuario'];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    
    <li class="nav-item">
      <a class="nav-link" id="1" tipo="bar" href="https://190.130.9.62/repositorios/MisCosas/REPORTES/preguntas/pregunta1.php">PREGUNTA 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="2" tipo="doughnut" href="https://190.130.9.62/repositorios/MisCosas/REPORTES/preguntas/pregunta2.php">PREGUNTA 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="3" tipo="line" href="https://190.130.9.62/repositorios/MisCosas/REPORTES/preguntas/pregunta3.php">PREGUNTA 3</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="4" tipo="line" href="https://190.130.9.62/repositorios/MisCosas/REPORTES/preguntas/pregunta4.php">PREGUNTA 4</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " id="5" tipo="bar" href="https://190.130.9.62/repositorios/MisCosas/REPORTES/preguntas/pregunta5.php">PREGUNTA 5</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " id="6" aria-current="page" tipo="doughnut" href="https://190.130.9.62/repositorios/MisCosas/REPORTES/preguntas/pregunta6.php">PREGUNTA 6</a>
    </li>
    <li class="nav-item btn-cerrarsesion  flex-fill">

   </li>
    <li class="nav-item btn-cerrarsesion">
    <button id="CERRAR_SESION" class="btn btn-warning">CERRAR SESIÓN</button>
    </li>
    </ul>
    
  </div>

</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>