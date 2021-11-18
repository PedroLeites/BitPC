(function ($) {
  $(document).ready(function () {
    //alert('ingresar');
    let token = $("#token").val();
    localStorage.setItem("token", token);
    console.log(token);
  }); //end ready
})(jQuery);
