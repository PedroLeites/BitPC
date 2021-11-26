<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estado Pedido</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>

  <div>
    <div>
      <h1>Cambiar Estado de Pedido</h1>
    </div>
    <form id="formPedido" action="<?php echo constant('URL'); ?>pedidos/actualizar" method="post"
      enctype="multipart/form-data">
      <label for="pedidoEstado">Estado</label>
      <?php //$this->articulo->estado;;;;;;;;?>
      <select name="estado" id="pedidoEstado">
        <?php if ($this->articulo->estado == "pendiente") {
    ;?>
        <option value="pendiente">pendiente</option>
        <option value="entregado">entregado</option>
        <?php } else {;?>
        <option value="entregado">entregado</option>
        <option value="pendiente">pendiente</option>
        <?php }
;?>
      </select>
  </div>
  <button id="btnEnviarForm" type="submit">Guardar</button>
  </div>
  <input type="hidden" value="<?php echo $this->articulo->id; ?>" id="articuloId" name="articuloId">
  </form>
  </div>
  <?php require_once 'views/footer.php';?>
  <script src="<?php echo constant('URL'); ?>/public/js/pedidos/cambiarEstado.js"></script>
</body>

</html>