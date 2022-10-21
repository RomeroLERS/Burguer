$(document).ready(function () {
  
  var idEditar = -1;
  // Editar para Usuario
  $(".btnEditar").click(function () {

    idEditar = $(this).data('id');
    var nombre = $(this).data('nombre');
    var usuario = $(this).data('usuario');
    var clave = $(this).data('clave');
    var rol = $(this).data('rol');
    //alert(rol);
    $("#nombre1").val(nombre);
    $("#usuario1").val(usuario);
    $("#clave1").val(clave);
    $("#rol1").val(rol);
    $("#idEdit").val(idEditar);
    //alert(categoria);
  });
  

});