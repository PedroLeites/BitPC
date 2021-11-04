<!DOCTYPE html>
<html lang="es">

<head>
  <title>Articulos</title>
</head>

<body>
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <div>
    <div>
      <div>
        <h1>Lista de Articulos (ADMINS)</h1>
      </div>
      <div>
        <div>
          <table>
            <thead>
              <tr>
                <th>#ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php

foreach ($this->articulos as $row) {
    $articulo = new Articulo();
    $articulo = $row;?>
              <tr id="filaart-<?php echo $articulo->id; ?>">
                <td><?php echo $articulo->id; ?></td>
                <td><?php echo $articulo->nombre; ?></td>
                <td><?php echo $articulo->descripcion; ?></td>
                <td><?php echo $articulo->precio; ?></td>
                <td><img src="<?php echo $articulo->url; ?>" alt="<?php echo $articulo->descripcion; ?>" /></td>
                <td><a href="<?php echo constant('URL') . 'articulos/verArticulo/' . $articulo->id; ?>">Actualizar</a>
                </td>
                <td><button class="btnEliminar" data-articulo="<?php echo $articulo->id; ?>"
                    id="art<?php echo $articulo->id; ?>">Eliminar</button></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php require_once 'views/footer.php';?>
    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/index.js"></script>
</body>

</html>