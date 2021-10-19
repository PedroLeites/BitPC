<!DOCTYPE html>
<html lang="en">
<head>
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
        <h1>Crear Cuenta</h1>
        <form id="form-registro" action="<?php echo constant('URL'); ?>" method="post">
            <input class="input-form" type="mail" id="email" name="email" placeholder="Correo Electrónico">
            <input class="input-form" type="text" id="nombre" name="name" placeholder="Nombre">
            <input class="input-form" type="text" id="apellido" name="lastname" placeholder="Apellido">
            <input class="input-form" type="password" id="password" name="pass" placeholder="Contraseña">
            <button type="submit">Registrarse</button>
            <p>¿Ya tienes una cuenta? <a id="login-link" href="<?php echo constant('URL'); ?>login">Inicia Sesión</a></p>
        </form>
    </div>
  <?php require 'views/footer.php';?>
</body>
</html>
