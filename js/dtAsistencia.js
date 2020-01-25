$(document).ready(function(){
    $('#asistencias').DataTable({
        'processing':true,
        'serverMethod':'post', 
        'ajax':{
            'url':'include/dtAsistencia.php',
            
        },
        'columns':[
            {data:'id_asistencias'},
            {data:'nombre'},
            {data:'faltas'},
            {data:'permisos'},
            {data:'fecha'},
            {data:'h_entrada'},
            {data:'h_salida'},
            {data:'in_comida'},
            {data:'out_comida'},
            {data:'accion'}
           
   
        ]
    })
})