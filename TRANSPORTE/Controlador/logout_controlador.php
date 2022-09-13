<?php

session_start();


   
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
         //  header("location: https://".$_SERVER['SERVER_ADDR']."/TRANSPORTE/index.php");
         header("location: https://192.168.1.9/TRANSPORTE_V2/TRANSPORTE/index.php");
           
            
        }
        # code...
   

?>