<?php
require_once('../config/conexion.php');
$instancia_conexion = new conexion();


class login
{ // Clase para gestionar las consultas del Login
    
   
    
    function login_user($user,$contra){
        global $instancia_conexion;
       // $resultado=false;
        $sql='select * from TBL_USUARIOS where usuario="'.$user.'" and contrasena="'.$contra.'" and id_rol=3';

        if ($instancia_conexion->validar_select($sql)) {
        
            return true;
        }
       else{
           return false;
       }
    }
    function traerdatos($user,$contra){

        global $instancia_conexion;

        $sql='select * from TBL_USUARIOS u where u.USUARIO="'.$user.'" and  u.CONTRASENA="'.$contra.'";';
        return $instancia_conexion->ejecutarConsulta($sql);
    }

   

    
   

    
   }



?>