$(document).ready(function(){
   $('#nomina').DataTable({
      'processing': true,
      'ajax': {
          'url':'test.php'
      },
      'columns': [
         { data: 'id_nomina' },
         { data: 'inicio' },
         { data: 'cierre' },
         { data: 'quincena' },
      ]
   });
});