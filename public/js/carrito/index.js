(function($) {
  $(document).ready(function() {
      $("#resPedido").css("display" , "none")
      let carrito = JSON.parse(localStorage.getItem("carrito"));
      console.log(carrito);
      if (!carrito || carrito.length==0) {
        $("#btnConfirmarPedido").css("display","none");
      }     
      carrito.forEach(element => { 
        /*let imgUrl = element.url;
        let urlBase= $("#url").val();  
        if (!element.url.includes('svg+xml')) {
          imgUrl = urlBase . imgUrl;
          console.log(imgUrl);
        }*/
        let insert = `<div class=""
        id="art-${element.id}">
        <div class="">
          <img class="" src="${imgUrl}" alt=""/>
          <div class=">
            <h5 class="">ID:${element.id} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${element.nombre}</h5>
            <p class="">${element.descripcion}</p>
            <p class="">$ ${element.precio}</p>
            <input id="cant-${element.id}" class=""
            value="${element.cantidad}" type="number" disabled>
            </p>
            <button type="button" class="btnEliminar" data-articulo-id="${element.id}">Eliminar</button>
          </div>
          </div>
        </div><?php }`
        $("#carritoid").append(insert); 
      });
      $("body").on("click",".btnEliminar" ,function(){
        let articuloId= $(this).data("articuloId");
        const confirm = window.confirm("Deseas eliminar el elemento?");
        if (confirm){
          $("#art-"+articuloId).remove();
          let carritoStr = localStorage.getItem("carrito");
          if (carritoStr){
            let carrito= JSON.parse(carritoStr);
            let itemCarrito= carrito.find(articulo => articulo.id == articuloId);
            carrito.forEach(function(art, index, object) {
              if(art.id == articuloId){
                object.splice(index, 1);
                localStorage.setItem("carrito", JSON.stringify(carrito));
              }
              $("#cantidadElemCarrito").text(carrito.length);
          }); //end carrito.foreach
          } //end if carritoStr
        } //end if confirm
      }); //end body
      
      //http://localhost/proyectofinal3bj/BitPC/apicarrito/completarCarrito
      $("#btnConfirmarPedido").on("click", function(event){
        event.preventDefault();
        let url= $("#url").val();
        let urlReq = url+"apicarrito/completarCarrito";
        let headers = {"Content-Type":"application/json;charset=utf-8"};
        let data = {"lista" : carrito , "usuario_id" : 2};
          $.ajax({
            url: urlReq,
            header: headers,
            type: 'POST',
            data: JSON.stringify(data),
            dataType: 'json'
          })
          .done(function (data) {
            //pedido agregado con exito
            //limpiar carrito
            localStorage.setItem("carrito", JSON.stringify([]));
            $("#cantidadElemCarrito").text(0);
            //location.reload();
            //mostrar el resultado del pedido
            $("#carritoid").html(`<div id="carritoid"></div>`);
            $("#resPedido").css({"display" : "flex"})
            $("#numPedido").text(data.pedidoId);
            $("#btnConfirmarPedido").css({"display": "none"});
          })
          .fail(function (jqXHR, textStatus, errorThrown) {console.log(textStatus); });
      }); //end btnConfirmarPedido"fallo")
  });  
})(jQuery);