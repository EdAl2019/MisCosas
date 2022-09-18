

function Parametros() {
  $.post(
    "../Controlador/encuesta_controlador.php?op=parametros",
    {
      user: 0,
    },
    function (data, status) {
      data = JSON.parse(data);

      

      $("#usuario").html("Encuestador: " + data.Nombres + " " + data.Apellidos);
    }
  );
}

function llenar_rutas() {

	cadena = "&activar='activar'"

	$.ajax({
		url: "../Controlador/encuesta_controlador.php?op=select_ruta",
		type: "POST",
		data: cadena,
		success: function (r) {


      
			$("#5").html(r).fadeIn();
		}


	});

}

$("#formulario").hide();
$(".3-mas").prop("disabled", true);
//ready
$(document).ready(function () {
  

  var input_edad = document.getElementById("EDAD");
  input_edad.addEventListener("input", function () {
    if (this.value.length > 2 ) this.value = this.value.slice(0, 2);
  });

  var input_telefono = document.getElementById("TELEFONO");
  input_telefono.addEventListener("input", function () {
    if (this.value.length > 8) this.value = this.value.slice(0, 8);
  });
  document.getElementById("formulario-encuesta").reset();
  Parametros();
  $("#check_scan").hide();

  $("#comenzar").on("click", function () {
    llenar_rutas();
    $("#formulario").show();
    $("#contenedor_comenzar").hide();
    $.post(
      "../Controlador/encuesta_controlador.php?op=inicio",
      { valor: "" },
      function (data, status) {
          
            $("#FECHAINICIO").val(data);
        
      }
    );
  }); //fin comenzar

  //habilita input si es más de 4
  $(".transporte-mas").on("click", function () {
    if ($(".3-mas").val() == "") {
      $(".3-mas").val("");
      $(".3-mas").removeAttr("disabled");
    } else;
    {
      $(".3-mas").removeAttr("disabled");
    }
  });

  $(".radio3").on("click", function () {
    $(".3-mas").val("");
    $(".3-mas").prop("disabled", true);
  });
  $(".radio4").on("click", function () {
    $(".4-mas").val("");
    $(".4-mas").prop("disabled", true);
  });

  $("#guardar").on("click", function () {
    datos = $("#formulario-encuesta").serialize();
    console.log(datos);
    //valudaciones
    var mensaje_error = [];
    var edad = $("#EDAD").val();
    var nombres = $("#NOMBRES").val();
    var direccion = $("#DIRECCION").val();
    var apellidos = $("#APELLIDOS").val();
    var telefono = $("#TELEFONO").val();
    
    var estudia = $("input[id=ESTUDIA]:checked", "#formulario-encuesta").val();
    var pregunta3 = $("input[id=3]:checked", "#formulario-encuesta").val();
    console.log(pregunta3);
    
    var pregunta4 = $("input[id=4]:checked").val();
    console.log(pregunta4);
    
    var pregunta5 = $("#5").children().prop('selected');

    if (
      direccion===""||
      apellidos===""||
      nombres===""||
      edad ===""||
      edad>=18||
      estudia === undefined ||
      estudia === "" ||
      telefono === "" ||
      pregunta3 === undefined ||
      pregunta3 === "" ||
      pregunta4 === undefined ||
      pregunta4 === "" ||
      pregunta5 === true ||
      pregunta5 === "true"
    ) {
      if (nombres === "" || nombres === null) {
        mensaje_error.push("Completa el campo: NOMBRES<br><br>");
      }
      if (apellidos === "" || apellidos === null) {
        mensaje_error.push("Completa el campo: APELLIDOS<br><br>");
      }
      if (edad === "" || edad === null) {
        mensaje_error.push("Completa el campo: EDAD<br><br>");
      }
      if (direccion === "" || direccion === null) {
        mensaje_error.push("Completa el campo: INGRESE DIRECCIÓN<br><br>");
      }
      if (edad>18) {
        mensaje_error.push("El campo: EDAD, no puede ser mayor o igual a 18<br><br>");
        
      }
      
      if (telefono === "" || telefono === null) {
        mensaje_error.push("Completa el campo: TELÉFONO<br><br>");
      }
      if (pregunta3 === undefined || pregunta3 === "") {
        mensaje_error.push(
          "Completa el campo: ¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA LLEGAR A SU DESTINO?<br><br>"
        );
      }
     
      if (pregunta4 === undefined || pregunta4 === "") {
        mensaje_error.push(
          "Completa el campo: ¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA FRECUENTEMENTE ? <br><br>"
        );
      }
      if (pregunta5 === true || pregunta5 === "true") {
        mensaje_error.push(
          "Completa el campo: ¿QUÉ RUTA ESPERA UTILZAR?  <br><br>"
        );
      }
      console.log(datos);

      Swal.fire({
        position: "",
        imageUrl: "../src/img/firma.jpg",
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: "Custom image",
        icon: "error",
        title: "<h6 style='color:red;'>" + mensaje_error + "</h6>",
        showConfirmButton: true,
        timer: false,
      });
    } else {
      
      $.ajax({
        url: "../Controlador/encuesta_controlador.php?op=registrar_menor",
        type: "POST",
        data: datos,
        success: function (data) {
          console.log(data);
          if (data == 1) {
            Swal.fire({
              position: "top-center",
              imageUrl: "../src/img/firma.jpg",
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: "Custom image",
              icon: "success",
              title:
                "Datos guardados correctamente.<br> ¡Gracias por participar!",
              showConfirmButton: false,
              footer: "<a class='btn btn-primary' href='formulario.php'>Ok</a>",
              timer: false,
            });
          } else {
            console.log(data);
          }
        },
      }); //fin del ajax
    }
  }); //btn guardar.
 
}); //fin de document ready
