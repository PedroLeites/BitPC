<<<<<<< HEAD
(function($, param) {
  $(document).ready(function() {
      //alert('editar articulo');
      $("#enviarForm").click(function() {
        //alert('hola');
        //console.log("enviarFormulario");
        var id = $("#articulosIDProd").val();
        var codigo = $("#articulosNomProd").val();
        var descripcion = $("#articulosDescripcion").val();
        var precio = $("#articulosPrecio").val();
        var precio = $("#articulosPrecio").val();
        var precio = $("#articulosPrecio").val();
        var objeto = {
        "IDProd": IDProd,
        "Nombre": NomProd,
        "Descripcion" : Descripcion,
        "Precio": Precio,}
        //console.log(objeto);
        const confirm = window.confirm("Deseas actualizar el elemento?");
        if (confirm){
          let url= $("#url").val();
          let urlReq =url+"apiarticulos/actualizar";
          let headers = {"Content-Type":"application/json;charset=utf-8"};
          let data = JSON.stringify(objeto);
          $.ajax({
            url: urlReq,
            headers: headers,            
            type: 'PUT',
            data: data
=======
(function ($, param) {
  $(document).ready(function () {
    //alert('editar articulo');
    $("#enviarForm").click(function () {
      //alert('hola');
      //console.log("enviarFormulario");
      var id = $("#articuloId").val();
      var nombre = $("#articuloNombre").val();
      var descripcion = $("#articuloDescripcion").val();
      var precio = $("#articuloPrecio").val();
      var estado = $("#articuloEstado").val();
      var objeto = {
        id: id,
        nombre: nombre,
        descripcion: descripcion,
        precio: precio,
        estado: estado,
      };
      //console.log(objeto);
      const confirm = window.confirm("Deseas actualizar el elemento?");
      if (confirm) {
        let url = $("#url").val();
        let urlReq = url + "apiarticulos/actualizar";
        let headers = { "Content-Type": "application/json;charset=utf-8" };
        let data = JSON.stringify(objeto);
        $.ajax({
          url: urlReq,
          headers: headers,
          type: "PUT",
          data: data,
>>>>>>> origin/axel
        })
          .done(function (data) {
            console.log(data);
          })
          .fail(function (jqXHR, textStatus, errorThrown) {
            serrorFunction();
          });
      } else {
        console.log("entro else");
      }
    }); //end enviar Form ajax

    $("#btnEnviarForm").click(function (e) {
      e.preventDefault();
      if (true) {
        $("#form01").submit();
      }
    }); //end enviar Form post

    //previsualizaci??n de la foto
    //$("#articuloFoto").change(function(e){
    $("input[type=file]").change(function (e) {
      let input = e.target;
      let reader = new FileReader();
      reader.onload = function () {
        let dataURL = reader.result;
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
