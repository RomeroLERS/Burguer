  function formllenado(){
    //alert("entra pqs");
    let numeropq= document.getElementById('num_pq').value;
  //alert(area);
  
  
  $.ajax({
          url: 'consult-form.php',
          type: 'POST'
      }).done(function(respuesta) {
          obj = JSON.parse(respuesta);
          let res = obj.data;
          let x = 0;
          for (Q = 0; Q < res.length; Q++) { 
              if (obj.data[Q].num_pq == numeropq){
                //area=obj.data[Q].areas;
                document.getElementById('area').value=obj.data[Q].area;
                document.getElementById('elemento').value=obj.data[Q].elemento;
                document.getElementById('pregunta').value=obj.data[Q].pregunta;
                document.getElementById('orientacion').value=obj.data[Q].orientacion;
                document.getElementById('documentos').value =obj.data[Q].documentos;
              }
          }
      });
  }