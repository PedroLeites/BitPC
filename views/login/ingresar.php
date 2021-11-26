<!DOCTYPE html>
<html lang="es">

<head>
  <?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
  <meta charset="UTF-8">
  <title>BIT PC</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login/ingresar.css">
</head>

<body>
  <input type="hidden" value="<?php echo $this->token; ?>" id="token">
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div id="ResultadoLogin">
    <h1><?php echo Translate::__('Login'); ?></h1>
    <h2>¡<?php echo Translate::__('LoginSaludo'); ?> <?php echo $correo; ?>!</h2>
  </div>

  <?php require_once 'views/footer.php';?>
  <script src="<?php echo constant('URL'); ?>public/js/login/ingresar.js"></script>
</body>

</html>
<!-- echo Translate::__(''); -->