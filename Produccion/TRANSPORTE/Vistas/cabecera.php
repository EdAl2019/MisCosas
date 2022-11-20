<nav class="navbar navbar-expand-lg navbar-light bg-light" >
              <strong><h7 class="navbar-brand" id="usuario"></h7></strong>
            <button class="navbar-toggler" type="button"style="background-color:#57D0E1;" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="formulario.php"><i class="fa fa-home" aria-hidden="true"></i>
 INICIO <span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> FORMULARIO
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="formulario.php"><i class="fa fa-users" aria-hidden="true"></i> MAYORES DE EDAD</a>
                            <div class="dropdown-divider"></div>
                            
                            <a hidden class="dropdown-item" href="formulario_menor_edad.php"><i class="fa fa-child" aria-hidden="true" ></i> MENORES DE EDAD</a>
                            
                        </div>
                    </li>
                    
                 
                   
                </ul>
                    <a class="my-2 my-sm-0" style="color: red;"
                                href="../Controlador/logout_controlador.php"><i class=" fa fa-sign-out" aria-hidden="true"></i>SALIR</a>
                                

               
            </div>
        </nav>