<?php
require_once('config/conexion.php');

$instancia_conexion = new conexion();


class encuesta
{ // Clase para gestionar las consultas de las encuestas
  
   
    function listar_respuesta($id){
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('
        select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta='.$id.' and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function pregunta1()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('
        select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta=1 and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function pregunta2()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta=2 and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function pregunta3()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta=3 and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function pregunta4()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta=4 and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function pregunta5()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta=5 and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function pregunta6()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta=6 and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function e_equipos($fecha)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select u.grupo, count(e.id_usuario) as cantidad  from tbl_usuarios u, tbl_encuestas e where e.id_usuario=u.id_usuario and u.grupo>0 and e.fecha_inicial LIKE "%'.$fecha.'%" group by u.grupo order by u.grupo');

        return $consulta;
    }
    function listar_general($fecha)
    {

        global $instancia_conexion;
        $sql = "select u.usuario, e.id_encuesta, e.fecha_inicial, e.fecha_final, e.direccion_ip, e.id_punto_control,p.id_persona, p.nombres, p.apellidos, p.identidad ,(select  r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=1 and r.id_encuesta=e.id_encuesta limit 1)as pregunta1,(select  r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=2 and r.id_encuesta=e.id_encuesta limit 1)as pregunta2,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=3 and r.id_encuesta=e.id_encuesta limit 1)as pregunta3,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=4 and r.id_encuesta=e.id_encuesta limit 1)as pregunta4,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=5 and r.id_encuesta=e.id_encuesta limit 1)as pregunta5 ,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=6 and r.id_encuesta=e.id_encuesta limit 1)as pregunta6 from tbl_usuarios u, tbl_personas p, tbl_encuestas e where p.id_persona=e.id_persona and e.id_usuario=u.id_usuario and e.fecha_inicial LIKE '%$fecha%'";
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function listar_encuestadores($fecha,$g)
    {   
        if ($g=="") {
            # code...
            $g="";
        }else {
            $g="and u.grupo=".$g;
        }

        global $instancia_conexion;
        $sql = "select u.grupo , p.nombres, p.apellidos,p.telefono,u.usuario, (select count(e.id_encuesta)from tbl_encuestas e where e.id_usuario=u.id_usuario and e.fecha_inicial like '%$fecha%') as cantidad_encuestas from tbl_usuarios u, tbl_personas p where u.id_persona=p.id_persona and u.grupo>0 $g;";
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function listar_rutas($id_zona)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select * from TBL_RUTAS order by ruta;');

        return $consulta;
    }

    function traer_id_persona($identidad=null,$qr=null)
    {
        global $instancia_conexion;
      
            $sql = 'select id_persona from TBL_PERSONAS where qr="'.$qr.'";';
            # code...
       

        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function traer_id_persona_menor($nombre,$apellido,$edad,$telefono){
        global $instancia_conexion;
        $sql = 'select id_persona from TBL_PERSONAS where nombres="'.$nombre.'" and apellidos="'.$apellido.'" and edad='.$edad.' and telefono="'.$telefono.'";';
        return $instancia_conexion->ejecutarConsulta($sql);


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





?>
