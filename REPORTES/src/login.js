$(document).ready(function () {
   $("#entrar").on("click", function () {
    var datos=$("#flogin").serialize();
    console.log(datos)
    $.ajax({
        type: "POST",
        url: "controladores/controlador_login.php?op=entrar",
        data: datos,
        success: function (response) {
           if (response==1) {
            console.log(response);
            window.location='vistas/reportes.php';
           }else{
            
            alert("Usuario o contraseña incorrectos"+ response)

           }
        }
    });
    
   });
})