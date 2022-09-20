<?php

session_start();

require_once "../Modelos/login_modelo.php"; //refencia del modelo



//Variables a recibir y formatear en caso de ser enviadas.
$usuario = isset($_POST["usuario"]) ? limpiarCadena1($_POST["usuario"]) : "";
$contraseña = isset($_POST["contraseña"]) ? limpiarCadena1($_POST["contraseña"]) : "";
$id_punto_control = isset($_POST["id_punto_control"]) ? limpiarCadena1($_POST["id_punto_control"]) : "";

$opcion = isset($_GET["op"]) ? limpiarCadena1($_GET["op"]) : "select_puntos_control";


//instancia del modelo
$instancia_modelo = new login();

//swicht dependiendo de un get llamado "op"
switch ($opcion) {

    
  
    

    //Mostrar un objeto por su id
  case 'login':
    
     
    
    if ($instancia_modelo->login_user($usuario, $contraseña)) {

        
    
        $_SESSION['Usuario'] = $usuario;
    
    
        $datos = $instancia_modelo->traerdatos($usuario);
        $zona=  $instancia_modelo->id_zona($id_punto_control);
    
    
        while ($res = $datos->fetch_object()) {
    
          $_SESSION['Id_usuario'] = $res->id_usuario;
    
    
          $_SESSION['Nombres'] = $res->nombres;
          $_SESSION['Apellidos'] = $res->apellidos;
    
          $_SESSION['Identidad'] = $res->identidad;

    
        }
        $_SESSION["Id_punto_control"]=$id_punto_control;
        $zona=$zona->fetch_object();
        $_SESSION["Id_zona"]=$zona->id_zona;
        echo 1;
    
      } else {
        
        echo 0;
    
      }
    
    # code...
    
   break;



////////////////////////////////////////////////////////////////////////////////////////



    //Listar los puntos de control para un elemento select html
  case 'select_puntos_control':
    if (isset($_POST['activar'])) {
      $data = array();
      $respuesta = $instancia_modelo->listar_puntos_de_control();
      echo '<option value="null" selected="" disabled="true">..SELECCIONA UN PUNTO DE CONTROL..</option>';
      $zona1="";
      $zona2="";
      $zona3="";
      $zona4="";
      $zona5="";
      
      while ($r = $respuesta->fetch_object()) {
        
        if ($r->id_zona==1) {
          # code...
          $zona1= $zona1."<option style='color: black;' value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==2) {
          # code...
          $zona2= $zona2."<option style='color: black;' value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==3) {
          # code...
          $zona3= $zona3."<option style='color: black;' value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==4) {
          # code...
          $zona4= $zona4."<option style='color: black;' value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==5) {
          # code...
          $zona5= $zona5."<option style='color: black;' value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
       
    
        }

        echo "<optgroup  label='ZONA CENTRO'>";
        echo $zona5;
      
        echo "</optgroup>";
        echo "<optgroup label='ZONA NORTE'>";
        echo $zona1;
        echo "</optgroup>";
        echo "<optgroup label='ZONA SUR'>";
        echo $zona2;
        echo "</optgroup>";
        echo "<optgroup label='ZONA ESTE'>";
        echo $zona3;
        echo "</optgroup>";
        echo "<optgroup label='ZONA OESTE'>";
        echo $zona4;
        echo "</optgroup>";
       
      
        
        
        
        
        
        
     
      
    } else {
      echo 'No hay informacion';
    }

    break;
   /////////////////////////////////////////////////////////////////////////////
 
}//Fin del Switch////////////




?>