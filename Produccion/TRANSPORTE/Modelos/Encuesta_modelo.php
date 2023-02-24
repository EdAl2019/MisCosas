<?php



require_once('../Config/conexion.php');
require_once('../WebService/RNP/rnp_class.php');
$instancia_conexion = new conexion();


class encuesta
{ // Clase para gestionar las consultas de las encuestas
    
function guardar_encuesta($identidad,$qr,$id_usuario,$id_punto_control,$fecha_i,$fecha_f,$jornada,$ip,$r1,$r2,$r3,$r4,$r5,$r6,$r7){
    global $instancia_conexion;
    if (empty($qr)) {
        $qr="null";
        # code...
    }
    if (empty($identidad)) {
        $identidad="null";
        # code...
    }
    $sql = "call guardar_encuesta('$identidad','$qr',$id_usuario,$id_punto_control,'$fecha_i','$fecha_f','$jornada','$ip','$r1','$r2','$r3','$r4','$r5','$r6','$r7');";
   
    return $instancia_conexion->ejecutarConsulta($sql);

}
    function registrar_encuesta($id_persona,$id_usuario,$id_punto_control,$fecha_i,$fecha_f,$ip)
    {
        global $instancia_conexion;
        $sql = "insert into TBL_ENCUESTAS(id_persona,id_usuario,id_punto_control,fecha_inicial,fecha_final,direccion_ip)
        values($id_persona,$id_usuario,$id_punto_control,'$fecha_i','$fecha_f','$ip');";
        return $instancia_conexion->ejecutarConsulta($sql);


        # code...
    }
    function registrar_encuesta_menor($id_persona,$id_usuario,$id_punto_control,$fecha_i,$fecha_f,$ip)
    {
        global $instancia_conexion;
        $sql = "insert into TBL_ENCUESTAS_MENORES_EDAD(id_persona,id_usuario,id_punto_control,fecha_inicial,fecha_final,direccion_ip)
        values($id_persona,$id_usuario,$id_punto_control,'$fecha_i','$fecha_f','$ip');";
        return $instancia_conexion->ejecutarConsulta($sql);


        # code...
    }

    function registrar_persona($identidad=null, $qr=null,$telefono,$direccion)
    {
        global $instancia_conexion;
        $instancia_rnp=new Web_Service_RNP($identidad,$qr);

            if ($identidad===null || $identidad==""|| empty($identidad)) {
                # code...

                $info=$instancia_rnp->QR_persona();
                $identidad= $info->NumInscripcion;
            }
            if ($qr===null || $qr==""|| empty($qr)){

                $info=$instancia_rnp->Identidad_persona();

            }

            $nombres=$info->Nombres;
            $apellidos=$info->PrimerApellido." ".$info->SegundoApellido;
            $edad=substr($info->FechaDeNacimiento,0,4);
            $edad=2022-intval($edad);
            $sexo=$info->Sexo;
            $estado_civil=$info->EstadoCivil;


        $sql = "insert into TBL_PERSONAS (nombres,apellidos,identidad,qr,telefono,direccion,edad,sexo,estado_civil)
        values('$nombres','$apellidos','$identidad','$qr','$telefono','$direccion','$edad','$sexo','$estado_civil');";
        return $instancia_conexion->ejecutarConsulta($sql);
        # code...
    }
    function registrar_persona_menor($nombres,$apellidos, $telefono,$edad,$direccion)
    {
        global $instancia_conexion;
        $sql = "insert into TBL_PERSONAS (nombres,apellidos,telefono,edad,direccion)
        values('$nombres','$apellidos','$telefono',$edad,'$direccion');";
        return $instancia_conexion->ejecutarConsulta($sql);
        # code...
    }

