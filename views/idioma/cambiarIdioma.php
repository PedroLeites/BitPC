<!DOCTYPE html>
<html lang="es">

<head>
  <?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/idioma/cambiarIdioma.css">
  <title>Cambio de idioma</title>
</head>

<body>
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <input type="hidden" value="<?=$this->idioma;?>" id="idiomaId">
  <div id="ResultadoIdioma">
    <h1><?php echo Translate::__('Lang'); ?> <?=$this->idioma;?></h1>
  </div>
  <?php require 'views/footer.php';?>

  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>public/js/idioma/cambiarIdioma.js"></script>
</body>

</html>
<!-- echo Translate::__(''); -->