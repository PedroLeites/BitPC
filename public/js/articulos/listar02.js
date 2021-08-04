(function($, param) {
  $(document).ready(function() {
      //alert('hola');
      //console.log("funciona ver articulo");
      var $listaArticulos=[];
      let url= $("#url").val();
      let urlReq =url+"apiarticulos/listar";
      console.log("url: "+urlReq);
      let headers = {"Content-Type":"application/json;charset=utf-8"}; 
      let data = {};
            $.ajax({
              url: urlReq,
              headers: headers,
              type: 'DELETE',
              data: data
          })
          .done(function (data) { 
            $listaArticulos=data.datos;
            console.log($listaArticulos);
           })
          .fail(function (jqXHR, textStatus, errorThrown) { serrorFunction(); });

          //asiganr la funcionalidad del carrito
          const items = document.querySelectorAll(".btnAgregar");
          items.forEach(item => {
          item.addEventListener("click", function(){          
            let articuloId = this.dataset.articuloId;
            console.log(articuloId);
            $articulo= $listaArticulos.find(articulo => articulo.id ==articuloId);
            console.log($articulo);
            console.log("------------------\n");
            $articulo ={};
            var encontrado= false;
            var total = $listaArticulos.length;
            var i= 0;
            while (!encontrado && i<total) {
              $articulo = $listaArticulos[i];
              if ($articulo.id ==articuloId){
                encontrado=true;                
              }//end if
              i++;
            }//end while            
            console.log($articulo);
            //$("#filaart-"+alumnoId).remove();
          });//end item click
      });//end item click items foreach

          



  });//end ready
})(jQuery, "hola mundo");