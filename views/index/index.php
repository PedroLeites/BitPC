<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link href="<?php echo constant('URL'); ?>public/css/index/index.css" rel="stylesheet" type="text/css" media="all">
  <title>BIT PC</title>
</head>

<body>
  <input type="checkbox" id="btn-up">
  <label for="btn-up" class="up"></label>
  <div class="ventana">
    <div class="contenedor">
      <header>Ubicación del local</header>
      <label id="X" for="btn-up">X</label>
      <div class="contenido">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3279.132651756962!2d-56.21859255930807!3d-34.72705056135896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95a1d2a4ec131fb3%3A0x7641887fe00661ff!2sAv%20Artigas%2C%2015900%20Las%20Piedras%2C%20Departamento%20de%20Canelones!5e0!3m2!1ses!2suy!4v1636772958533!5m2!1ses!2suy"
          width="800" height="500" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
    </div>
  </div>

  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div class="slider"></div>
  <?php require 'views/footer.php';?>

</body>

</html>