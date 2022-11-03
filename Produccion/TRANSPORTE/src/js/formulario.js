var today = new Date();// Define la hora y fecha inicial de la encuesta

//Esta funcion es para activar la camara QR
function onScanSuccess(qrCodeMessage) {
  //Se ocultan campos en caso de escanear con exito
  $("#QR").val(qrCodeMessage).triggerHandler('change');//Agrego un evento change despues de escanear
  $("#reader").hide();
  $("#Detener").click();
  $("contenedor_scaner").hide();
  $("#check_scan").show();
  //Aqui escondo identidad
  $("#IDENTIDAD").prop("disabled", "true");
  $("IDENTIDAD").val("");
}

//trae parametros del usuario, como su nombre y estado de sesión
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

function onScanError(errorMessage) {
  //Un caso que falle al activar la camara QR
}

//inicia el objeto de camara scanner
var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
  fps: 10,
  qrbox: 250,
});
html5QrcodeScanner.render(onScanSuccess, onScanError);//le pasamos las funciones de exito y fracaso

//Guardar rutas en una variable
var rutas = [];// array que guardara las rutas.

//Asignan las rutas al array rutas
function asignar_rutas() {
  cadena = "&activar='activar'";
  $.ajax({
    url: "../Controlador/encuesta_controlador.php?op=select_ruta",
    type: "POST",
    data: cadena,
    success: function (r) {
      rutas = r;


    },
  });

}// fin

//Usamos la variable rutas para asignarlas a los selects
function llenar_rutas() {
  cadena = "&activar='activar'";
  $(".rutas").html(rutas).fadeIn();
  $('.rutas').on('change', function () {



    var validaop = $('select [value="' + $(this).val() + '"]:selected').each(function (index, Element) { }).length;//calcula cuantos objetos selects hay y compara rutas repetidas

    if (validaop > 1) {// si encuetra más de un valor repetido arroja error 


      $(this).val('null')
      $(this).attr('elegido', false)
      Swal.fire({
        position: "",
        imageUrl: "../src/img/firma.jpg",
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: "Custom image",
        icon: "error",
        title: "<h6 style='color:red;'>No se puede repetir la ruta</h6>",
        showConfirmButton: true,
        timer: false,
      });

    } else {
      $(this).removeAttr('elegido')
    }


  });



}

//Construye los objetos selects que contienen las rutas
function crear_select_rutas(obj, cantidad) {
  var i = 0;
  var cuerpo = "";

  for (var i = 0; i < cantidad; i++) {
    cuerpo =
      cuerpo +
      '  <label for=""><strong>RUTA ' +
      (i + 1) +
      '  </strong> </label> <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>  <br>  <select name="6[]" id="6" class="form-control rutas" elegido="false">  </select>';
  }
  $(obj).html(cuerpo).fadeIn();
  llenar_rutas();

}

//Validaciones para los inputs en tamaño
function minimo() {
  var tecla = event.key;

  if (tecla < 5);
  event.preventDefault(5);
}
function filtro() {//limpia los inputs numericos para los casos de decimales y exponenciales
  var tecla = event.key;

  if ([".", "e"].includes(tecla)) event.preventDefault();
}
function filtro2() {//Limpia caracteres no requeridos
  var tecla = event.key;

  if (["@", "/", "+", "=", "{", "}", "]"].includes(tecla))
    event.preventDefault();
}
//ocultamos el formulario antes de cargar pagina
$("#formulario").hide();

//Desactivamos inputs de opciones especiales
$(".2-mas").prop("disabled", true);
$(".3-mas").prop("disabled", true);
$(".4-mas").prop("disabled", true);


