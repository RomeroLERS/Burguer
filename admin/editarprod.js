$(document).ready(function(){
    var idEliminar= -1;
    var idEditar= -1;
    var data;
    $(".btnEliminar").click(function(){
      idEliminar=$(this).data('id');
      data=$(this).parent('td').parent('tr');
    });
    $(".eliminar").click(function(){
      $.ajax({
        url: 'eliminarpq.php',
        method: 'POST',
        data:{
          id:idEliminar
        }
      }).done(function(res){
        alert(res);
        $(data).fadeOut(1000);
      });
    });
    $(".btnEditar").click(function(){
  
      idEditar=$(this).data('id');
      var nombre = $(this).data('nombre');
      var cantidad = $(this).data('cantidad');
      var descripcion = $(this).data('descripcion');
      var precio_normal = $(this).data('precio_normal');
      var precio_rebajado = $(this).data('precio_rebajado');
      var categoria = $(this).data('categoria');
  
      alert(nombre);
      $("#nombre1").val(nombre);
      $("#cantidad1").val(cantidad);
      $("#descripcion1").val(descripcion);
      $("#precio_normal1").val(precio_normal);
      $("#precio_rebajado1").val(precio_rebajado);
      $("#categoria1").val(categoria);
      $("#idEdit").val(idEditar);
      //alert(categoria);
  
  
  
  });
  
  });