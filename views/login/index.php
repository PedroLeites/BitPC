<!DOCTYPE html>
<html lang="es">

<head>
  <?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
  <title>BIT PC - LogIn</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login/login.css">
</head>

<body>
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <h1><?php echo $this->resultadoLogin; ?></h1>
  </div>
  <div id="form-container">
    <form id="form-login" action="<?php echo constant('URL'); ?>login/ingresar" method="post">
      <h1><?php echo Translate::__('InDatos'); ?></h1>
      <input class="input-login" type="email" id="email" name="correo"
        placeholder="<?php echo Translate::__('Email'); ?>" required>
      <input class="input-login" type="password" id="password" name="pass"
        placeholder="<?php echo Translate::__('Password'); ?>" required>
      <button type="submit" name="login"><?php echo Translate::__('LoginBtn'); ?></button>
      <p><?php echo Translate::__('NoAccount'); ?><a id="registro-link"
          href="<?php echo constant('URL'); ?>registro"><?php echo Translate::__('Sing_upLink'); ?></a></p>
    </form>
  </div>
  <?php require 'views/footer.php';?>
</body>

</html>
<!-- echo Translate::__(''); -->