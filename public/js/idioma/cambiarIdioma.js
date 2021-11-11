(function ($) {
  $(document).ready(function () {
    console.log("entro");
    let idioma = $("#idiomaId").val();
    console.log("idioma: " + idioma);
    //Cookies.set("idioma", "extranoi", { expires: 365 });
    document.documentElement.setAttribute("lang", idioma);
  });
})(jQuery);
