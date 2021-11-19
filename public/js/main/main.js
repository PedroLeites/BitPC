(function ($) {
  $(document).ready(function () {
    //alert('main.js');
    //console.log("funciona ver articulo");
    let carrito = JSON.parse(localStorage.getItem("carrito"));
    //console.log("probando");
    if (carrito) {
      $("#cantidadElemCarrito").text(carrito.length);
    }
    function buscar() {
      let texto = $("#buscadortexto").val();
      console.log(texto);
      $("#textoculto").val(texto);
      if (texto) {
        console.log("entro");
        //$("#searchForm").submit();
        //$('input[type=submit]').click();
        $("#btnSend").click();
        // $( "#searchForm" ).submit(function( event ) {
      }
    }

    $("#buscadortexto").keypress(function (e) {
      console.log(e.which);
      if (e.which == 13) {
        console.log("apreto enter");
        buscar();
      }
    });
    $("#clickBuscar").click(function name(e) {
      //e.preventDefault();
      buscar();
    });
  }); //end ready
})(jQuery);
