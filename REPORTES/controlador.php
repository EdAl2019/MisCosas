<?php 
    require 'modelo.php';
    
    $op=isset($_POST["op"])? $_POST["op"] : "";
    $fecha_e=isset($_POST["fecha_e"])? $_POST["fecha_e"] : "";
    $fecha_g=isset($_POST["fecha_g"])? $_POST["fecha_g"] : "";
    $fecha_gra=isset($_POST["fecha_gra"])? $_POST["fecha_gra"] : "";
    $gop=isset($_POST["gop"])? $_POST["gop"] : "";
    $instancia_modelo= new encuesta();


    switch ($op) {
        case 'datos1':
            # code...
          
            $res=$instancia_modelo->pregunta1();
            $result=array(); 
          
            while ($r=$res->fetch_object()) {
                # code...
               $result[]=$r;
               
            
                
            }
            print_r (json_encode($result));
          
          
            break;
            case 'datos2':
              # code...
              $res=$instancia_modelo->pregunta2();
              $result=array(); 
            
              while ($r=$res->fetch_object()) {
                  # code...
                 $result[]=$r;
                 
              
                  
              }
              print_r (json_encode($result));
            
            
              break;
              case 'datos3':
                # code...
                $res=$instancia_modelo->pregunta3();
                $result=array(); 
              
                while ($r=$res->fetch_object()) {
                    # code...
                   $result[]=$r;
                   
                
                    
                }
                print_r (json_encode($result));
              
              
                break;
                case 'datos4':
                  # code...
                  $res=$instancia_modelo->pregunta4();
                  $result=array(); 
                
                  while ($r=$res->fetch_object()) {
                      # code...
                     $result[]=$r;
                     
                  
                      
                  }
                  print_r (json_encode($result));
                
                
                  break;
                  case 'datos5':
                    # code...
                    $res=$instancia_modelo->pregunta5();
                    $result=array(); 
                  
                    while ($r=$res->fetch_object()) {
                        # code...
                       $result[]=$r;
                       
                    
                        
                    }
                    print_r (json_encode($result));
                  
                  
                    break;
                    case 'datos6':
                      # code...
                      $res=$instancia_modelo->pregunta6();
                      $result=array(); 
                    
                      while ($r=$res->fetch_object()) {
                          # code...
                         $result[]=$r;
                         
                      
                          
                      }
                      print_r (json_encode($result));
                    
                    
                      break;
                      case 'equipos':
                        # code...
                        $res=$instancia_modelo->e_equipos($fecha_gra);
                        $result=array(); 
                      
                        while ($r=$res->fetch_object()) {
                            # code...
                           $result[]=$r;
                           
                        
                            
                        }
                        print_r (json_encode($result));
                      
                      
                        break;
            case "general":

                $rspta = $instancia_modelo->listar_general($fecha_g); //instancia a la funcion listar
            
                //  
                //Vamos a declarar un array
                $data = array();
                while ($reg = $rspta->fetch_object()) {
                  $anio=substr($reg->identidad,-9,4);
                  $edad= 2022-intval($anio);
                  $data[] = array(
            
                    "0" => $reg->id_encuesta,
                    "1" => $reg->fecha_inicial,
                    "2" => $reg->fecha_final,
                    "3" => $reg->direccion_ip,
                    "4" => $reg->id_punto_control,
                    "5" => $reg->nombres,
                    "6" => $reg->apellidos,
                    "7" => $reg->identidad,
                    "8" => $edad,
                    "9"=> $reg->telefono, 
                    "10"=> $reg->pregunta1,
                    "11" => $reg->pregunta2,
                    "12" => $reg->pregunta3,
                    "13" => $reg->pregunta4,
                    "14" => $reg->pregunta5,
                    "15" => $reg->pregunta6,
                    "16" => $reg->usuario,

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
                   
                    $rspta = $instancia_modelo->listar_encuestadores($fecha_e,$gop); //instancia a la funcion listar
                
                    //  
                    //Vamos a declarar un array
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
                    $suma=0;
                    for ($i=0; $i < count($data) ; $i++) { 
                      # code...
                      $suma=$suma+ $data[$i][5];
                    }
                    $results = array(
                      "sEcho" => 1, //Información para el datatables
                      "iTotalRecords" => count($data), //enviamos el total registros al datatable
                      "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
                      "aaData" => $data,
                      "total"=> $suma,
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
        default:
            # code...
            break;
    }

?>

