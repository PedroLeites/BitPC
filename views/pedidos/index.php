<!DOCTYPE html>
<html lang="es">

<head>
  <title>Pedidos</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/pedidos/index.css">
</head>

<body>
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <div>
    <div>
      <h1>Lista de Pedidos (ADMINS)</h1>
    </div>
    <div id="tablaPedidos">
      <table>
        <thead>
          <tr>
            <th>#ID</th>
            <th>email</th>
            <th>Usuario</th>
            <th>Fecha y Hora</th>
            <th>Estado</th>
            <th>Articulo ID</th>
            <th>Cantidad</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php

foreach ($this->articulos as $row) {
    $articulo = new Pedido();
    $articulo = $row;?>
          <tr id="filaart-<?php echo $articulo->id; ?>">
            <td><?php echo $articulo->id; ?></td>
            <td><?php echo $articulo->email; ?></td>
            <td><?php echo $articulo->usuario; ?></td>
            <td><?php echo $articulo->fecha; ?></td>
            <td><?php echo $articulo->estado; ?></td>
            <td><?php echo $articulo->articulo_id; ?></td>
            <td><?php echo $articulo->cantidad; ?></td>
            <td><a id="btnEstado"
                href="<?php echo constant('URL') . 'pedidos/cambiarEstado/' . $articulo->id; ?>">Cambiar
                Estado</a></td>
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