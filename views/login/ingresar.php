<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>BIT PC</title>
</head>

<body>
  <input type="hidden" value="<?php echo $this->token; ?>" id="token">
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <div>
      <div>
        <h1>Ingreso correcto</h1>
        <h2>Bienvenido <?php echo $nombre; ?></h2>
      </div>
    </div>
  </div>
  <?php require_once 'views/footer.php';?>
  <script src="<?php echo constant('URL'); ?>public/js/login/ingresar.js"></script>
</body>

</html>