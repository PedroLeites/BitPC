<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/registro/registrado.css">
  <title>Registro Completo</title>
</head>

<body>
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div id="ResultadoRegistro">
    <h1>¡Se ha registrado correctamente!</h1>
    <h2>Bienvenid@ a BIT PC <?php echo $this->nombre; ?></h2>
  </div>
  <?php require 'views/footer.php';?>
</body>

</html>