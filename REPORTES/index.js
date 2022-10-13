
function listar_general() {
    datos = "$op=general";
    //console.log('ejecutandose');
    $('#reporte_general').DataTable({
        autoWidth: false,
        columnDefs: [
            {
                width: "300px",
                targets: 7
            },
            {
                width: "500px",
                targets: 8
            },
            {
                width: "500px",
                targets: 9
            },
            {
                width: "500px",
                targets: 10
            },
            {
                width: "500px",
                targets: 11
            },
            {
                width: "500px",
                targets: 12
            }
        ],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar Encuestas:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
           

        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "dom": "Bfrtip",
        buttons: [
            'copy',
            'csv',
            {
                extend:'excel'
            },
            'pdf',
            {
                extend: 'pdf',
                text: 'Print all (not just selected)',
                orientation: 'landscape',
                exportOptions: {
                    modifier: {
                        selected: null
                    },
                    orientation: 'landscape',
                     pageSize: 'A0',
                     pageMargin:[10,10,10,10],
                     fontSize: 10
                }
            },
        ],
        select: true,
       


        responsive: true,

        scrollX: true,


        "ajax": {
            url: 'controlador.php?op=general',
            type: "post",
            data: { op: "general" },
            dataType: "json",
            error: function (e) {
               
                console.log(e.responseText);
                
            }
        }
    });
}

function listar_encuestadores() {
    //console.log('ejecutandose');
    datos = "$op=general";
    //console.log('ejecutandose');
    $('#reporte_encuestadores').DataTable({
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
          

        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "dom": "Bfrtip",

      



        "ajax": {
            url: 'controlador.php?op=encuestadores',
            type: "post",
            data: { op: "encuestadores" },
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
    listar_general();
    listar_encuestadores();
    $("#imprimir").on('click',function () {
        var div=document.getElementById("contenedor");
       imprimirElemento(div); 
    });
    



});


