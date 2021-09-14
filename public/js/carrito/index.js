(function($) {
  $(document).ready(function() {
      //alert('carrito');
      let carrito = JSON.parse(localStorage.getItem("carrito"));
      $("#carrito").text(carrito.length);
      carrito.forEach(element => {
        $("#carritoid").after('<button type="button" class="btnAgregar"></button>');
      });
      
  });  
})(jQuery);