<!DOCTYPE html>
<html lang="es">
<head>
  <title>Pedidos</title>
</head>
<body>
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
<div>
    <div>
        <div>
        <h1>Lista de Pedidos (ADMINS)</h1>
    </div>
    <div >
        <div>
            <table>
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Usuario</th>
                    <th>Fecha y Hora</th>
                </tr>
                </thead>
                <tbody>
<?php

foreach ($this->articulos as $row) {
    $articulo = new Pedido();
    $articulo = $row;?>
              <tr id="filaart-<?php echo $articulo->id; ?>">
                  <td><?php echo $articulo->id; ?></td>
                  <td><?php echo $articulo->nombre; ?></td>
                  <td class="fecha"><?php echo $articulo->fecha; ?></td>
                  <!--<td><button class="btnEliminar" data-articulo="<?php echo $articulo->id; ?>"id="art<?php echo $articulo->id; ?>">Eliminar</button></td>-->
              </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <?php require_once 'views/footer.php';?>
    <!-- importo el javascript-->
    <!--<script src="<?php echo constant('URL'); ?>/public/js/articulos/index.js"></script>-->
</body>
</html>