(function($) {
  $(document).ready(function(){
    let carrito = JSON.parse(localStorage.getItem("carrito"));
    $("#carrito").text(carrito.length);
    carrito.forEach(element => {
      $("#carritoid").after('<button type="button" class="bntAgregar"></button>');
    });
  });
})(jQuery);