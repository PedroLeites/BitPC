(function ($) {
  $(document).ready(function () {
    let tokenStr = localStorage.getItem("token");
    let token = "defecto  valor";
    if (tokenStr) {
      token = tokenStr;
    }
    $.ajaxSetup({
      headers: {
        Authorization: `Bearer ${token}`,
      },
    });
    $("#resPedido").css("display", "none");
    let carrito = JSON.parse(localStorage.getItem("carrito"));
    console.log(carrito);
    if (!carrito || carrito.length == 0) {
      $("#btnConfirmarPedido").css("display", "none");
    }
    carrito.forEach((element) => {
      /*let insert = `<div class=""
        id="art-${element.id}">
        <div class="">
          <img class="" src="${element.url}" alt=""/>
          <div class=">
            <h5 class="">ID:${element.IDProd} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${element.NomProd}</h5>
            <p class="">${element.Descripcion}</p>
            <p class="">$ ${element.Precio}</p>
            <input id="cant-${element.IDProd}" class=""
            value="${element.Stock}" type="number" disabled>
            </p>
            <button type="button" class="btnEliminar" data-articulo-id="${element.id}">Eliminar</button>
          </div>
          </div>
        </div><?php }`;*/
      var p = element.precio;
      var c = element.cantidad;
      var pc = p * c;
      let insert = `<tr>
          <td>${element.nombre}</td>
          <td>$${element.precio}</td>
          <td>${element.cantidad}</td>
          <td>$${pc}</td>
          <td><button type="button" class="btnEliminar" data-articulo-id="${element.id}"><span class="iconify" data-icon="carbon:shopping-cart-minus"></span></button></td>
        </tr>`;

      $("#tablaCarrito").append(insert);
    });
    /*
    $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    });
*/
    $("body").on("click", ".btnEliminar", function (event) {
      event.preventDefault();
      let articuloId = $(this).data("articuloId");
      const confirm = window.confirm("Deseas eliminar el elemento?");
      if (confirm) {
        $(this).closest("tr").remove();
        $("#art-" + articuloId).remove();
        let carritoStr = localStorage.getItem("carrito");
        if (carritoStr) {
          let carrito = JSON.parse(carritoStr);
          let itemCarrito = carrito.find(
            (articulo) => articulo.id == articuloId
          );
          carrito.forEach(function (art, index, object) {
            if (art.id == articuloId) {
              object.splice(index, 1);
              localStorage.setItem("carrito", JSON.stringify(carrito));
            }
            $("#cantidadElemCarrito").text(carrito.length);
            location.reload();
          }); //end carrito.foreach
        } //end if carritoStr
      } //end if confirm
    }); // fin body
    /*$("body").on("click", ".btnEliminar", function () {
      let articuloId = $(this).data("articuloId");
      const confirm = window.confirm("Deseas eliminar el elemento?");
      if (confirm) {
        $("#art-" + articuloId).remove();
        let carritoStr = localStorage.getItem("carrito");
        if (carritoStr) {
          let carrito = JSON.parse(carritoStr);
          let itemCarrito = carrito.find(
            (articulo) => articulo.id == articuloId
          );
          carrito.forEach(function (art, index, object) {
            if (art.id == articuloId) {
              object.splice(index, 1);
              localStorage.setItem("carrito", JSON.stringify(carrito));
            }
            $("#cantidadElemCarrito").text(carrito.length);
          }); //end carrito.foreach
        } //end if carritoStr
      } //end if confirm
    }); //end body*/

    //http://localhost/proyectofinal3bj/BitPC/apicarrito/completarCarrito
    $("#btnConfirmarPedido").on("click", function (event) {
      event.preventDefault();
      let url = $("#url").val();
      let urlReq = url + "apicarrito/completarCarrito";
      let headers = { "Content-Type": "application/json;charset=utf-8" };
      let usuarioID = a;
      let data = { lista: carrito };
      $.ajax({
        url: urlReq,
        header: headers,
        type: "POST",
        data: JSON.stringify(data),
        dataType: "json",
      })
        .done(function (data) {
          //pedido agregado con exito
          //limpiar carrito
          localStorage.setItem("carrito", JSON.stringify([]));
          $("#cantidadElemCarrito").text(0);
          //restar el stock

          //mostrar el resultado del pedido
          $("#carritoid").html(`<div id="carritoid"></div>`);
          $("#resPedido").css({ display: "flex" });
          $("#numPedido").text(data.pedidoId);
          $("#btnConfirmarPedido").css({ display: "none" });
          $("#hArticulos").css({ display: "none" });
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus);
        });
    }); //end btnConfirmarPedido"fallo")
  });
})(jQuery);
