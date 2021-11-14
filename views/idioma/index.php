<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/idioma/idioma.css">
  <title>BIT PC - Idioma</title>
</head>

<body>
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <div id="form-container">
    <form id="form-idioma" action="<?php echo constant('URL'); ?>idioma/cambiarIdioma" method="post">
      <h1>Seleccionar Idioma</h1>
      <select name="idioma" id="cambioIdioma">
        <option disabled selected>Selecciona una opción</option>
        <option>es</option>
        <option>en</option>
      </select>
      <input type="submit" value="Confirmar">
    </form>
  </div>
  <?php require 'views/footer.php';?>
</body>

</html>