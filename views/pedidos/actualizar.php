<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estado de Pedido Cambiado</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <div>
      <div>
        <h1>Resultado actulalizar</h1>
        <?php if ($this->respuesta) {;?>
        <div role="alert">
          Pedido actualizado con exito
        </div>
        <?php } else {;?>
        <div role="alert">
          Error al actualizar el pedido
        </div>
        <?php }
;?>
      </div>
    </div>
  </div>
  <?php require_once 'views/footer.php';?>
</body>

</html>