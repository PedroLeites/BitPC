<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>BIT PC - Tienda</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <!-- <input type="hidden" value="http://localhost/proyectofinal3bj/BitPC/apicarrito/completarCarrito" id="url"> -->
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <div>
      <div>
        <h1>Tienda Productos</h1>
      </div>
    </div>
    <div>
      <?php foreach ($this->articulos as $key => $value) {
    $articulo = new Articulo();
    $articulo = $value;
    $imgUrl = $articulo->url;
    if (!strpos($imgUrl, 'svg+xml')) {
        $imgUrl = constant('URL') . $articulo->url;
    }?>
      <div class="col">
        <div class="card">
          <div>
            <!--<h5>ID: <?=$value->id;?>-->
            <img src="<?php echo $imgUrl; ?>" alt="<?php echo $articulo->descripcion; ?>" />
            <p class=""> <?=$value->nombre;?></p>
            <p class=""> <?=$articulo->descripcion;?></p>
            <p class="">$ <?=$articulo->precio;?></p>
            <input id="art-<?=$articulo->id;?>" value="1" type="number"></p>
            <button class="btnAgregar" type="button" data-articulo-id="<?php echo $value->id; ?>">Agregar</button>
          </div>
        </div><!-- end card -->
      </div><!-- end col --><?php }
;?>
    </div>
  </div>
  <?php require 'views/footer.php';?>
  <!-- importo script de listar-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/listar.js"></script>

</body>

</html>