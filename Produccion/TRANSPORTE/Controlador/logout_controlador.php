<?php

session_start();
require_once "../Modelos/login_modelo.php"; //refencia del modelo

$instacia_modelo=new login();
$instacia_modelo->desactivar_sesion($_SESSION['Id_usuario']);
        unset($_SESSION['usuario']);
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
            session_destroy();
            
         header("location: https://190.130.9.62/TRANSPORTE/index.php");
   
            
        }
        # code...
   

?>