<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos/actualizar.css">
  <title>Actualizar</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>

  <div>
    <h1>Resultado actulalizar</h1>
    <?php if ($this->respuesta) {;?>
    <div class="resActualizar" role="alert">
      <p class="p">Articulo actualizado con exito</p>
    </div>
    <?php } else {;?>
    <div class="resActualizar" role="alert">
      <p class="p">Error al actualizar</p>
    </div>
    <?php }
;?>
  </div>

  <?php require_once 'views/footer.php';?>
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/actualizar.js"></script>
</body>

</html>