    function registrar_respuesta($id_encuesta, $respuesta1,$respuesta2,$respuesta3,$respuesta4,$respuesta5,$respuesta6,$id_pregunta1,$id_pregunta2,$id_pregunta3,$id_pregunta4,$id_pregunta5,$id_pregunta6)
    {
        global $instancia_conexion;
        $sql = "insert into TBL_RESPUESTAS(id_encuesta,respuesta,id_pregunta) values
        ($id_encuesta,'$respuesta1',$id_pregunta1),
        ($id_encuesta,'$respuesta2',$id_pregunta2),
        ($id_encuesta,'$respuesta3',$id_pregunta3),
        ($id_encuesta,'$respuesta4',$id_pregunta4),
        ($id_encuesta,'$respuesta5',$id_pregunta5),
        ($id_encuesta,'$respuesta6',$id_pregunta6);";
        return $instancia_conexion->ejecutarConsulta($sql);


        # code...
    }
    //insertar encuestas para menores
    function registrar_respuesta_menores($id_encuesta, $respuesta1,$respuesta2,$respuesta3,$respuesta4,$respuesta5,$id_pregunta1,$id_pregunta2,$id_pregunta3,$id_pregunta4,$id_pregunta5)
    {
        global $instancia_conexion;
        $sql = "insert into TBL_RESPUESTAS_MENORES(id_encuesta_menor,respuesta,id_pregunta_menor) values
        ($id_encuesta,'$respuesta1',$id_pregunta1),
        ($id_encuesta,'$respuesta2',$id_pregunta2),
        ($id_encuesta,'$respuesta3',$id_pregunta3),
        ($id_encuesta,'$respuesta4',$id_pregunta4),
        ($id_encuesta,'$respuesta5',$id_pregunta5);";
        return $instancia_conexion->ejecutarConsulta($sql);


        # code...
    }



    function listar_puntos_de_control()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select id_punto_control,punto_encuestar from TBL_PUNTOS_DE_CONTROL;');

        return $consulta;
    }
    function listar_rutas($id_ciudad)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta("select * from TBL_RUTAS where id_ciudad=$id_ciudad order by ruta;");

        return $consulta;
    }

    function traer_id_persona($identidad=null,$qr=null)
    {
        global $instancia_conexion;
        if (empty($identidad)) {
            $sql = 'select id_persona from TBL_PERSONAS where qr="'.$qr.'";';
            # code...
        }
        if (empty($qr)) {
            # code...
            $sql = 'select id_persona from TBL_PERSONAS where identidad="'.$identidad.'";';
        }

        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function traer_id_persona_menor($nombre,$apellido,$edad,$telefono){
        global $instancia_conexion;
        $sql = 'select id_persona from TBL_PERSONAS where nombres="'.$nombre.'" and apellidos="'.$apellido.'" and edad='.$edad.' and telefono="'.$telefono.'";';
        return $instancia_conexion->ejecutarConsulta($sql);


    }
    function verificar_identidad($identidad)
    {
        global $instancia_conexion;
        $sql = 'select count(id_persona) as personas from TBL_PERSONAS where identidad="'.$identidad.'";';
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function verificar_qr($qr)
    {
        global $instancia_conexion;
        $sql = 'select count(id_persona) as personas from TBL_PERSONAS where identidad="'.$qr.'";';
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function validar_id($identidad){
      $qr="";
      $instancia_rnp=new Web_Service_RNP($identidad,$qr);
      $validar=$instancia_rnp->Valida_persona();
      
      if ($validar->ErrorMsg->TipoDeError==="RNE" || $validar->ErrorMsg->TipoDeError==="FII" ) {
        // code...
        return 1;
      }
      else {
        $edad=substr($validar->FechaDeNacimiento,0,4);
        
        $edad=2022-intval($edad);
        
        if ($edad<18) {

            return 2;
            # code...
        }else{
            return 0;
        }
        // code...
      
      }
    }
    function validar_qr($qr){
        $identidad="";
        $instancia_rnp=new Web_Service_RNP($identidad,$qr);
        $validar=$instancia_rnp->Valida_persona_qr();
        if ($validar->ErrorMsg->TipoDeError==="RNE" || $validar->ErrorMsg->TipoDeError==="FII") {
          // code...
          return 1;
        }
        else {
          // code...
          return $validar->NumInscripcion;
        }
      }
    function traer_id_encuesta($id_persona)
    {
        global $instancia_conexion;
        $sql = 'select id_encuesta from TBL_ENCUESTAS where id_persona='.$id_persona.';';
        return $instancia_conexion->ejecutarConsulta($sql);

    }
    function traer_id_encuesta_menor($id_persona)
    {
        global $instancia_conexion;
        $sql = 'select id_encuesta_menor from TBL_ENCUESTAS_MENORES_EDAD where id_persona='.$id_persona.';';
        return $instancia_conexion->ejecutarConsulta($sql);

    }





}
