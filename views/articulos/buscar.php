<!DOCTYPE html>
<html lang="es">

<head>
  <title>Articulos</title>
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos/index.css">
</head>

<body>
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">

  <div>
    <div>
      <h1>Lista de Articulos (ADMINS)</h1>
    </div>
    <div id="divCrear">
      <a id="btnCrear" href="<?php echo constant('URL'); ?>articulos/crear">Crear Artículo</a>
    </div>

    <div id="divtabla">
      <div>
        <table class="tabla">
          <tr>
            <th>#ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Stock</th>
            <th>Categoría</th>
            <th>Imagen</th>
            <th></th>
            <th></th>
          </tr>
          <?php

foreach ($this->articulos as $row) {
    $articulo = new Articulo();
    $articulo = $row;?>
          <tr id="filaart-<?php echo $articulo->id; ?>">
            <td><?php echo $articulo->id; ?></td>
            <td><?php echo $articulo->nombre; ?></td>
            <td><?php echo $articulo->descripcion; ?></td>
            <td>$<?php echo $articulo->precio; ?></td>
            <td><?php echo $articulo->estado; ?></td>
            <td><?php echo $articulo->stock; ?></td>
            <td><?php echo $articulo->categoria; ?></td>
            <td><img src="<?php echo $articulo->url; ?>" alt="<?php echo $articulo->url; ?>" /></td>
            <td><a id="btnActualizar"
                href="<?php echo constant('URL') . 'articulos/verArticulo/' . $articulo->id; ?>">Actualizar</a>
            </td>
            <td><button class="btnEliminar" data-articulo="<?php echo $articulo->id; ?>"
                id="art<?php echo $articulo->id; ?>">Eliminar</button></td>
          </tr>
          <?php }?>
        </table>
      </div>
    </div>
    <?php require_once 'views/footer.php';?>
    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/index.js"></script>
</body>



</html>