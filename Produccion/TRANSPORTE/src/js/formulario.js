var today = new Date();
function onScanSuccess(qrCodeMessage) {
  $("#QR").val(qrCodeMessage);
  $("#reader").hide();
  $("#Detener").click();
  $("contenedor_scaner").hide();
  $("#check_scan").show();
 //Aqui escondo identidad
  $("#IDENTIDAD").prop("disabled","true");
  $("IDENTIDAD").val("");
}

function Parametros() {
  let punto_control = "";
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

function onScanError(errorMessage) {
  //handle scan error
}

var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
  fps: 10,
  qrbox: 250,
});
html5QrcodeScanner.render(onScanSuccess, onScanError);


function llenar_rutas() {

	cadena = "&activar='activar'"

	$.ajax({
		url: "../Controlador/encuesta_controlador.php?op=select_ruta",
		type: "POST",
		data: cadena,
		success: function (r) {


      $(".rutas").html(r).fadeIn();

		}


	});

}
function crear_select_rutas(obj,cantidad){
  var i=0;
  var cuerpo="";
  console.log(cantidad);
  for ( var i = 0; i < cantidad ;i++) {
    cuerpo=cuerpo+'  <label for="exampleInputPassword1"><strong>RUTA '+(i+1)+'  </strong> </label> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>  <br>  <select name="6[]" id="6" class="form-control rutas">  </select>';


  }
    $(obj).html(cuerpo).fadeIn();
    llenar_rutas();


}
function minimo()
{
var tecla = event.key;

if (tecla<5)
  console.log("h");
   event.preventDefault(5)
}
function filtro()
{
var tecla = event.key;

if (['.','e'].includes(tecla))
   event.preventDefault()
}

