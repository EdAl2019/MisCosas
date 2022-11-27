<table id="reporte_general_puntos" class="display table-striped table-bordered table-condensed" style="width:200;">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>ZONA</th>
                        <th>PUNTO DE CONTROL</th>
                        <th>CANTIDAD</th>
                        <th>HORA</th>
                        <th>JORNADA</th>
                        
                      


                      </tr>
                    </thead>
                  

                  </table>
<script>
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
   
    //console.log('ejecutandose');
    $('#reporte_general_puntos').DataTable({
        autoWidth: false,
       
        
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar Punto de control:",
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
            url: '../controladores/controlador.php?',
            type: "post",
            data: { op: "puntos_control_horas"},
            dataType: "json",
            complete: function (e) {
              console.log(e);
                
                
            }
        }
    });
}
listar_productividad();
</script>