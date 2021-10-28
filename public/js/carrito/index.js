(function($) {
  $(document).ready(function() {
      //alert('index carrito');
      let carrito = JSON.parse(localStorage.getItem("carrito"));
      carrito.forEach(element => { 
        let insert = `<div class=""
        id="art-${element.id}">
        <div class="">
          <img class="" src="${element.url}" alt=""/>
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
        //console.log("entro");
        let articuloId= $(this).data("articuloId");
        //console.log(articuloId);
        const confirm = window.confirm("Deseas eliminar el elemento?");
        if (confirm){
          $("#art-"+articuloId).remove();
          let carritoStr = localStorage.getItem("carrito");
          if (carritoStr){
            /*console.log(carritoStr);
            console.log("-----------------");*/
            let carrito= JSON.parse(carritoStr);
            //console.log(carrito);
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
        //console.log("confirmar pedido");
        let url= $("#url").val();
        let urlReq = url+"apicarrito/completarCarrito";
        //console.log(urlReq);
        /*console.log("CARRITO");
        console.log(carrito);*/
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
            console.log(data);
            //console.log('exito');
            //pedido agregado con exito
            //limpiar carrito
            localStorage.setItem("carrito", JSON.stringify([]));
            $("#cantidadElemCarrito").text(0);
            //location.reload();
            //mostrar el resultado del pedido
            $("#carritoid").html(`<div id="carritoid"></div>`);
            //console.log(data.resultado);
            $("#resPedOk").css("display" , "flex")
            $("#numeroPedido").text(data.resultado);
            $("#btnConfirmarPedido").css({"display": "none"});
          })
          .fail(function (jqXHR, textStatus, errorThrown) {console.log(textStatus); });
      }); //end btnConfirmarPedido"fallo")
  });  
})(jQuery);