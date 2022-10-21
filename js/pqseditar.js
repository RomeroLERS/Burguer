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
        url: 'eliminarpq.php',
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
      var num_pq=$(this).data('num_pq');
      var area=$(this).data('area');
      var elemento=$(this).data('elemento');
      var pregunta=$(this).data('pregunta');
      var orientacion=$(this).data('orientacion');
      var inciso=$(this).data('inciso');
      var documentos=$(this).data('documentos');
  
      // alert(orientacion);
  
      $("#num_pq1").val(num_pq);
      $("#area1").val(area);
      $("#elemento1").val(elemento);
      $("#pregunta1").val(pregunta);
      $("#orientacion1").val(orientacion);
      $("#inciso1").val(inciso);
      $("#documentos1").val(documentos);
      $("#idEdit").val(idEditar);
      // alert(idEditar);
  
  
  
  });
  
  });