$(document).ready(function () {//Funcion que se ejecuta al leer el formulario en navegador.


  asignar_rutas();//se hace un unico llamado para asignar las rutas al array rutas

//valida el tamaño maximo de la identidad
  var input_identidad = document.getElementById("IDENTIDAD");
  input_identidad.addEventListener("input", function () {
    if (this.value.length > 13) this.value = this.value.slice(0, 13);
  });
  //valida el tamaño maximo del telefono
  var input_telefono = document.getElementById("TELEFONO");
  input_telefono.addEventListener("input", function () {
    if (this.value.length > 8) this.value = this.value.slice(0, 8);
  });
  //reiniciar el formulario
  document.getElementById("formulario-encuesta").reset();
  Parametros();// llamar funcion parametros para cargar detalles del usuario
  $("#check_scan").hide();//ocultar el scanner

  $("#comenzar").on("click", function () {//habilita y muestra el formulario e inicia el tiempo de la encuesta.
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


  //Comportamiento de checkbox casos especiales
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
    $(".3-mas").val("5");
    $(".3-mas").prop("disabled", true);
    crear_select_rutas("#contenedor_rutas", $(this).val());//crea los selects segun la cantidad que defina el checkbox
  });
  $(".3-mas").on("keyup", function () {
    var v = $(this).val();
    if (v > 15 || v < 5) {
      $(this).val("");
    }
  });
  $(".4-mas").on("keyup", function () {
    var v = $(this).val();
    if (v > 15 || v < 5) {
      $(this).val("");
    }
  });
  $(".3-mas").on("focusout", function () {
    if ($(this).val() < 5 || $(this).val() == "") {
      $(this).val(5)
    }
    crear_select_rutas("#contenedor_rutas", $(this).val());//crea los selects segun input 
  });
  $(".4-mas").on("focusout", function () {
    if ($(this).val() < 5 || $(this).val() == "") {
      $(this).val(5)
    }

  });
  $(".radio4").on("click", function () {
    $(".4-mas").val(5);
    $(".4-mas").prop("disabled", true);
  });
  $(".transporte-mas").on("click", function () {
    $("#contenedor_rutas").html("").fadeIn();
    crear_select_rutas("#contenedor_rutas", $('.3-mas').val());

  });
  $("#DIRECCION").on("keydown", function () {
    var tecla = event.key;

    if (["@", "/", "%", "=", "$", "^", "&", "(", ")", "]", "["].includes(tecla))
      event.preventDefault();
  });
  $("#IDENTIDAD").on("keydown", function () {
    var tecla = event.key;

    if ([".", "e"].includes(tecla)) event.preventDefault();
  });
  $("#TELEFONO").on("focusout",function () {
    if ($(this).val().length!=8 || $(this).val()<30000000 || $(this).val()> 100000000 ) {
      Swal.fire({
        position: "",
        imageUrl: "../src/img/firma.jpg",
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: "Custom image",
        icon: "error",
        title: "<h6 style='color:red;'>NÚMERO DE TELÉFONO INCOMPLETO</h6>",
        showConfirmButton: true,
        timer: false,
      });
      $(this).val('')
    }
    
  })

  $("#guardar").on("click", function () {//boton para enviar encuesta.
    datos = $("#formulario-encuesta").serialize();//se obtiene todos los datos del formulario

    //validaciones de los campos
    var mensaje_error = [];//array que contendra todos los errores de los campos
    //obtener valores de los campos.
    var qr = $("#QR").val();
    var direccion = $("#DIRECCION").val();

    if ($("#IDENTIDAD").prop("disabled")) {
      identidad = "0000000000000";
    } else {
      var identidad = $("#IDENTIDAD").val();
      qr = "vacio";
    }

    var telefono = $("#TELEFONO").val();
    var pregunta2 = $("input[id=2]:checked", "#formulario-encuesta").val();

    var pregunta3 = $("input[id=3]:checked", "#formulario-encuesta").val();

    var pregunta4 = $("input[id=4]:checked", "#formulario-encuesta").val();

    var pregunta5 = $("input[id=5]:checked").val();
    var valida6 = 0

    //validar que no hayan campos vacios o no seleccionados.
    if ($("input[id=2]:disabled").attr('disabled') != 'disabled') {
      if ($('.2-mas').val() == "" || $('.2-mas').val() == " ") {

        pregunta2 = undefined;
      }
    }
    $('.rutas').each(function (index, element) {
      if ($(element).attr('elegido') == 'false') {
        valida6 = valida6 + 1
      }
    })

    var pregunta6 = $(".rutas").children().prop("selected");//extraer datos de rutas.

    if (//valida si hay datos vacios, nulos o no aceptables
      qr === "" ||
      identidad === "" ||
      identidad.length < 13 ||
      telefono === "" ||
      direccion === "" ||
      pregunta2 === undefined ||
      pregunta2 === "" ||
      pregunta3 === undefined ||
      pregunta3 === "" ||
      pregunta4 === undefined ||
      pregunta4 === "" ||
      pregunta5 === undefined ||
      pregunta5 === "" ||
      pregunta6 === true ||
      pregunta6 === "true" ||
      valida6 > 0

    ) {
      //se compara y se llenan los mensajes solamente con los errores que se encuentren en el array mensaje_error
      if (qr === "" || qr === null) {
        mensaje_error.push("Completa el campo: ESCANER QR<br><br>");
      }
      if (identidad === "" || identidad === null || identidad.length < 13) {

        if (identidad.length < 13) {
          mensaje_error.push(
            "Número incompleto o no válido en el campo: IDENTIDAD<br><br>"
          );
        } else {
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
      if (pregunta6 === true || pregunta6 === "true" || valida6 > 0) {
        mensaje_error.push(
          "Completa el campo: ¿QUÉ RUTA ESPERA UTILZAR? <br><br>"
        );
      }


      Swal.fire({// se imprime una alerta con todos los errores encontrados
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
    } else {// Si todo esta bien, se ejecuta guardar encuesta.
      $("#guardar").prop("disabled", true)
      $.ajax({
        url: "../Controlador/encuesta_controlador.php?op=registrar",// ruta del controlador
        type: "POST",
        data: datos,
        async: true,
        success: function (data) {
          //esto es para dar un tiempo
          let timerInterval
          Swal.fire({//alert de procesando.
            title: 'PROCESANDO',
            html: 'Espera.. se esta enviando la encuesta.',
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
              Swal.showLoading()
              const b = Swal.getHtmlContainer().querySelector('b')
              timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
              }, 100)
            },
            willClose: () => {
              clearInterval(timerInterval)
            }
          }).then((result) => {// entonces despues de la alerta.
          // esto ocurre despues del swall
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
          })// fin de dar un tiempo


         
        },
      }); //fin del ajax
    }
  }); //btn guardar.


  // Identidad
  $("#IDENTIDAD").on("focusout", function () {
    var identidad = $(this).val();
    var anio = identidad[4] + identidad[5] + identidad[6] + identidad[7];


    if ($(this).val() != "" || $(this).val() === "undifined") {
      if (identidad.length == 13) {
        if (2022 - parseInt(anio) >= 1) {
          $.post(
            "../Controlador/encuesta_controlador.php?op=identidad",
            { IDENTIDAD: identidad },
            function (data, status) {

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
              } else if (data == 2) {
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

                $("#IDENTIDAD").val("");

                $("#reader").show();
                $("#check_scan").hide();
              } else {
                $("#reader").hide();
                $("#check_scan").show();
              }
            }
          );
        } else {
          Swal.fire({
            position: "",
            imageUrl: "../src/img/firma.jpg",
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: "Custom image",
            icon: "warning",
            title:
              "<h2>El número de identidad pertenece a un menor de edad</h2>",
            showConfirmButton: true,
            timer: false,
          });
          $("#IDENTIDAD").val("");
        }
      } else {
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
    } else {
      $("#reader").show();
      $("#check_scan").hide();
    }
  }); //consulta identidad
  $("#QR").val();
  $("#QR").on("change", function () {
    var qr = $(this).val();

    if ($(this).val() != "" || $(this).val() === "undifined") {
      $.post(
        "../Controlador/encuesta_controlador.php?op=qr",
        { QR: qr },
        function (data, status) {
          console.log(data)
          if (data == 0) {
            $("#QR").val("");
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
            $("#IDENTIDAD").removeAttr("disabled")
          } else if (data == 2) {
            Swal.fire({
              position: "",
              imageUrl: "../src/img/firma.jpg",
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: "Custom image",
              icon: "warning",
              title: "<h2>El qr no es correcto</h2>",
              showConfirmButton: true,
              timer: false,
            });

            $("#IDENTIDAD").val("");

            $("#reader").show();
            $("#check_scan").hide();
          } else {
            $("#reader").hide();
            $("#check_scan").show();
          }
        }
      );
    } else {
      $("#reader").show();
      $("#check_scan").hide();
      $("#IDENTIDAD").prop("disabled", false);
    }
  }); //consulta QR



}); //fin de document ready


























