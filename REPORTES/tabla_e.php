<table  id="reporte_encuestadores" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>GRUPO</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS </th>
                        <th>TÉLEFONO</th>
                        <th>USUARIO</th>
                        <th>CANTIDAD DE ENCUESTAS</th>

                      </tr>
                    </thead>

                  </table>

<script>

function listar_encuestadores() {
    //console.log('ejecutandose');
   
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
        

      
        select: true,
       

       

        "ajax": {
            url: 'controlador.php?op=encuestadores',
            type: "post",
            data: { op: "encuestadores",fecha_e:$("#fecha_encuestadores").val(),gop:$("#grupo").val() },
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        }
    });

}
listar_encuestadores();

</script>
