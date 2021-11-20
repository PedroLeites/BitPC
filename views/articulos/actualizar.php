<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Actualizar</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <div>
      <div>
        <h1>Resultado actulalizar</h1>
        <?php if ($this->respuesta) {;?>
        <div role="alert">
          Articulo actualizado con exito
        </div>
        <?php } else {;?>
        <div role="alert">
          Error al actualizar
        </div>
        <?php }
;?>
      </div>
    </div>
  </div>
  <?php require_once 'views/footer.php';?>
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/actualizar.js"></script>
</body>

</html>