(function($, param) {
  $(document).ready(function() {
      //console.log("funciona");
      const items = document.querySelectorAll(".btnEliminar");
      items.forEach(item => {
        item.addEventListener("click", function(){
          
          let IDProd = this.dataset.articulos;
          console.log(IDProd);
          console.log(param);

          const confirm = window.confirm("Deseas eliminar el elemento?");
          if (confirm){
            console.log("entro if");
            //solitud ajax, 
            let url= $("#url").val();
            let urlReq =url+"apiarticulos/borrar/"+IDProd;
            console.log("url: "+urlReq);
            let headers = {"Content-Type":"application/json;charset=utf-8"};
            let data = {};
            $.ajax({
              url: urlReq,
              headers: headers,
              type: 'DELETE',
              data: data
          })
          .done(function (data) { console.log(data);
            $("#filaart-"+articuloId).remove()})
          .fail(function (jqXHR, textStatus, errorThrown) { serrorFunction(); });
          } else {
            //console.log("entro eslse");
          }
        });//end item click
      });//end item click items foreach  
  });  
})(jQuery);