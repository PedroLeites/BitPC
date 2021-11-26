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
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/carrito/carrito.css">
  <title>Carrito</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <h1 id="hArticulos"><?php echo Translate::__('hCarrito'); ?></h1>
  <div id="carritoid">
    <table id="tablaCarrito">
      <tr>
        <th><?php echo Translate::__('Articles'); ?></th>
        <th><?php echo Translate::__('PriceUni'); ?></th>
        <th><?php echo Translate::__('Cant'); ?></th>
        <th><?php echo Translate::__('PriceTot'); ?></th>
        <th></th>
      </tr>
    </table>
  </div>
  <div class="btn_pedido">
    <button class="btn_completarPedido" id="btnConfirmarPedido"><?php echo Translate::__('btnPedido'); ?></button>
  </div>
  <div id="resPedido" style="display:none">
    <div>
      <h1><?php echo Translate::__('hResPedido'); ?></h1>
      <div id="mensajePedido" role="alert">
        <?php echo Translate::__('ResPedido'); ?> <br>
        <?php echo Translate::__('NumPed'); ?> <span id="numPedido"></span>
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
<!-- echo Translate::__(''); -->