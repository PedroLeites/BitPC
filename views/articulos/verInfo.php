<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Articulos</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <?php foreach ($this->articulo as $key => $value) {
    $articulo = new Articulo();
    $articulo = $value;
    ?>

  <div>
    <img id="imgUnica" class="prodimg" src="<?php echo $articulo->url; ?>" alt="<?php echo $urlDefecto; ?>" />
    <h2><?=$value->nombre;?></h2>
    <p><?=$articulo->descripcion;?></p>
    <p>$ <?=$articulo->precio;?></p>
    <div id="btnContainer">
      <input id="art-<?=$articulo->id;?>" value="1" type="number" min="1">
      <button class="btnAgregar" type="button" data-articulo-id="<?php echo $value->id; ?>"><span class="iconify"
          data-icon="carbon:shopping-cart-plus"></span></button>
    </div>
  </div>

  <?php }
;?>
  <?php require 'views/footer.php';?>
</body>

</html>