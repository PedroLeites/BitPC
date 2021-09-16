<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito</title>
</head>
<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <h1>Articulos en el carrito</h1>

  <!-- importo jQuery-->
  <script src="<?php echo constant('URL'); ?>public/js/jquery-3.6.0.min.js"></script>
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>public/js/carrito/index.js"></script>
</body>
</html>