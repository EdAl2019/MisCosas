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
function eliminarCookies() {
	document.cookie.split(";").forEach(function(c) {
	  document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
	});
  }
  eliminarCookies();

llenar_puntos_control();

$(document).ready(function () {
	
    $("#usuario").on("keydown",function () {
		var tecla = event.key;

		if ([' ','-','@','/',"%",'=','#',"$",'^','&','(',')',']','['].includes(tecla))
  			 event.preventDefault()
		
	})
    $("#entrar").on("click",function () {
		event.preventDefault();
        
        var datos=$("#login-form").serialize();
		var usuario= $("#usuario").val();
		var contra=$("#contraseña").val();
		var punto_control=$("#id_punto_control").children().prop('selected');
		var mensaje_error = [];

		if (
			usuario === "" ||
			contra === "" ||
			punto_control === true ||
			punto_control ==="true" 
			
		  ) {
			if (usuario === "" || usuario === null) {
			  mensaje_error.push("Completa el campo: USUARIO<br><br>");
			  
			}
			if (contra === "" || contra === null) {
			  mensaje_error.push("Completa el campo: CONTRASEÑA<br><br>");
			}
			
			if (punto_control === true || punto_control === "true") {
			  mensaje_error.push(
				"Selecciona el campo: RUTA<br><br>"
			  );
			}
			
	  
			Swal.fire({
			  position: "",
			  imageUrl: "src/img/firma.jpg",
			  imageWidth: 100,
			  imageHeight: 100,
			  imageAlt: "Custom image",
			  icon: "error",
			  title: "<h6 style='color:red;'>" + mensaje_error + "</h6>",
			  showConfirmButton: true,
			  timer: false,
			});
		  }
		  else{
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
						
					}else if (data==3) {
						
						Swal.fire({
							position: "",
							imageUrl: "src/img/firma.jpg",
							imageWidth: 100,
							imageHeight: 100,
							imageAlt: "Custom image",
							icon: "error",
							title: "Este usuario ya tiene una sesión activa",
							showConfirmButton: true,
							timer: false,
						  });
						
					}
					 else {
						console.log(data)
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
		  }
        
	});
        
    })
    
