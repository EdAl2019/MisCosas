<table id="reporte_general_gps_usuarios" class="display table-striped table-bordered table-condensed" style="width:200;">
                    <thead>
                      <tr>
                        <th>USUARIO</th>
                        <th>UBICACIÓN ACTUAL</th>

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
    $('#reporte_general_gps_usuarios').DataTable({
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
        "dom": "frtip",
        
        
       


        responsive: true,

        scrollX: true,


        "ajax": {
            url: '../controladores/controlador.php?',
            type: "post",
            data: { op: "listar_usuarios_gps"},
            dataType: "json",
            complete: function (e) {
              
                
                
            }
        }
    });
}
listar_productividad();
</script>