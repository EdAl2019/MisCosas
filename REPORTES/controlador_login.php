<?php
session_start();
require("modelo_login.php");
$instancia_modelo=new login();
$usuario = isset($_POST["usuario"]) ? limpiarCadena1($_POST["usuario"]) : "";
$contraseña = isset($_POST["contra"]) ? limpiarCadena1($_POST["contra"]) : "";
$op = isset($_GET["op"]) ? limpiarCadena1($_GET["op"]) : "";

switch ($op) {
    case 'entrar':
        if ($instancia_modelo->login_user($usuario, $contraseña)) {
            $_SESSION['Usuario'] = $usuario;
            $datos=$instancia_modelo->traerdatos($usuario,$contraseña)->fetch_object();
           if ($datos->id_rol==3) {
            # code...
            echo 1;
           }else{
            $_SESSION['grupo']=$datos->grupo;
            echo 2;
           }
           
        }else{
            echo 0;
        }
        break;
    case 'cerrar':
      unset($_SESSION['Usuario']);
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
            
        echo 1;
   
            
        }

        # code...
        break;
    
    default:
        # code...
        echo 0;
        break;
}



?>