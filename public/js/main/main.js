(function($) {
  $(document).ready(function() {
      //alert('main.js');
      //console.log("funciona ver articulo"); 
      let carrito = JSON.parse(localStorage.getItem("carrito"));
      //console.log("probando");
      if (carrito){
        $("#cantidadElemCarrito").text(carrito.length);
      }
  });//end ready
})(jQuery);