$("#formulario").hide();
$(".2-mas").prop("disabled", true);
$(".3-mas").prop("disabled", true);
$(".4-mas").prop("disabled", true);
//ready
$(document).ready(function () {
  var input_identidad = document.getElementById("IDENTIDAD");
  input_identidad.addEventListener("input", function () {
    if (this.value.length > 13) this.value = this.value.slice(0, 13);
  });
  var input_telefono = document.getElementById("TELEFONO");
  input_telefono.addEventListener("input", function () {
    if (this.value.length > 8) this.value = this.value.slice(0, 8);
  });
  document.getElementById("formulario-encuesta").reset();
  Parametros();
  $("#check_scan").hide();

  $("#comenzar").on("click", function () {

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

  $(".transporte-hogar").on("click", function () {
    if ($(".4-mas").val() == "") {
      $(".4-mas").val("");
      $(".4-mas").removeAttr("disabled");
    } else {
      $(".4-mas").removeAttr("disabled");
    }
  });
  $(".transporte-mas").on("click", function () {
    if ($(".3-mas").val() == "") {
      $(".3-mas").val("");
      $(".3-mas").removeAttr("disabled");
    } else;
    {
      $(".3-mas").removeAttr("disabled");
    }
  });
  $(".frecuencia-mas").on("click", function () {
    if ($(".2-mas").val() == "") {
      $(".2-mas").val("");
      $(".2-mas").removeAttr("disabled");
    } else;
    {
      $(".2-mas").removeAttr("disabled");
    }
  });
  $(".radio2").on("click", function () {
    $(".2-mas").val("");
    $(".2-mas").prop("disabled", true);
    
  });
  $(".radio3").on("click", function () {
    $(".3-mas").val("");
    $(".3-mas").prop("disabled", true);
    crear_select_rutas("#contenedor_rutas",$(this).val());
  });
  $(".3-mas").on("keyup", function(){
    var v=$(this).val();
    if (v>15 || v<5) {
      $(this).val("");

    }
  })
  $(".4-mas").on("keyup", function(){
    var v=$(this).val();
    if (v>15 || v<5) {
      $(this).val("");

    }
  })
  $(".3-mas").on("focusout", function(){
    crear_select_rutas("#contenedor_rutas",$(this).val());
  })
  $(".radio4").on("click", function () {
    $(".4-mas").val("");
    $(".4-mas").prop("disabled", true);
  });
  $(".transporte-mas").on("click",function(){
      $("#contenedor_rutas").html("").fadeIn();
  })
  $("#DIRECCION").on("keydown",function () {
		var tecla = event.key;

		if (['@','/',"%",'=',"$",'^','&','(',')',']','['].includes(tecla))
          
  			 event.preventDefault()
		
	})
  $("#IDENTIDAD").on("keydown",function () {
		var tecla = event.key;

		if (['.','e'].includes(tecla))
  			 event.preventDefault()
		
	})

  $("#guardar").on("click", function () {
    datos = $("#formulario-encuesta").serialize();
    console.log(datos);
    //validaciones
    var mensaje_error = [];
    var qr = $("#QR").val();
    var direccion= $("#DIRECCION").val();

    if ($("#IDENTIDAD").prop("disabled")) {
      identidad="0000000000000";

    }else{
      var identidad = $("#IDENTIDAD").val();
      qr="vacio";
    }

    var telefono = $("#TELEFONO").val();
    var pregunta2 = $("input[id=2]:checked", "#formulario-encuesta").val();

    var pregunta3 = $("input[id=3]:checked", "#formulario-encuesta").val();

    var pregunta4 = $("input[id=4]:checked", "#formulario-encuesta").val();

    var pregunta5 = $("input[id=5]:checked").val();

    var pregunta6 = $("#6").children().prop('selected');



    if (
      qr === "" ||
      identidad === "" ||
      identidad.length<13 ||
      telefono === "" ||
      direccion=== ""||
      pregunta2 === undefined ||
      pregunta2 === ""||
      pregunta3 === undefined ||
      pregunta3 === "" ||
      pregunta4 === undefined ||
      pregunta4 === "" ||
      pregunta5 === undefined ||
      pregunta5 === "" ||
      pregunta6 === true ||
      pregunta6 === "true"
    ) {
      if (qr === "" || qr === null) {
        mensaje_error.push("Completa el campo: ESCANER QR<br><br>");

      }
      if (identidad === "" || identidad === null || identidad.length<13) {
        console.log("MENOR")
        if (identidad.length<13) {
          mensaje_error.push("Número incompleto o no válido en el campo: IDENTIDAD<br><br>");
        }else{
          mensaje_error.push("Completa el campo: IDENTIDAD<br><br>");
        }

      }
      if (direccion === "" || direccion === null) {
        mensaje_error.push("Completa el campo: INGRESE DIRECCIÓN <br><br>");
      }
      if (telefono === "" || telefono === null) {
        mensaje_error.push("Completa el campo: TELÉFONO<br><br>");
      }
      if (pregunta2 === undefined || pregunta2 === "") {
        mensaje_error.push(
          "Completa el campo: ¿CON QUÉ FRECUENCIA (DÍAS) UTILIZA TRANSPORTE URBANO?<br><br>"
        );
      }
      if (pregunta3 === undefined || pregunta3 === "") {
        mensaje_error.push(
          "Completa el campo: ¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA LLEGAR A SU DESTINO?<br><br>"
        );
      }
      if (pregunta4 === undefined || pregunta4 === "") {
        mensaje_error.push(
          "Completa el campo: ¿CUÁNTAS PERSONAS UTILIZAN TRANSPORTE EN SU HOGAR?<br><br>"
        );
      }
      if (pregunta5 === undefined || pregunta5 === "") {
        mensaje_error.push(
          "Completa el campo: ¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA FRECUENTEMENTE ? <br><br>"
        );
      }
      if (pregunta6 === true || pregunta6 === "true") {
        mensaje_error.push(
          "Completa el campo: ¿QUÉ RUTA ESPERA UTILZAR? <br><br>"
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
        url: "../Controlador/encuesta_controlador.php?op=registrar",
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
  $("#IDENTIDAD").on("focusout", function () {
    var identidad = $(this).val();
    var anio= identidad[4]+identidad[5]+identidad[6]+identidad[7];
    console.log(anio);
   
    if ($(this).val()!=""|| $(this).val()==="undifined") {
      if (identidad.length==13) {
        if ((2022-parseInt(anio))>=18) {
          $.post(
            "../Controlador/encuesta_controlador.php?op=identidad",
            { IDENTIDAD: identidad },
            function (data, status) {
              console.log(data);
              if (data == 0) {
                $("#IDENTIDAD").val("");
                Swal.fire({
                  position: "",
                  imageUrl: "../src/img/firma.jpg",
                  imageWidth: 100,
                  imageHeight: 100,
                  imageAlt: "Custom image",
                  icon: "warning",
                  title: "<h2>Esta persona ya completo el censo</h2>",
                  showConfirmButton: true,
                  timer: false,
                });
                $("#reader").show();
                $("#check_scan").hide();
              } else if (data==2) {
    
                Swal.fire({
                  position: "",
                  imageUrl: "../src/img/firma.jpg",
                  imageWidth: 100,
                  imageHeight: 100,
                  imageAlt: "Custom image",
                  icon: "warning",
                  title: "<h2>El número de identidad no es correcto</h2>",
                  showConfirmButton: true,
                  timer: false,
                });
                $("#reader").show();
                $("#check_scan").hide();
    
              }
    
              else{
                $("#reader").hide();
                $("#check_scan").show();
              }
            }
    
          );
        
        
        }else{
          Swal.fire({
            position: "",
            imageUrl: "../src/img/firma.jpg",
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: "Custom image",
            icon: "warning",
            title: "<h2>El número de identidad pertenece a un menor de edad</h2>",
            showConfirmButton: true,
            timer: false,
          });
          $("#IDENTIDAD").val("")
  
        }
        
      }else{
        Swal.fire({
          position: "",
          imageUrl: "../src/img/firma.jpg",
          imageWidth: 100,
          imageHeight: 100,
          imageAlt: "Custom image",
          icon: "warning",
          title: "<h2>El número de identidad esta incompleto</h2>",
          showConfirmButton: true,
          timer: false,
        });
      }
      
      
    }else{
      $("#reader").show();
      $("#check_scan").hide();

    }

  }); //consulta identidad
}); //fin de document ready
