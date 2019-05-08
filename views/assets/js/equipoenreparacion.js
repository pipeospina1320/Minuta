$(document).ready(function() {
    $('input[name="frmexportreqrep"]').daterangepicker({
        // autoUpdateInput: true,
        applyClass: 'btn-sm btn-primary',
        cancelClass: 'btn-sm btn-default',
        "locale": {
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "DE",
            "toLabel": "HASTA",
            "customRangeLabel": "Custom",
            "daysOfWeek": ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sáb"],
            "monthNames": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            "firstDay": 1
        }
    });
    $('input[name="frmexportreqreprestamo"]').daterangepicker({
        // autoUpdateInput: true,
        applyClass: 'btn-sm btn-primary',
        cancelClass: 'btn-sm btn-default',
        "locale": {
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "DE",
            "toLabel": "HASTA",
            "customRangeLabel": "Custom",
            "daysOfWeek": ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sáb"],
            "monthNames": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            "firstDay": 1
        }
    });
    $(document).on('click', '#fechaExcel', function() {
        var fechas = $("#reservation").val();
        $.get("index.php?c=reparacionequipo&a=exportarExcelRepaEquipo", {
            data: fechas
        }, function(data) {
            window.open(this.url, '_blank');
        });
    });
    $(document).on('click', '#fechaExcelPrestamo', function() {
        var fecha = $("#reservationPretamo").val();
        $.get("index.php?c=reparacionequipo&a=exportarExcelRepaEquipoPrestamo", {
            dato: fecha
        }, function(data) {
            window.open(this.url, '_blank');
        });
    });
    var table = $('#tablereparacionequipo').DataTable({
        'autoWidth': false,
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        "processing": true,
        "serverSide": true,
        "order": [
            [1, "desc"]
        ],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "Todos"]
        ],
        "ajax": {
            "url": "index.php?c=reparacionequipo&a=consultReparacionEquipos",
            "type": "POST"
        },
        "columns": [{
            "data": "dispositivo"
        }, {
            "data": "fecha"
        }, {
            "data": "cliente"
        }, {
            "data": "status"
        }, {
            "data": "serial"
        }, {
            "data": "falla"
        }, {
            "data": null
        }],
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": '<a href="ReEquipo-Detalle-" id ="detalle" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> Detalle </a>' + '<a href="ReEquipo-Editar-" id="editar" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar  .</a>'
        }],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $('#tablereparacionequipo tbody').on('click', '#detalle', function() {
        var data = table.row($(this).parents('tr')).data();
        $(this).attr("href", "ReEquipo-Detalle-" + data["id"]);
    });
    $('#tablereparacionequipo tbody').on('click', '#editar', function() {
        var data = table.row($(this).parents('tr')).data();
        $(this).attr("href", "ReEquipo-Editar-" + data["id"]);
    });
    var table1 = $('#tablereparacionequipoprestamo').DataTable({
        'autoWidth': false,
        'paging': true,
        'info': true,
        'filter': true,
        'stateSave': true,
        "processing": true,
        "serverSide": true,
        "order": [
            [1, "desc"]
        ],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "Todos"]
        ],
        "ajax": {
            "url": "index.php?c=reparacionequipo&a=consultReparacionEquiposPrestamo",
            "type": "POST"
        },
        "columns": [{
            "data": "dispositivo"
        }, {
            "data": "fecha"
        }, {
            "data": "cliente"
        }, {
            "data": "status"
        }, {
            "data": "serial"
        }, {
            "data": "falla"
        }, {
            "data": "dias"
        }, {
            "data": null
        }],
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": '<a href="ReEquipo-Detalle-" id ="detallePrestamo" class="btn btn-primary btn-xs"><i class="fa fa-info-circle"></i> Detalle </a>' + '<a href="ReEquipo-Editar-" id="liberarPrestamo" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Liberar </a>'
        }, {
            "targets": -2,
            createdCell: function(td, cellData, rowData, row, col) {
                if (cellData >= 30) {
                    $(td).parent().addClass('lightRed');
                }
            }
        }],
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
    $('#tablereparacionequipoprestamo tbody').on('click', '#detallePrestamo', function() {
        var data = table1.row($(this).parents('tr')).data();
        $(this).attr("href", "ReEquipo-Detalle-" + data["id"]);
    });
    $('#tablereparacionequipoprestamo tbody').on('click', '#liberarPrestamo', function() {
        var data = table1.row($(this).parents('tr')).data();
        $(this).attr("href", "ReEquipo-Liberar-" + data["id"]);
    });
});