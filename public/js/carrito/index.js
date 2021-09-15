(function($) {
  $(document).ready(function() {
      alert('index carrito');
      let carrito = JSON.parse(localStorage.getItem("carrito"));
      carrito.forEach(element => { 
        let insert = `<div class=""
        id="art-${element.id}">
        <div class="">
          <img class="" src="${element.url}" alt=""/>
          <div class=">
            <h5 class="">ID:${element.id} ${element.codigo}</h5>
            <p class="">${element.descripcion}</p>
            <p class="">$ ${element.precio}</p>
            <input id="cant-${element.id}" class=""
            value="${element.cantidad}" type="number" disabled>
            </p>
            <button type="button" class="btnEliminar" data-articulo-id="${element.id}">Eliminar</button>
          </div>
          </div>
        </div><?php }`
        $("#carritoid").after(insert);
      });
      $("body").on("click",".btnEliminar" ,function(){
        console.log("entro");
        let articuloId= $(this).data("articuloId");
        console.log(articuloId);
        const confirm = window.confirm("Deseas eliminar el elemento?");
        if (confirm){
          $("#art-"+articuloId).remove();
          let carritoStr = localStorage.getItem("carrito");
          if (carritoStr){
            console.log(carritoStr);
            console.log("-----------------");
            let carrito= JSON.parse(carritoStr);
            console.log(carrito);
            let itemCarrito= carrito.find(articulo => articulo.id ==articuloId);
            carrito.forEach(function(art, index, object) {
              if(art.id == articuloId){
                object.splice(index, 1);
                localStorage.setItem("carrito", JSON.stringify(carrito));
                console.log("probando");
                
                
                
              }
              $("#cantidadElemCarrito").text(carrito.length);
          });
          }
        }
      }); 
  });  
})(jQuery);