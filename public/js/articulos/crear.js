(function ($, param) {
  $(document).ready(function () {
    //previsualización de la foto
    //$("#articuloFoto").change(function(e){
    $("input[type=file]").change(function (e) {
      let input = e.target;
      let reader = new FileReader();
      reader.onload = function () {
        let dataURL = reader.result;
        console.log("url defecto\n");
        console.log(dataURL);
        //var output = document.getElementById('output');
        //output.src = dataURL;
        //$("#imgP").html("<img src='" +dataURL+ "' />");
        $("#imgP").html(`<img src="${dataURL}" />`);
      };
      reader.readAsDataURL(input.files[0]);
    });
  }); //end ready
})(jQuery, "hola mundo");
