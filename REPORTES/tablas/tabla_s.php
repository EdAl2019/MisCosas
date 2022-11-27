<table id="reporte_encuestadores" class="table-bordered table-striped display">
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

        var today = new Date();

        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };

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
                    },
                    title: 'ENCUESTADORES',

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
                                    text: 'TOTAL DE ENCUESTAS: ' + $("#total_encuestas").val(),
                                    fontSize: 12,
                                    bold: true

                                },{
                                margin: [10, 15],
                                 text:now,
                                 fontSize: 12,
                                 bold:true
                                }],



                            },
                     
                             
                          
                            );
                            doc.content.splice(4, 0, {
                            
                            columns: [{
                                margin: [10, 15],
                                text: 'TOTAL DE ENCUESTAS: ' + $("#total_encuestas").val(),
                                fontSize: 12,
                                bold: true

                            }],



                        },
                 
                         
                      
                        );
                    }
                },
            ],

            select: true,
            
            scrollX: true,
           

            "ajax": {
                url: '../controladores/controlador.php?op=encuestadores',
                type: "post",
                data: {
                    op: "encuestadores",
                    fecha_e: $("#fecha_encuestadores").val(),
                    gop: $("#grupo").val()
                },
                dataType: "json",
                complete: function(e) {
                    e = JSON.parse(e.responseText);
                    $("#total_encuestas").val(e.total)
                    llenar_grafico_equipo($("#fecha_grafica_e").val());

                },
            }
        });



    }

    listar_encuestadores();
</script>