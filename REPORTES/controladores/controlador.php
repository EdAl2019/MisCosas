<?php
require '../modelos/modelo.php';
ini_set('display_errors', 1);
ini_set('memory_limit', '512M');
// error_reporting('E_ALL');
$op = isset($_POST["op"]) ? $_POST["op"] : "";
$fecha_inicio = isset($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : "";
$fecha_final = isset($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : "";
$fecha_e = isset($_POST["fecha_e"]) ? $_POST["fecha_e"] : "";
$fecha_g = isset($_POST["fecha_g"]) ? $_POST["fecha_g"] : "";
$id_ciudad = isset($_POST["ciudad"]) ? $_POST["ciudad"] : "";
$id_ciudad_encuestadores = isset($_POST["ciudad_encuestadores"]) ? $_POST["ciudad_encuestadores"] : "";
$fecha_gra = isset($_POST["fecha_gra"]) ? $_POST["fecha_gra"] : "";
$fecha_gra_final = isset($_POST["fecha_gra_final"]) ? $_POST["fecha_gra_final"] : "";
$gop = isset($_POST["gop"]) ? $_POST["gop"] : "";
$jornada=isset($_POST["jornada"])? $_POST["jornada"] : "";
$instancia_modelo = new encuesta();


switch ($op) {
  case "listar_usuarios_gps":

    $rspta = $instancia_modelo->listar_usuarios_gps(); //instancia a la funcion listar


    //Vamos a declarar un array
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $button='<button class="btn btn-warning" onclick="volar_map('."'".$reg->ubicacion_actual."'".')" > UBICAR EN MAPA </button>';
      $data[] = array(

        "0" => $reg->nombres." ".$reg->apellidos,
        "1" => $reg->usuario,
        "2" => $reg->ubicacion_actual,
        "3" => $button,

      );
    }
    $results = array(
      "sEcho" => 1, //Información para el datatables
      "iTotalRecords" => count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
      "aaData" => $data
    );
    echo json_encode($results); //enviamos los datos en formato JSON

    break;
  case 'ubicacion_usuarios':
    # code...

    $res = $instancia_modelo->ubicacion_usuarios();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));


    break;
  case 'datos1':
    # code...

    $res = $instancia_modelo->pregunta1();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));


    break;
  case 'datos2':
    # code...
    $res = $instancia_modelo->pregunta2();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));


    break;
  case 'datos3':
    # code...
    $res = $instancia_modelo->pregunta3();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));


    break;
  case 'datos4':
    # code...
    $res = $instancia_modelo->pregunta4();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));


    break;
  case 'datos5':
    # code...
    $res = $instancia_modelo->pregunta5();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));


    break;
  case 'datos6':
    # code...
    $res = $instancia_modelo->pregunta6();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));


    break;
    case 'datos7':
      # code...
      $res = $instancia_modelo->pregunta7();
      $result = array();
  
      while ($r = $res->fetch_object()) {
        # code...
        $result[] = $r;
      }
      print_r(json_encode($result));
  
  
      break;
  case 'equipos':
    # code...
    $res = $instancia_modelo->e_equipos($fecha_gra,$jornada,$fecha_gra_final,$id_ciudad);
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
  
    
  
    print_r(json_encode($result));


    break;
  case "general":

    $rspta = $instancia_modelo->listar_general($fecha_g); //instancia a la funcion listar

    //  
    //Vamos a declarar un array
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $anio = substr($reg->identidad, -9, 4);
      $estado_civil = "SE IGNORA";
      if ($reg->estado_civil == 1) {
        $estado_civil = "SOLTERO";
        # code...
      } elseif ($reg->estado_civil == 2) {
        $estado_civil = "CASADO";
      } elseif ($reg->estado_civil == 3) {
        $estado_civil = "DIVORCIADO";
      } elseif ($reg->estado_civil == 4) {
        $estado_civil = "UNION LIBRE";
      } elseif ($reg->estado_civil == 5) {
        $estado_civil = "VIUDO";
      } elseif ($reg->estado_civil == 6) {
        $estado_civil = "OTRO";
      }
      $data[] = array(

        "0" => $reg->id_encuesta,
        "1" => $reg->fecha_inicial,
        "2" => $reg->fecha_final,
        "3" => $reg->direccion_ip,
        "4" => $reg->id_punto_control,
        "5" => $reg->punto_control,
        "6" => $reg->nombres,
        "7" => $reg->apellidos,
        "8" => $reg->identidad,
        "9" => $reg->sexo,
        "10" => $reg->edad,
        "11" => $estado_civil,
        "12" => $reg->telefono,
        "13" => $reg->pregunta1,
        "14" => $reg->pregunta2,
        "15" => $reg->pregunta3,
        "16" => $reg->pregunta4,
        "17" => $reg->pregunta5,
        "18" => $reg->pregunta6,
        "19" => $reg->usuario,

      );
    }
    $results = array(
      "sEcho" => 1, //Información para el datatables
      "iTotalRecords" => count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
      "aaData" => $data
    );
    echo json_encode($results); //enviamos los datos en formato JSON

    break;
  case "encuestadores":

    $rspta = $instancia_modelo->listar_encuestadores($fecha_inicio,$fecha_final,$id_ciudad_encuestadores, $gop,$jornada); //instancia a la funcion listar

     
   // Vamos a declarar un array
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $data[] = array(

        "0" => $reg->grupo,
        "1" => $reg->nombres,
        "2" => $reg->apellidos,
        "3" => $reg->telefono,
        "4" => $reg->usuario,
        "5" => $reg->cantidad_encuestas,

      );
    }
    $suma = 0;
    for ($i = 0; $i < count($data); $i++) {
      # code...
      $suma = $suma + $data[$i][5];
    }
    $results = array(
      "sEcho" => 1, //Información para el datatables
      "iTotalRecords" => count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
      "aaData" => $data,
      "total" => $suma,
    );
    echo json_encode($results); //enviamos los datos en formato JSON
    

    break;
  case "productividad":

    $rspta = $instancia_modelo->productividad(); //instancia a la funcion listar

    //  
    //Vamos a declarar un array

    $data = array();
    $hora = "";
    while ($reg = $rspta->fetch_object()) {
      if ($reg->hora >= 6 && $reg->hora < 12) {
        $hora = $reg->hora . "am";
      } else {
        $hora = $reg->hora . "pm";
      }
      $data[] = array(

        "0" => $reg->usuario,
        "1" => $reg->grupo,
        "2" => $reg->dia,
        "3" => $reg->fecha,
        "4" => $hora,
        "5" => $reg->punto_control,
        "6" => $reg->cantidad,

      );
    }
    $suma = 0;
    for ($i = 0; $i < count($data); $i++) {
      # code...
      $suma = $suma + $data[$i][6];
    }
    $results = array(
      "sEcho" => 1, //Información para el datatables
      "iTotalRecords" => count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
      "aaData" => $data,
      "total" => $suma,
    );
    echo json_encode($results); //enviamos los datos en formato JSON

    break;
  case "listar_respuesta":

    $rspta = $instancia_modelo->listar_respuesta($_POST['id_pregunta']); //instancia a la funcion listar


    //Vamos a declarar un array
    $data = array();
    while ($reg = $rspta->fetch_object()) {
      $data[] = array(

        "0" => $reg->respuesta,
        "1" => $reg->c,

      );
    }
    $results = array(
      "sEcho" => 1, //Información para el datatables
      "iTotalRecords" => count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
      "aaData" => $data
    );
    echo json_encode($results); //enviamos los datos en formato JSON

    break;
  case 'productividad_g':
    # code...
    $res = $instancia_modelo->productividad_g();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));

    break;
  case 'productividad_grupo':
    # code...
    $res = $instancia_modelo->productividad_grupo();
    $result = array();
    $prom = array(
      "1" => array("6" => array("suma" => 0, "dias" => 0), "7" => array("suma" => 0, "dias" => 0), "8" => array("suma" => 0, "dias" => 0), "9" => array("suma" => 0, "dias" => 0), "10" => array("suma" => 0, "dias" => 0), "11" => array("suma" => 0, "dias" => 0), "12" => array("suma" => 0, "dias" => 0), "1" => array("suma" => 0, "dias" => 0), "2" => array("suma" => 0, "dias" => 0), "3" => array("suma" => 0, "dias" => 0), "4" => array("suma" => 0, "dias" => 0), "5" => array("suma" => 0, "dias" => 0)),
      "2" => array("6" => array("suma" => 0, "dias" => 0), "7" => array("suma" => 0, "dias" => 0), "8" => array("suma" => 0, "dias" => 0), "9" => array("suma" => 0, "dias" => 0), "10" => array("suma" => 0, "dias" => 0), "11" => array("suma" => 0, "dias" => 0), "12" => array("suma" => 0, "dias" => 0), "1" => array("suma" => 0, "dias" => 0), "2" => array("suma" => 0, "dias" => 0), "3" => array("suma" => 0, "dias" => 0), "4" => array("suma" => 0, "dias" => 0), "5" => array("suma" => 0, "dias" => 0)),
      "3" => array("6" => array("suma" => 0, "dias" => 0), "7" => array("suma" => 0, "dias" => 0), "8" => array("suma" => 0, "dias" => 0), "9" => array("suma" => 0, "dias" => 0), "10" => array("suma" => 0, "dias" => 0), "11" => array("suma" => 0, "dias" => 0), "12" => array("suma" => 0, "dias" => 0), "1" => array("suma" => 0, "dias" => 0), "2" => array("suma" => 0, "dias" => 0), "3" => array("suma" => 0, "dias" => 0), "4" => array("suma" => 0, "dias" => 0), "5" => array("suma" => 0, "dias" => 0)),
      "4" => array("6" => array("suma" => 0, "dias" => 0), "7" => array("suma" => 0, "dias" => 0), "8" => array("suma" => 0, "dias" => 0), "9" => array("suma" => 0, "dias" => 0), "10" => array("suma" => 0, "dias" => 0), "11" => array("suma" => 0, "dias" => 0), "12" => array("suma" => 0, "dias" => 0), "1" => array("suma" => 0, "dias" => 0), "2" => array("suma" => 0, "dias" => 0), "3" => array("suma" => 0, "dias" => 0), "4" => array("suma" => 0, "dias" => 0), "5" => array("suma" => 0, "dias" => 0)),
      "5" => array("6" => array("suma" => 0, "dias" => 0), "7" => array("suma" => 0, "dias" => 0), "8" => array("suma" => 0, "dias" => 0), "9" => array("suma" => 0, "dias" => 0), "10" => array("suma" => 0, "dias" => 0), "11" => array("suma" => 0, "dias" => 0), "12" => array("suma" => 0, "dias" => 0), "1" => array("suma" => 0, "dias" => 0), "2" => array("suma" => 0, "dias" => 0), "3" => array("suma" => 0, "dias" => 0), "4" => array("suma" => 0, "dias" => 0), "5" => array("suma" => 0, "dias" => 0)),
      "6" => array("6" => array("suma" => 0, "dias" => 0), "7" => array("suma" => 0, "dias" => 0), "8" => array("suma" => 0, "dias" => 0), "9" => array("suma" => 0, "dias" => 0), "10" => array("suma" => 0, "dias" => 0), "11" => array("suma" => 0, "dias" => 0), "12" => array("suma" => 0, "dias" => 0), "1" => array("suma" => 0, "dias" => 0), "2" => array("suma" => 0, "dias" => 0), "3" => array("suma" => 0, "dias" => 0), "4" => array("suma" => 0, "dias" => 0), "5" => array("suma" => 0, "dias" => 0)),
    );

    while ($r = $res->fetch_object()) {
      # code...

      switch ($r->grupo) {
        case '1':
          switch ($r->hora) {
            case '6':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '7':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '8':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '9':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '10':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '11':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '12':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '1':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '2':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '3':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '4':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '5':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            default:
              # code...
              break;
          }
          # code...
          break;
        case '2':
          switch ($r->hora) {
            case '6':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '7':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '8':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '9':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '10':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '11':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '12':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '1':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '2':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '3':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '4':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '5':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            default:
              # code...
              break;
          }
          # code...
          break;
        case '3':
          switch ($r->hora) {
            case '6':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '7':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '8':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '9':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '10':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '11':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '12':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '1':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '2':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '3':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '4':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '5':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            default:
              # code...
              break;
          }
          # code...
          break;
        case '4':
          switch ($r->hora) {
            case '6':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '7':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '8':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '9':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '10':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '11':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '12':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '1':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '2':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '3':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '4':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '5':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            default:
              # code...
              break;
          }
          # code...
          break;
        case '5':
          switch ($r->hora) {
            case '6':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '7':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '8':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '9':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '10':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '11':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '12':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '1':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '2':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '3':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '4':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '5':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            default:
              # code...
              break;
          }
          # code...
          break;
        case '6':
          switch ($r->hora) {
            case '6':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '7':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '8':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '9':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '10':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;
            case '11':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '12':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '1':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '2':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '3':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '4':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            case '5':
              $prom[$r->grupo][$r->hora]['suma'] = $prom[$r->grupo][$r->hora]['suma'] + $r->cantidad;
              $prom[$r->grupo][$r->hora]['dias'] = $prom[$r->grupo][$r->hora]['dias'] + 1;

              # code...
              break;

            default:
              # code...
              break;
          }
          # code...
          break;


        default:
          # code...
          break;
      }
     
    }
   
    print_r(json_encode($prom));

    break;
  case 'encuesta_punto_control':
    # code...
    $res = $instancia_modelo->encuestas_punto_control();
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));

    break;
  case 'sexo':
    # code...
    $res = $instancia_modelo->sexo($fecha_gra);
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));

    break;
  case 'edades':
    # code...
    $res = $instancia_modelo->edades($fecha_gra);
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));

    break;
  case 'estado_civil':
    # code...
    $res = $instancia_modelo->estado_civil($fecha_gra);
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));

    break;
  case 'puntos_control':
    # code...
    $res = $instancia_modelo->punto_control($fecha_gra);
    $result = array();

    while ($r = $res->fetch_object()) {
      # code...
      $result[] = $r;
    }
    print_r(json_encode($result));

    break;
    case 'puntos_control_horas':
      # code...
      $res = $instancia_modelo->puntos_control_hora();
        //  
    //Vamos a declarar un array
    $data = array();
    while ($reg = $res->fetch_object()) {
      $data[] = array(

        "0" => $reg->id_punto_control,
        "1" => $reg->zona,
        "2" => $reg->punto_control,
        "3" => $reg->cantidad,
        "4" => $reg->hora,
        "5" => $reg->jornada,
       

      );
    }
    
   
    $results = array(
      "sEcho" => 1, //Información para el datatables
      "iTotalRecords" => count($data), //enviamos el total registros al datatable
      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
      "aaData" => $data,
      
    );
    echo json_encode($results); //enviamos los datos en formato JSON

      break;
  default:
    # code...
    break;
}
