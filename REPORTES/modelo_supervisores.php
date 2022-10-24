<?php
require_once('config/conexion.php');

$instancia_conexion = new conexion();


class encuesta
{ // Clase para gestionar las consultas de las encuestas
  
   
   
    function e_equipos($fecha)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select u.grupo, count(e.id_usuario) as cantidad  from tbl_usuarios u, tbl_encuestas e where e.id_usuario=u.id_usuario and u.grupo>0 and e.fecha_inicial LIKE "%'.$fecha.'%" group by u.grupo order by u.grupo');

        return $consulta;
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
  
    
   





}





?>
