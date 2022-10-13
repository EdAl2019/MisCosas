function crear_grafico(canva, tipo, titulos, datos, label) {
   
    var colort = [];
    var colord = [];
    for (let i = 0; i < titulos.length; i++) {
        colort.push(colorRGB())


    }
    if (window.grafica) {
       window.grafica.clear();
        window.grafica.destroy();
    }
    let ctx = document.getElementById(canva).getContext('2d');
   
    window.grafica = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulos,
            datasets: [{
                label: label,
                data: datos,
                backgroundColor: colort,
                borderColor: colort,
                borderWidth: 4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
}
function generarNumero(numero) {
    return (Math.random() * numero).toFixed(0);
}

function colorRGB() {
    var coolor = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
    return "rgb" + coolor;
}


function ocultar_graficos() {
   
    $("canvas").hide();
    $("canvas").empty();

    $("a[class='nav-link active']").attr("class", "nav-link")

}
function mostrar_grafico(id) {
    $("#myChart" + id).show();

}

function listar_respuesta() {
    //console.log('ejecutandose');
    id_preg=$('table').attr("id_preg");
    //console.log('ejecutandose');
    $('table').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar Usuarios:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "buttons": [
                {
                    extends: "excelHtml5",
                    text: "<i class='fas fa-file-excel'></i>",
                    tittleAttr: "Exportar a Excel",
                    classname: "btn btn-success"
                }, {
                    extends: "excelHtml5",
                    text: "<i class='fas fa-file-excel'></i>",
                    tittleAttr: "Exportar a Excel",
                    classname: "btn btn-success"
                }, {
                    extends: "excelHtml5",
                    text: "<i class='fas fa-file-excel'></i>",
                    tittleAttr: "Exportar a Excel",
                    classname: "btn btn-success"
                },
            ],

        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "dom": "Bfrtip",



        "ajax": {
            url: '../controlador.php',
            type: "post",
            data: { op: "listar_respuesta", id_pregunta:id_preg },
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        }
    });

}
function imprimirElemento(elemento){
    var ventana = window.open('', 'PRINT', 'height=400,width=600');
    ventana.document.write('<html><head><title>' + document.title + '</title>');
    ventana.document.write('</head><body >');
    ventana.document.write(elemento.innerHTML);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.print();
    ventana.close();
    return true;
  }
$(document).ready(function () {
    listar_respuesta();
    ocultar_graficos();
    $("#imprimir").on('click',function () {
        var div=document.getElementById("contenedor");
       imprimirElemento(div); 
    });
    $(".btn-primary").on("click", function () {
        if ($(this).attr("tipo")) {
            var tipo = $(this).attr("tipo")
            $("a[class='nav-link active']").attr("class", "nav-link")
            $(this).attr("class", "nav-link active")
            var eleccion = "";
            var id=$(this).attr("id");
            if ($(this).attr("id")=="1") {
                eleccion="datos1";
            }else if ($(this).attr("id")=="2") {
                eleccion="datos2";
            }
            else if ($(this).attr("id")=="3") {
                eleccion="datos3";
            }
            else if ($(this).attr("id")=="4") {
                eleccion="datos4";
            }
            else if ($(this).attr("id")=="5") {
                eleccion="datos5";
            }
            else if ($(this).attr("id")=="6") {
                eleccion="datos6";   
            }
            $.post("../controlador.php", { op: eleccion },
                function (data, status) {
                    arreglotitulos = [];
                    arreglodatos = [];

                    datos = JSON.parse(data)
                    var titulo=datos[0].pregunta;
                    console.log(titulo)
                    for (let i = 0; i < datos.length; i++) {
                       
                        arreglotitulos.push(datos[i].respuesta)
                        arreglodatos.push(datos[i].c)


                    }
                    console.log(arreglotitulos);
                   
                    
                    crear_grafico('myChart' + tipo +id, tipo, arreglotitulos, arreglodatos,titulo);

                }

            );
            mostrar_grafico(tipo+id)


        }
        else {
            ocultar_graficos();
        }


    })



});


