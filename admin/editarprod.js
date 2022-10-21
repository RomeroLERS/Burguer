$(document).ready(function () {
  
  var idEditar = -1;
  // Editar para productos
  $(".btnEditar").click(function () {

    idEditar = $(this).data('id');
    var nombre = $(this).data('nombre');
    var cantidad = $(this).data('cantidad');
    var descripcion = $(this).data('descripcion');
    var precio_normal = $(this).data('precio_normal');
    var precio_rebajado = $(this).data('precio_rebajado');
    var categoria = $(this).data('categoria');
    //var imagen = $(this).data('imagen');

    //alert(imagen);
    $("#nombre1").val(nombre);
    $("#cantidad1").val(cantidad);
    $("#descripcion1").val(descripcion);
    $("#precio_normal1").val(precio_normal);
    $("#precio_rebajado1").val(precio_rebajado);
    $("#categoria1").val(categoria);
    //$("#imagen1").val(imagen);
    $("#idEdit").val(idEditar);
    //alert(nombre);
  });
  

});