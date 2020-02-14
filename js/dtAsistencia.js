//Muestra el nombre del archivo seleccionado en el input type="file"
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


//Controlador para subir los archivos .cvs con ajax
function uploadData() {
    var Form = new FormData($('#filesform')[0]);
    $.ajax({
        url: "include/import.php",
        type: "post",
        data: Form,
        processData: false,
        contentType: false,
        success: function(data) {
            $('#filesmodal').modal('hide'); //Oculta el modal para subir archivos
            $("#asistencias").DataTable().ajax.reload(); //Recarga el datable
        }
    });
}

//Funcion agregar Data

function addData() {
    var Form = new FormData($('#addData')[0]);

    $.ajax({
        url: "include/controller_asistencia.php",
        type: "post",
        data: Form,
        processData: false,
        contentType: false,
        success: function(data) {
            $('#add').modal('hide'); //Oculta el modal para subir archivos
            $("#asistencias").DataTable().ajax.reload(); //Recarga el datable
        }
    });




}



//Funcion ajax para desplegar los datos en el datatable con JSON
$(document).ready(function() {
    $('#asistencias').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },

        'processing': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'include/dtAsistencia.php',
        },
        'columns': [
            { data: 'id_asistencias' },
            { data: 'nombre' },
            { data: 'faltas' },
            { data: 'permisos' },
            { data: 'fecha' },
            { data: 'h_entrada' },
            { data: 'h_salida' },
            { data: 'in_comida' },
            { data: 'out_comida' },
            { data: 'accion' }
        ]
    });
})