<table id="reporte_general" class="display table-striped table-bordered table-condensed" style="width:200%">
                    <thead>
                      <tr>
                        <th>USUARIO</th>
                        <th>GRUPO </th>
                        <th>DIA</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                       <th>PUNTO DE CONTROL</th>
                        <th>CANTIDAD DE ENCUESTAS</th>
                      
                      


                      </tr>
                    </thead>
                  

                  </table>
<script>
$datos_t=[]
function listar_productividad() {
    var today = new Date();

        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };

        options.timeZoneName = 'short';
        var now = today.toLocaleString('es-ES', options);
    datos = "$op=general";
    //console.log('ejecutandose');
    $('#reporte_general').DataTable({
        autoWidth: true,
       
        
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
          {
                extend:'print',
                filename: function () {
                    var today = new Date();
                    
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    options.timeZone = 'UTC';
                    options.timeZoneName = 'short';
                    
                    var now = today.toLocaleString('es-ES', options);
                    return "REPORTE GENERAL - "+now
                },
            
            },
           
         
            {
                extend:'excel',
                filename: function () {
                    
                   
                    return "REPORTE GENERAL - "+now
                }
            },
          
            {
                extend: 'pdf',
                filename: function () {
                    var today = new Date();
                 
                    return "REPORTE GENERAL - "+now
                },
            
                text: 'PDF',
                orientation: 'landscape',
                exportOptions: {
                   
                    
                    orientation: 'landscape',
                     pageSize: 'TABLOID',
                     pageMargin:[0,0,0,0],
                     fontSize: 10
                }
            },
            'colvis',
        ],
        select: true,
       


        responsive: true,

        scrollX: true,


        "ajax": {
            url: 'controlador.php?op=productividad',
            type: "post",
            data: { op: "productividad"},
            dataType: "json",
            complete: function (e) {
                $datos_t=JSON.parse( e.responseText);
                
                
            }
        }
    });
}
listar_productividad();
</script>