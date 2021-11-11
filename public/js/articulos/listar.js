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
            console.log($listaArticulos);
            //console.log($listaArticulos);
           })
          .fail(function (jqXHR, textStatus, errorThrown) {console.log("fallo");  });
          $(".btnAgregar").each(function(index) { 
        
          $(this).on("click", function(){    
            let IDProd = $(this).data("articuloId");
            let articuloNombre = $(this).data("articuloNombre");
            let articuloDescripcion = $(this).data("articuloDescripcion");
            console.log("lista de articuls\n");
            console.log($listaArticulos);
            console.log('Articulo ID: '+IDProd);
            let articulo= $listaArticulos.find(articulo => articulo.id == IDProd);          
            carrito = JSON.parse(localStorage.getItem("carrito"));
            if (carrito==null){
              //inicilizo el carrito
              //agrego el elememto al carrito
              let cantidadAux= $("#art-"+IDProd).val();
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
              let cantidadAux= $("#art-"+IDProd).val();
              let cantidad=1; 
              if (cantidadAux>=1){
                cantidad = cantidadAux;
              }
              item={"IDProd" : articulos.IDProd,
                    "Nombre": articulos.NomProd,
                    "Precio": articulos.Precio,
                    "Descripcion": articulos.Descripcion,
                    "Stock": Stock,
                    "url": articulos.url
              }
              let itemCarrito= carrito.find(articulo => articulos.id ==IDProd);
              if (itemCarrito==undefined){
                carrito.push(articulos);
                localStorage.setItem("carrito", JSON.stringify(carrito));
                $("#cantidadElemCarrito").text(carrito.length);
              } 
            }//end else
          });//end item click
      });//end item click items foreach
  });//end ready
})(jQuery);