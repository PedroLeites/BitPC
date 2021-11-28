<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos/creado.css">
  <title>Artículo Creado</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div id="resCrear">
    <?php if ($this->respuesta) {;?>
    <div role="alert">
      <p class="p">Articulo creado con exito</p>
    </div>
    <?php } else {;?>
    <div role="alert">
      <p class="p">Error al crear</p>
    </div>
    <?php }
;?>
  </div>


  <?php require_once 'views/footer.php';?>
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/actualizar.js"></script>
</body>

</html>