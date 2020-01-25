$(document).ready(function(){
    $('#asistencias').DataTable({
        'processing':true,
        'serverSide':true,
        'serverMethod':'post',
        'ajax':{
            'url':'asistencia.php',
        },
        'columns':[
            {data:'id_asistencias'},
            {data:'id_asistencias'},
            {data:'id_asistencias'},
            {data:'id_asistencias'},
            {data:'id_asistencias'},
            {data:'id_asistencias'},

            
        ]


    })
})