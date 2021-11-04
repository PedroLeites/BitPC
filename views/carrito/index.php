<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <h1>Articulos en el carrito</h1>
  <div id="carritoid"></div>
  <div class="btn_pedido">
    <button class="btn_completarPedido" id="btnConfirmarPedido">Confirmar Pedido</button>
  </div>
  <div id="resPedido" style="display:none">
    <div>
      <h2>Resultado del Pedido</h2>
      <div role="alert">
        Pedido Completado con Éxito <br>
        Número de Pedido: <span id="numPedido"></span>
      </div>
    </div>
  </div>
  <!--<div id="resPed">
    <div>
      <h1>Resultado del pedido</h1>
      <div role="alert" id="resPedOk" style="display:none">
        Pedido confirmado <span id="numeroPedido"></span>
      </div>
      <div role="alert" id="resPedError">
        Error al confirmar el pedido
      </div>
    </div>
  </div>-->
  <?php require_once 'views/footer.php';?>
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>public/js/carrito/index.js"></script>
</body>

</html>