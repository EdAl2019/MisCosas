<?php
session_start();
// ini_set('display_errors', 1);
// error_reporting('E_ALL');
require_once "../Modelos/Encuesta_modelo.php"; //refencia del modelo
date_default_timezone_set('America/Tegucigalpa');


//Variables a recibir y formatear en caso de ser enviadas.
$identidad = isset($_POST["IDENTIDAD"]) ? limpiarCadena1($_POST["IDENTIDAD"]) : "";

$edad = isset($_POST["EDAD"]) ? limpiarCadena1($_POST["EDAD"]) : "";

$nombre = isset($_POST["NOMBRES"]) ? limpiarCadena1( $_POST["NOMBRES"]) : "";
$apellido = isset($_POST["APELLIDOS"]) ? limpiarCadena1($_POST["APELLIDOS"]) : "";
$direccion = isset($_POST["DIRECCION"]) ? limpiarCadena1($_POST["DIRECCION"]) : "";
$estudia = isset($_POST["ESTUDIA"]) ? limpiarCadena1($_POST["ESTUDIA"]) : "";
$telefono = isset($_POST["TELEFONO"]) ? limpiarCadena1($_POST["TELEFONO"]) : "";
$qr = isset($_POST["QR"]) ? limpiarCadena1($_POST["QR"]) : "";
$fecha_i = isset($_POST["FECHAINICIO"]) ? limpiarCadena1($_POST["FECHAINICIO"]) : "";

$pregunta1= isset($_POST["1"]) ? limpiarCadena1($_POST["1"]) : "";
$pregunta2= isset($_POST["2"]) ? limpiarCadena1($_POST["2"]) : "";
$pregunta3= isset($_POST["3"]) ? limpiarCadena1($_POST["3"]) : "";
$pregunta4= isset($_POST["4"]) ? limpiarCadena1($_POST["4"]) : "";

//$pregunta5= isset($_POST["5"]) ? limpiarCadena1($_POST["5"]) : "";
$pregunta6= isset($_POST["6"]) ? limpiarCadena1($_POST["6"]) : "";
$identidad=str_replace("%20","",$identidad);
$telefono=str_replace("%20","",$telefono);

$id_usuario= isset($_SESSION['Id_usuario']) ? limpiarCadena1($_SESSION['Id_usuario']) : "";

$id_punto_control= isset($_SESSION['Id_punto_control']) ? limpiarCadena1($_SESSION['Id_punto_control']) : "";
$ip= isset($_POST['IP']) ? limpiarCadena1($_POST['IP']) : "";



$op =  isset($_GET["op"]) ? limpiarCadena1($_GET["op"]) : "";




//instancia del modelo
$instancia_modelo = new encuesta();

//swicht dependiendo de un get llamado "op"
switch ($op) {

    //Listar en una tabla los objetos
  case "registrar":
    $rspta=$instancia_modelo;
   
     $rsencuesta=$instancia_modelo;
   
      $rspta->registrar_persona($identidad,$qr,$telefono,$direccion);


    $fecha_f = date('Y-m-d h:i:s', time());

    $pregunta5="";
    foreach ($_POST['5'] as $key => $value) {
      # code...
      $pregunta5=$pregunta5.",".$value;
    }
    $pregunta6="";
    foreach ($_POST['6'] as $key => $value) {
      # code...
      $pregunta6=$pregunta6.",".$value;
    }
    $rsencuesta->guardar_encuesta($identidad,$qr,$id_usuario,$id_punto_control,$fecha_i,$fecha_f,$ip,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6);
    if ($rsencuesta) {
      # code...
      echo 1;
    }else{
    
    }
    //

   




    break;

    case 'registrar_menor':


        $rspta=$instancia_modelo;
      $persona=$instancia_modelo;
       $rsencuesta=$instancia_modelo;
       $encuesta=$instancia_modelo;
       $respuestas=$instancia_modelo;
       $nombre=strtoupper($nombre);
       $apellido=strtoupper($apellido);
        $rspta->registrar_persona_menor($nombre,$apellido,$telefono,$edad,$direccion);
      $id_persona=$persona->traer_id_persona_menor($nombre,$apellido,$edad,$telefono)->fetch_object();

      $fecha_f = date('Y-m-d h:i:s', time());




      $rsencuesta->registrar_encuesta_menor($id_persona->id_persona,$id_usuario,$id_punto_control,$fecha_i,$fecha_f,$ip);
       $id_encuesta=$encuesta->traer_id_encuesta_menor($id_persona->id_persona)->fetch_object();
      $pregunta4="";
      foreach ($_POST['4a'] as $key => $value) {
        # code...
        $pregunta4=$pregunta4.",".$value;
      }

      //respuestas
      $respuestas->registrar_respuesta_menores($id_encuesta->id_encuesta_menor,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,1,2,3,4,5);

      echo 1;





      break;
  case 'inicio':

  $TiempoHora = date('Y-m-d h:i:s', time());
  echo $TiempoHora;
    break;



  case 'parametros':
    # code...
    echo json_encode($_SESSION);
    break;

  case 'identidad':

      $valor=$instancia_modelo->verificar_identidad($identidad)->fetch_object();

      if ($valor->personas==0) {
        # code...

        $validarnp= $instancia_modelo->validar_id($identidad);
        if ($validarnp===1) {
          // code...
          echo 2;
        }
        else {
          echo 1;
        }
      }
      elseif ($valor->personas>0) {
        # code...
       echo 0;


      }

    break;
    case 'qr':

     
        # code...
        try {
          $validarnp= $instancia_modelo->validar_qr($qr);
          if ($validarnp===1) {
            // code...
            echo 2;
          }
          else {
            $valor=$instancia_modelo->verificar_qr($validarnp)->fetch_object();
            if ($valor->personas==0) {
              # code...
              echo 1;
             //retornar todo esta bien
              
            }
            elseif ($valor->personas>0) {
              # code...
             echo 0;//todo esta mal
      
      
            }
          }
          
        } catch(\Throwable $th) {
          
          echo 2;
        }
       
        
     

    break;
    case 'select_ruta':
      if (isset($_POST['activar'])) {
        $data = array();

        $respuesta = $instancia_modelo->listar_rutas($_SESSION["Id_zona"]);
        echo '<option  value="null" selected="" disabled="true">..SELECCIONE UNA RUTA ..</option>';

        while ($r = $respuesta->fetch_object()) {


            # code...
            echo "<option class='optr' value='" . $r->ruta . "'> " . $r->ruta . " </option>";




          }





      } else {
        echo 'No hay informacion';
      }

      break;
      default:

      break;

}//Fin del Switch////////////




?>
