(function ($) {
  $(document).ready(function () {
    alert("hola cambiarEstado.js");
    document.ready(function () {
      $("#btnEnviarForm").click(function (e) {
        e.preventDefault();
        if (true) {
          $("#formPedido").submit();
        }
      });
    });
  }); //end ready
})(jQuery);
