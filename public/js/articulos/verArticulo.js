(function($, param) {
  $(document).ready(function() {
      alert('editar articulo');
      $("#enviarForm").click(function() {
        //alert('hola');
        //console.log("enviarFormulario");
        var id = $("#articuloId").val();
        var codigo = $("#articuloNombre").val();
        var descripcion = $("#articuloDescripcion").val();
        var precio = $("#articuloPrecio").val();
        var objeto = {
        "id": id,
        "nombre": nombre,
        "descripcion" : descripcion,
        "precio": precio,}
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
        })
        .done(function (data) { 
          console.log(data);})
        .fail(function (jqXHR, textStatus, errorThrown) { serrorFunction(); });

        } else {
          console.log("entro else");
        }
    });//end enviar Form ajax

    $("#btnEnviarForm").click(function(e) {
      e.preventDefault();
      console.log("funciona");
      if (true){
        $("#form01").submit();
      }          
    });//end enviar Form post





  });//end ready
})(jQuery, "hola mundo");