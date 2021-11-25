<?php require_once 'entidades/pedido.php';?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/carrito/carrito.css">
  <title>Ver detalle</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <h1 id="hArticulos">Detalle del pedido</h1>
  <div>
    <div>
    </div>
    <div id="tablaPedidos">
      <table>
        <thead>
          <tr>
            <th>#ID</th>
            <th>Articulo</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Precio Total</th>
          </tr>
        </thead>
        <tbody>
          <?php

foreach ($this->articulo as $row) {
    //$articulo = new Pedido();
    $articulo = $row;?>
          <tr id="filaart-<?php echo $articulo->id; ?>">
            <td><?php echo $articulo->id; ?></td>
            <td><?php echo $articulo->nombre; ?></td>
            <td><?php echo $articulo->precio; ?></td>
            <td><?php echo $articulo->cantidad; ?></td>
            <td><?php echo $articulo->subtotal; ?></td>
          </tr>
          <?php }?>
        </tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td> <b>Total:</b> </td>
          <td><b><?php echo $this->total; ?></b></td>
        </tr>
      </table>
    </div>
  </div>
  <?php require_once 'views/footer.php';?>
</body>

</html>