(function($, param) {
  $(document).ready(function() {
      //alert('hola');
      console.log("funciona");
      const items = document.querySelectorAll(".btnEliminar");
      items.forEach(item => {
        item.addEventListener("click", function(){
          let articuloId = this.dataset.articulo;
          console.log(articuloId);
          console.log(param);
        });//end item click
      });//end item click items foreach  
  });  
})(jQuery, "hola mundo");