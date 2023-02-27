 <table id="reporte_general" class="display table-striped table-bordered table-condensed" style="width:200%">
                    <thead>
                      <tr>
                        <th>ID ENCUESTA</th>
                        <th>INICIO </th>
                        <th>FINAL</th>
                        <th>IP</th>
                        <th>ID PUNTO CONTROL</th>
                        <th>PUNTO DE CONTROL</th>
                        <th>NOMBRE </th>
                        <th>APELLIDO</th>
                        <th>IDENTIDAD</th>
                        <th>SEXO</th>
                        <th>EDAD</th>
                        <th>ESTADO CIVIL</th>
                        <th>TELÉFONO</th>
                        <th>¿A DÓNDE SE DIRIGE?</th>
                        <th>¿CON QUÉ FRECUENCIA UTILIZA TRANSPORTE URBANO?</th>
                        <th>¿CUÁNTAS UNIDADES DE TRANSPORTE UTILIZA PARA LLEGAR A SU DESTINO?</th>
                        <th>¿CUÁNTAS PERSONAS UTILIZAN TRANSPORTE EN SU HOGAR?</th>
                        <th>¿QUÉ OTROS SERVICIOS DE TRANSPORTE UTILIZA FRECUENTEMENTE?</th>
                        <th>¿QUÉ RUTA ESPERA UTILZAR? </th>
                        <th>USUARIO <br> ENCUESTADOR</th>


                      </tr>
                    </thead>
                  

                  </table>
<script>

function listar_general() {
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
          
            'colvis',
        ],
        select: true,
       

        scrollCollapse: true,
        responsive: true,
        "lengthChange": false, "autoWidth": true, scrollY: '200px',
        scrollX: true,


        "ajax": {
            url: '../controladores/controlador.php?op=general',
            type: "post",
            data: { op: "general",fecha_g:$("#fecha_general").val() },
            dataType: "json",
            complete: function (e) {
               
               // console.log(e.responseText);
                
            }
        }
    });
}
listar_general();
</script>