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
    
     
    
    if ($instancia_modelo->login_usuario($usuario, $contraseña)) {

        
    
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
      $zona6="";
      $zona7="";
      $zona8="";
      while ($r = $respuesta->fetch_object()) {
        
        if ($r->id_zona==1) {
          # code...
          $zona1= $zona1."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==2) {
          # code...
          $zona2= $zona2."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==3) {
          # code...
          $zona3= $zona3."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==4) {
          # code...
          $zona4= $zona4."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==5) {
          # code...
          $zona5= $zona5."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==6) {
          # code...
          $zona6= $zona6."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==7) {
          # code...
          $zona7= $zona7."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
        if ($r->id_zona==8) {
          # code...
          $zona8= $zona8."<option value='" . $r->id_punto_control . "'> " . $r->punto_control . " </option>";
      
        }
    
        }

        echo "<optgroup label='Zona 1'>";
        echo $zona1;
        echo "</optgroup>";
        echo "<optgroup label='Zona 2'>";
        echo $zona2;
        echo "</optgroup>";
        echo "<optgroup label='Zona 3'>";
        echo $zona3;
        echo "</optgroup>";
        echo "<optgroup label='Zona 4'>";
        echo $zona4;
        echo "</optgroup>";
        echo "<optgroup label='Zona 5'>";
        echo $zona5;
        echo "</optgroup>";
        echo "<optgroup label='Zona 6'>";
        echo $zona6;
        echo "</optgroup>";
        echo "<optgroup label='Zona 7'>";
        echo $zona7;
        echo "</optgroup>";
        echo "<optgroup label='Zona 8'>";
        echo $zona8;
        echo "</optgroup>";
        
        
        
        
        
        
     
      
    } else {
      echo 'No hay informacion';
    }

    break;
   /////////////////////////////////////////////////////////////////////////////
 
}//Fin del Switch////////////




?>