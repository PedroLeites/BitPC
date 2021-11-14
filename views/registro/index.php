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
    <form id="form-registro" action="<?php echo constant('URL'); ?>" method="post">
      <h1>Ingrese sus datos</h1>
      <input class="input-form" type="mail" id="email" name="email" placeholder="Correo Electrónico">
      <input class="input-form2" type="text" id="nombre" name="nombre" placeholder="Nombre">
      <input class="input-form2" type="text" id="apellido" name="apellido" placeholder="Apellido">
      <label for="fechanac">Fecha de Nacimiento</label>
      <input class="input-form" type="date" id="fechanac" name="fechanac" value="Fecha de nacimiento">
      <input class="input-form" type="text" id="direccion" name="direccion" placeholder="Dirección">
      <input class="input-form" type="password" id="password" name="password" placeholder="Contraseña">
      <button type="submit">Registrarse</button>
      <p>¿Ya tienes una cuenta? <a id="login-link" href="<?php echo constant('URL'); ?>login">Inicia Sesión</a></p>
    </form>
  </div>
  <?php require 'views/footer.php';?>
</body>

</html>