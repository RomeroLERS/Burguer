$(document).ready(function(){
    var idEliminar= -1;
    var idEditar= -1;
    var fila;
    $(".btnEliminar").click(function(){
      idEliminar=$(this).data('id');
      fila=$(this).parent('td').parent('tr');
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: 'eliminarusuario.php',
        method: 'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        alert(res);
        $(fila).fadeOut(1000);
      });
    });
    $(".btnEditar").click(function(){
  
      idEditar=$(this).data('id');
      var id_rol=$(this).data('id_rol');
      var num_empleado=$(this).data('num_empleado');
      var id_area=$(this).data('id_area');
      var nombre=$(this).data('nombre');
      var apellido=$(this).data('apellido');
      var contraseña=$(this).data('contraseña');
  
      // alert(orientacion);  
      $("#id_rol1").val(id_rol);
      $("#num_empleado1").val(num_empleado);
      $("#id_area1").val(id_area);
      $("#nombre1").val(nombre);
      $("#apellido1").val(apellido);
      $("#contraseña1").val(contraseña);
      $("#idEdit").val(idEditar);
      // alert(idEditar);
  
  });
  
  });