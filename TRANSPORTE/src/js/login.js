function llenar_puntos_control() {

	cadena = "&activar='activar'"

	$.ajax({
		url: "Controlador/login_controlador.php?op=select_puntos_control",
		type: "POST",
		data: cadena,
		success: function (r) {



			$("#id_punto_control").html(r).fadeIn();
		}


	});

}

llenar_puntos_control();

$(document).ready(function () {
    $("#entrar")
    $("#entrar").on("click",function () {
		event.preventDefault();
        
        datos=$("#login-form").serialize();
        $.ajax({
			url: 'Controlador/login_controlador.php?op=login',
			type: 'POST',
			data: datos,
			success: function (data) {
				console.log(data);
				if (data == 1) {
					Swal.fire({
						position: "top-center",
						imageUrl: "src/img/firma.jpg",
						imageWidth: 100,
						imageHeight: 100,
						imageAlt: "Custom image",
						icon: "success",
						title:
						  "¡BIENVENIDO!",
						footer: "<a class='btn btn-primary' href='Vistas/formulario.php'>Ok</a>",
						showConfirmButton: false,
						
						timer: 2000,
					  }).then(()=>{
						window.location="Vistas/formulario.php";
						
					});
					
                   

				}else if (data==2) {
					Swal.fire({
						position: "",
						imageUrl: "src/img/firma.jpg",
						imageWidth: 100,
						imageHeight: 100,
						imageAlt: "Custom image",
						icon: "error",
						title: "Completa todos los campos",
						showConfirmButton: true,
						timer: false,
					  });
					
				}
				 else {
					Swal.fire({
						position: "",
						imageUrl: "src/img/firma.jpg",
						imageWidth: 100,
						imageHeight: 100,
						imageAlt: "Custom image",
						icon: "error",
						title: "El usuario o contraseña son incorrectos, vuelve a intentar",
						showConfirmButton: true,
						timer: false,
					  });
					}
			}
		})
	});
        
    })
    
