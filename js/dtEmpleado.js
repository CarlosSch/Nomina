//Funcion ajax para desplegar los datos en el datatable con JSON
$(document).ready(function() {
    $('#empleados').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },

        'processing': true,
        'serverMethod': 'post',
        'ajax': {
            'url': 'include/dtEmpleado.php',
        },
        'columns': [
            { data: 'id_empleado' },
            { data: 'nombre' }, 
            { data: 'area' },
            { data: 'correo' },
            { data: 'estado' },
            { data: 'accion' }
        ]
    });
});

function recargar(){
    $.ajax({
        success: function(data){
            $("#empleados").DataTable().ajax.reload();
        }
    });
}