
jQuery(document).on('submit','#formLg',function(event){
    event.preventDefault();
    jQuery.ajax({
        url:'include/session.php',
        type:'POST',
        dataType:'json',
        data:$(this).serialize(),
        beforeSend:function(){
          $('.btn-login').val('Validando...');
        }
      })
      .done(function(respuesta){
        console.log(respuesta);
        if (!respuesta.error) {
          if (respuesta.tipo =='Empleado') {
            location='dashboard_empleados.php';
          }else if (respuesta.tipo=='Contador') {
            location='dashboard_contador.php';
            console.log(respuesta);

          }else if (respuesta.tipo=='Administrador'){
            location='dashboard_admin.php';
        }}else {
          $('.error').slideDown('slow');
          setTimeout(function(){
          $('.error').slideUp('slow');
        },2500);
        $('.btn-login').val('Iniciar Sesión');
        }
      })
      .fail(function(resp){
        console.log(resp.responseText);
      })
      .always(function(){
        console.log("Session started");
    });
  });