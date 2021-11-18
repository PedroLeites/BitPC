<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>BIT PC - Tienda</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos/listar.css">
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <h1>Tienda Productos</h1>
  </div>

  <?php foreach ($this->articulos as $key => $value) {
    $articulo = new Articulo();
    $articulo = $value;
    ?>
  <div class="gallery">
    <div class="card">
      <!--ID: <?=$value->id;?>-->
      <img class="prodimg" src="<?php echo $articulo->url; ?>" alt="<?php echo $articulo->descripcion; ?>" />
      <p class=""> <?=$value->nombre;?></p>
      <p class=""> <?=$articulo->descripcion;?></p>
      <p class="">$ <?=$articulo->precio;?></p>
      <input id="art-<?=$articulo->id;?>" value="1" type="number"></p>
      <button class="btnAgregar" type="button" data-articulo-id="<?php echo $value->id; ?>">Agregar</button>
    </div><!-- card  -->
  </div><!-- gallery  -->
  <?php }
;?>

  <?php require 'views/footer.php';?>
  <!-- importo script de listar-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/listar.js"></script>

</body>

</html>