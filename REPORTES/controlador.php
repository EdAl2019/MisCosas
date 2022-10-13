<?php 
    require 'modelo.php';
    
    $op=isset($_POST["op"])? $_POST["op"] : "";
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
            case "general":

                $rspta = $instancia_modelo->listar_general(); //instancia a la funcion listar
            
                //  
                //Vamos a declarar un array
                $data = array();
                while ($reg = $rspta->fetch_object()) {
                  $data[] = array(
            
                    "0" => $reg->id_encuesta,
                    "1" => $reg->fecha_inicial,
                    "2" => $reg->fecha_final,
                    "3" => $reg->direccion_ip,
                    "4" => $reg->id_punto_control,
                    "5" => $reg->nombres,
                    "6" => $reg->apellidos,
                    "7" => $reg->identidad,
                    "8" => $reg->pregunta1,
                    "9" => $reg->pregunta2,
                    "10" => $reg->pregunta3,
                    "11" => $reg->pregunta4,
                    "12" => $reg->pregunta5,
                    "13" => $reg->pregunta6,
                    "14" => $reg->usuario,

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

                    $rspta = $instancia_modelo->listar_encuestadores(); //instancia a la funcion listar
                
                    //  
                    //Vamos a declarar un array
                    $data = array();
                    while ($reg = $rspta->fetch_object()) {
                      $data[] = array(
                
                        "0" => $reg->nombres,
                        "1" => $reg->apellidos,
                        "2" => $reg->telefono,
                        "3" => $reg->usuario,
                        "4" => $reg->cantidad_encuestas,
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

