<table id="reporte_encuestadores" class="table table-bordered table-striped">
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
        var today = new Date();

        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        options.timeZone = 'UTC';
        options.timeZoneName = 'short';
        var nombre = $("#grupo").val();

        var now = today.toLocaleString('es-ES', options);

        var tabla = $('#reporte_encuestadores').DataTable({
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
            buttons: [

                {
                    extend: 'excel',
                    filename: function() {

                        return "REPORTE GRUPO " + nombre + " - " + now
                    }
                },

                {
                    extend: 'pdf',
                    filename: function() {

                        return "REPORTE GRUPO " + nombre + " - " + now
                    },
                    title: 'ENCUESTADORES',



                    customize: function(doc) {
                        doc.content.splice(1, 0, {
                            columns: [{
                                margin: [10, 15],
                                text: 'TOTAL DE ENCUESTAS '+$("#total_encuestas").val(),
                                fontSize: 10
                            }]
                        });
                    }
                },
            ],

            select: true,




            "ajax": {
                url: 'controlador.php?op=encuestadores',
                type: "post",
                data: {
                    op: "encuestadores",
                    fecha_e: $("#fecha_encuestadores").val(),
                    gop: $("#grupo").val()
                },
                dataType: "json",
                complete: function(e) {
                  e= JSON.parse(e.responseText);
                  $("#total_encuestas").val(e.total)
                   
                },
            }
        });
       
        

    }
   
    listar_encuestadores();
</script>