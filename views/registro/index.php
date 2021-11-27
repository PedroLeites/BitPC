<!DOCTYPE html>
<html lang="en">

<head>
  <?php
require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;
?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BIT PC - Registrarse</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/registro/registro.css">
</head>

<body>
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div id="form-container">
    <form id="form-registro" action="<?php echo constant('URL'); ?>registro/registrarse" method="post">
      <h1><?php echo Translate::__('InDatos'); ?></h1>
      <input class="input-form" type="mail" id="email" name="correo" placeholder="<?php echo Translate::__('Email'); ?>"
        required>
      <input class="input-form2" type="text" id="nombre" name="nombre"
        placeholder="<?php echo Translate::__('Name'); ?>" required>
      <input class="input-form2" type="text" id="apellido" name="apellido"
        placeholder="<?php echo Translate::__('Lname'); ?>" required>
      <label for="fechanac"><?php echo Translate::__('Fnac'); ?></label>
      <input class="input-form" type="date" id="fechanac" name="fechanac" value="Fecha de nacimiento" required>
      <input class="input-form" type="text" id="direccion" name="direccion"
        placeholder="<?php echo Translate::__('Dir'); ?>" required>
      <input class="input-form" type="text" id="telefono" name="telefono"
        placeholder="<?php echo Translate::__('Tel'); ?>" required>
      <input class="input-form" type="password" id="password" name="password"
        placeholder="<?php echo Translate::__('Password'); ?>" required>
      <button type="submit" name="registrarse"><?php echo Translate::__('Sing_up'); ?></button>
      <p><?php echo Translate::__('YesAccount'); ?> <a id="login-link"
          href="<?php echo constant('URL'); ?>login"><?php echo Translate::__('Sing_inLink'); ?></a></p>
    </form>
  </div>
  <?php require 'views/footer.php';?>
</body>

</html>
<!-- echo Translate::__(''); -->