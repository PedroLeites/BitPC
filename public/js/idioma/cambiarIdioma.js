(function($, param) {
  $(document).ready(function() {
    let idioma = $("#idioma").val();             
    Cookies.set('idioma', idioma, { expires: 365});             
    document.documentElement.setAttribute("lang", idioma);    
  });
})(jQuery, "hola mundo");