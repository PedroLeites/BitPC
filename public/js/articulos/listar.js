(function($) {
  $(document).ready(function() {

    let carritoStr = localStorage.getItem("carrito");
    let carrito;
    if (carritoStr){
      carrito = JSON.parse(carritoStr);
      console.log("ento");
    }
    
      let $listaArticulos=[];
      let url= $("#url").val();
      let urlReq =url+"apiarticulos/listar";
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
            console.log(data);
           })
          .fail(function (jqXHR, textStatus, errorThrown) {console.log("fallo");  });

          //asiganr la funcionalidad del carrito
          $(".btnAgregar").each(function(index) {            
          $(this).on("click", function(){        
            let articuloId = $(this).data("articuloId");
            let articuloDescripcion = $(this).data("articuloDescripcion");
            let articuloCodigo = $(this).data("articuloCodigo");
            console.log(articuloId);
            let articulo= $listaArticulos.find(articulo => articulo.id ==articuloId);           
            carrito = JSON.parse(localStorage.getItem("carrito"));
            if (carrito==null){
              //inicializo el carrito
              //agrego el elememto al carrito
              let cantidadAux= $("#art-"+articuloId).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              carrito=[];
              console.log();
              item={"id" : articulo.id,
                     "precio": articulo.precio,
                     "descripcion": articuloDescripcion,
                     "codigo": articuloCodigo,
                     "cantidad": cantidad,
                     "url": articulo.url
                  }
              carrito.push(item);              
              localStorage.setItem("carrito", JSON.stringify(carrito));
              $("#cantidadElemCarrito").text(carrito.length);
            } else{
              //ya tienen por lo menos un item
              let cantidadAux= $("#art-"+articuloId).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              //console.log("cantidad:" + cantidad);              
              //console.log();
              item={"id" : articulo.id,
                     "precio": articulo.precio,
                     "descripcion": articuloDescripcion,
                     "codigo": articuloCodigo,
                      "cantidad": cantidad,
                      "url": articulo.url
                    
                    }
              let itemCarrito= carrito.find(articulo => articulo.id ==articuloId);
              //console.log("itemCarrito: "+itemCarrito);
              if (itemCarrito==undefined){
                carrito.push(item);
                localStorage.setItem("carrito", JSON.stringify(carrito));
                $("#cantidadElemCarrito").text(carrito.length);
              } 
              
            }
          });//end item click
      });//end item click items foreach
  });//end ready
})(jQuery);