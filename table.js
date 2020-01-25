$(document).ready(function(){
    $('#nomina').DataTable({
       'processing': true,
       'serverSide': true,
       'serverMethod': 'post',
       'ajax': {
           'url':'test.php'
       },
       'columns': [
          { data: 'emp_name' },
          { data: 'email' },
          { data: 'gender' },
          { data: 'salary' },
          { data: 'city' },
       ]
    });
 });