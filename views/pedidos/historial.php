<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pedidos/historial.css">
  <title>Historial de Pedidos</title>
</head>

<body>
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <div>
    <div>
      <h1>Pedidos Anteriores</h1>
    </div>
    <div id="tablaPedidos">
      <table>
        <thead>
          <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Dirección</th>
            <th>Fecha</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php

foreach ($this->articulos as $row) {
    $articulo = new Pedido();
    $articulo = $row;?>
          <tr id="filaart-<?php echo $articulo->id; ?>">
            <td><?php echo $articulo->nombreProd; ?></td>
            <td><?php echo $articulo->cantidadProd; ?></td>
            <td><?php echo $articulo->direccion; ?></td>
            <td><?php echo $articulo->fecha; ?></td>
            <td><?php echo $articulo->estado; ?></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    </div>
  </div>
  <?php require_once 'views/footer.php';?>
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>/public/js/pedidos/index.js"></script>
</body>

</html>