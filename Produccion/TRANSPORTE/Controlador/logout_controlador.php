<?php

session_start();
require_once "../Modelos/login_modelo.php"; //refencia del modelo
$id_usuario=isset($_GET["id"]) ? limpiarCadena1($_GET["id"]) : $_SESSION['Id_usuario'];
$instacia_modelo=new login();
if ($id_usuario!="") {
    # code...
    $instacia_modelo->desactivar_sesion($id_usuario);
}


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
            
        header("location: ../index.php");
   
            
        }
        # code...
   

?>