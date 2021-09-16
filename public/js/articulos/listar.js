(function($) {
  $(document).ready(function() {
    let carritoStr = localStorage.getItem("carrito");
    let carrito;
    if (carritoStr){
      carrito = JSON.parse(carritoStr);
      //console.log("entro");
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
            //$listaArticulos=data.datos;
            $listaArticulos=data.articulosDisponibles;
            //console.log($listaArticulos);
           })
          .fail(function (jqXHR, textStatus, errorThrown) {console.log("fallo");  });
          $(".btnAgregar").each(function(index) { 
        
          $(this).on("click", function(){    
            let articuloId = $(this).data("articuloId");
            let articuloNombre = $(this).data("articuloNombre");
            let articuloDescripcion = $(this).data("articuloDescripcion");
            console.log("lista de articuls\n");
            console.log($listaArticulos);
            console.log('Articulo ID: '+articuloId);
            let articulo= $listaArticulos.find(articulo => articulo.id == articuloId);          
            carrito = JSON.parse(localStorage.getItem("carrito"));
            if (carrito==null){
              //inicilizo el carrito
              //agrego el elememto al carrito
              let cantidadAux= $("#art-"+articuloId).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              carrito=[];
              console.log($listaArticulos);
              item={"id" : articulo.id,
                    "nombre": articulo.nombre,
                    "precio": articulo.precio,
                    "descripcion": articulo.descripcion,
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
              item={"id" : articulo.id,
                    "nombre": articulo.nombre,
                    "precio": articulo.precio,
                    "descripcion": articulo.descripcion,
                    "cantidad": cantidad,
                    "url": articulo.url
              }
              let itemCarrito= carrito.find(articulo => articulo.id ==articuloId);
              if (itemCarrito==undefined){
                carrito.push(item);
                localStorage.setItem("carrito", JSON.stringify(carrito));
                $("#cantidadElemCarrito").text(carrito.length);
              } 
            }//end else
          });//end item click
      });//end item click items foreach
  });//end ready
})(jQuery);