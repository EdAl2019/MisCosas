<?php
require_once('../Config/conexion.php');
$instancia_conexion = new conexion();


class login
{ // Clase para gestionar las consultas del Login
    
    function estado_session($id)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta("update TBL_USUARIOS set estado_session=0 where id_usuario=$id;");

        return $consulta;
    }
    function desactivar_sesion($id)
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta("update TBL_USUARIOS set estado_session=0 where id_usuario=$id;");

        return $consulta;
    }
    
    function listar_puntos_de_control()
    {
        global $instancia_conexion;
        $consulta = $instancia_conexion->ejecutarConsulta('select id_punto_control,punto_control,id_zona from TBL_PUNTOS_DE_CONTROL order by id_zona, punto_control;');

        return $consulta;
    }
    function login_user($user,$contra){
        global $instancia_conexion;
       // $resultado=false;
        $sql='select * from TBL_USUARIOS where usuario="'.$user.'" and contrasena="'.$contra.'"';

        if ($instancia_conexion->validar_select($sql)) {
        
            return true;
        }
       else{
           return false;
       }
    }
    function traerdatos($user,$contra){

        global $instancia_conexion;

        $sql='select * from TBL_USUARIOS u, TBL_PERSONAS e where u.id_persona=e.id_persona and u.USUARIO="'.$user.'" and u.contrasena="'.$contra.'";';
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function id_zona($id_punto_c){
        global $instancia_conexion;

        $sql='select id_zona from TBL_PUNTOS_DE_CONTROL where id_punto_control ='.$id_punto_c.';';
        return $instancia_conexion->ejecutarConsulta($sql);

    }

   

    
   

    
    //Trae el maximo id del modulo
   }



?>