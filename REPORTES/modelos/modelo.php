<?php
require_once('../config/conexion.php');

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
    function pregunta7()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select  respuesta, count(respuesta) c, p.pregunta from  tbl_preguntas p,tbl_respuestas r where r.id_pregunta=7 and p.id_pregunta=r.id_pregunta group by r.respuesta ;');

        return $consulta;
    }
    function e_equipos($fecha)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select u.grupo, count(e.id_usuario) as cantidad  from tbl_usuarios u, tbl_encuestas e where e.id_usuario=u.id_usuario and u.grupo>0 and e.fecha_inicial LIKE "%'.$fecha.'%" group by u.grupo order by u.grupo');

        return $consulta;
    }
    function sexo($fecha)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select (select count(p1.sexo) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.sexo="F" and e1.fecha_inicial like "%'.$fecha.'%") as Femenino,(select count(p2.sexo) from tbl_personas p2,tbl_encuestas e2 where p2.id_persona=e2.id_persona and p2.sexo="M" and e2.fecha_inicial like "%'.$fecha.'%") as Masculino ;');

        return $consulta;
    }
    function edades($fecha)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.edad<19 and p1.edad>=0 and e1.fecha_inicial like "%'.$fecha.'%") as r1, (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.edad<26 and p1.edad>=19 and e1.fecha_inicial like "%'.$fecha.'%") as r2,(select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.edad<36 and p1.edad>=26 and e1.fecha_inicial like "%'.$fecha.'%") as r3, (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.edad<50 and p1.edad>=36 and e1.fecha_inicial like "%'.$fecha.'%") as r4,(select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.edad<66 and p1.edad>=50 and e1.fecha_inicial like "%'.$fecha.'%") as r5, (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and  p1.edad>=66 and e1.fecha_inicial like "%'.$fecha.'%") as r6        ;');

        return $consulta;
    }
    function estado_civil($fecha)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.estado_civil=1 and e1.fecha_inicial like "%'.$fecha.'%")as SOLTERO,  (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.estado_civil=2 and e1.fecha_inicial like "%'.$fecha.'%")as CASADO, (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.estado_civil=3 and e1.fecha_inicial like "%'.$fecha.'%")as DIVORCIADO, (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.estado_civil=4 and e1.fecha_inicial like "%'.$fecha.'%")as UNION_LIBRE, (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.estado_civil=5 and e1.fecha_inicial like "%'.$fecha.'%")as VIUDO,  (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.estado_civil=6 and e1.fecha_inicial like "%'.$fecha.'%")as OTRO,  (select count(p1.edad) from tbl_personas p1,tbl_encuestas e1 where p1.id_persona=e1.id_persona and p1.estado_civil=0 and e1.fecha_inicial like "%'.$fecha.'%")as IGNORA;');

        return $consulta;
    }
    function punto_control($fecha)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select c.punto_control, count(e.id_encuesta) as cantidad from tbl_encuestas e, tbl_puntos_de_control c where e.id_punto_control=c.id_punto_control and e.fecha_inicial like "%'.$fecha.'%"  group by e.id_punto_control;');

        return $consulta;
    }
    function productividad()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select u.id_usuario,u.usuario,u.grupo,DAYNAME(e.fecha_inicial) as dia, date(e.fecha_inicial) as fecha, HOUR(e.fecha_inicial) as hora,p.id_punto_control,p.punto_control,count(e.id_encuesta) as cantidad from tbl_usuarios u, tbl_encuestas e, tbl_puntos_de_control p where p.id_punto_control=e.id_punto_control and e.id_usuario=u.id_usuario and date(e.fecha_inicial) like "%2022%" group by u.usuario,DATE(e.fecha_inicial),HOUR(e.fecha_inicial),p.id_punto_control order by u.usuario');

        return $consulta;
    }
    function productividad_g()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select u.grupo,count(e.id_encuesta) as total, hour(e.fecha_inicial) as hora from tbl_encuestas e, tbl_usuarios u where e.id_usuario=u.id_usuario  group by u.grupo, hour(e.fecha_inicial)order by hora');

        return $consulta;
    }
    function productividad_grupo()
    {
        global $instancia_conexion;
        // $consulta = $instancia_conexion->ejecutarConsulta('select count(e.id_encuesta) as total, HOUR(e.fecha_inicial) as hora, u.grupo from tbl_usuarios u, tbl_encuestas e where e.id_usuario=u.id_usuario group by u.grupo, HOUR(e.fecha_inicial) order by u.grupo, HOUR(e.fecha_inicial)');
        $consulta = $instancia_conexion->ejecutarConsulta('select count(e.id_encuesta) as cantidad,date(e.fecha_inicial) as fecha,hour(e.fecha_inicial)as hora,u.grupo from tbl_encuestas e, tbl_usuarios u where e.id_usuario=u.id_usuario group by u.grupo,date (e.fecha_inicial), hour(e.fecha_inicial) order by u.grupo,hour(e.fecha_inicial)');

        return $consulta;
    }
    function encuestas_punto_control()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select count(e.id_encuesta) as cantidad, p.punto_control, p.ubicacion_gps from tbl_encuestas e, tbl_puntos_de_control p where e.id_punto_control=p.id_punto_control group by p.punto_control order by p.punto_control');

        return $consulta;
    }
    function puntos_control_hora(){

        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select z.zona,p.id_punto_control, p.punto_control,count( e.id_persona) as cantidad , HOUR(e.fecha_inicial) as hora, e.jornada from tbl_encuestas e, tbl_puntos_de_control p,tbl_zonas_puntos_control z where z.id_zona=p.id_zona and e.id_punto_control=p.id_punto_control group by p.punto_control, HOUR(e.fecha_inicial) order by p.punto_control,hora');

        return $consulta;

    }
    function listar_general($fecha)
    {

        global $instancia_conexion;
        $sql = "select u.usuario, e.id_encuesta, e.fecha_inicial, e.fecha_final, e.direccion_ip, e.id_punto_control,punt.punto_control,p.id_persona, p.nombres, p.apellidos, p.identidad ,p.telefono,p.estado_civil,p.edad,p.sexo,(select  r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=1 and r.id_encuesta=e.id_encuesta limit 1)as pregunta1,(select  r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=2 and r.id_encuesta=e.id_encuesta limit 1)as pregunta2,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=3 and r.id_encuesta=e.id_encuesta limit 1)as pregunta3,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=4 and r.id_encuesta=e.id_encuesta limit 1)as pregunta4,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=5 and r.id_encuesta=e.id_encuesta limit 1)as pregunta5 ,(select r.respuesta from tbl_respuestas r, tbl_preguntas preg where preg.id_pregunta=r.id_pregunta and r.id_pregunta=6 and r.id_encuesta=e.id_encuesta limit 1)as pregunta6 from tbl_usuarios u, tbl_personas p, tbl_encuestas e, tbl_puntos_de_control punt where p.id_persona=e.id_persona and e.id_usuario=u.id_usuario and e.id_punto_control=punt.id_punto_control and e.fecha_inicial LIKE '%$fecha%'";
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function listar_encuestadores($fecha,$g,$jornada)
    {   
        if ($g=="") {
            # code...
            $g="";
        }else {
            $g="and u.grupo=".$g;
        }
        if ($jornada=="") {
            # code...
            $jornada="";
        }else {
            $jornada="and e.jornada='".$jornada."'";
        }

        global $instancia_conexion;
        $sql = "select u.grupo , p.nombres, p.apellidos,p.telefono,u.usuario, (select count(e.id_encuesta)from tbl_encuestas e where e.id_usuario=u.id_usuario and e.fecha_inicial like '%$fecha%' $jornada) as cantidad_encuestas from tbl_usuarios u, tbl_personas p where u.id_persona=p.id_persona and u.grupo>0 $g;";
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
