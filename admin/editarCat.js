$(document).ready(function () {
  
  var idEditar = -1;
  // Editar para Categoria
  $(".btnEditar").click(function () {

    idEditar = $(this).data('id');
    var categoria = $(this).data('categoria');
    //alert(nombre);
    $("#categoria1").val(categoria);
    $("#idEdit").val(idEditar);
    //alert(categoria);
  });
  

});