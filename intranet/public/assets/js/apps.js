$(document).ready(function() {
    App.init();
    TreeView.init();
    console.log("%c Site developed with -   by  @OnlyChristopher ", "background: #32a932; padding:5px; font-size: 12px; color: #ffffff");
    $('.table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'excel', className: 'btn-success' },
        ],
        "ordering": false,
        "info": true,
        "bProcessing": true,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
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
});


$(".fecha").datepicker({
    language: 'es',
    todayHighlight: !0,
    autoclose: !0,
    format: 'yyyy-mm-dd',
});

$('[data-click="swal-danger"]').click(function (e) {
    let btn =  $(this).data('backdrop');
    swal({
        title: "Desea eliminar registro?",
        text: "Recuerde que si elimina el registro, no se puede recuperar",
        icon: "error",
        buttons: {
            cancel: {text: "Cancelar", value: null, visible: !0, className: "btn btn-default", closeModal: !0},
            confirm: {text: "Eliminar", value: !0, visible: !0, className: "btn btn-danger", closeModal: !0}
        }
    }).then((willDelete) => {
        if (willDelete) {
            $('#'+btn).click();
            swal("Registro Eliminado!", {
                icon: "success",
            });
        } else {
            swal("Cancelo!", {
                icon: "error",
            });
        }
    });
});


$('.alert[data-auto-dismiss]').each(function(index, element) {
    var $element = $(element),
        timeout = $element.data('auto-dismiss') || 8000;
    setTimeout(function() {
        $element.alert('close');
    }, timeout);
});

$("select[name='id_carpetaprincipal']").change(function() {
    let codigo = $(this).val();
    let id_proyecto = $("input[name='id_proyecto']").val();
    let token = $("input[name='_token']").val();
    $.ajax({
        url: "<?php echo route( 'select-ajax' ) ?>",
        method: 'POST',
        data: {
            codigo: codigo,
            id_proyecto: id_proyecto,
            _token: token
        },
        success: function(data) {
            $("select[name='id_carpetasecundaria']").html('');
            $("select[name='id_carpetasecundaria']").html(data.options);
            $("select[name='id_carpetasecundaria']").selectpicker('refresh');
        }
    });
});

let usuario = "{{Auth::user()->id}}";
let token = $("input[name='_token']").val();


