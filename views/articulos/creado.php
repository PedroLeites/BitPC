<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Artículo Creado</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <div>
      <div>
        <?php if ($this->respuesta) {;?>
        <div role="alert">
          Articulo creado con exito
        </div>
        <?php } else {;?>
        <div role="alert">
          Error al crear
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