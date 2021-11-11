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
    $articulos = new Articulos();
    $articulos = $row;?>
              <tr id="filaart-<?php echo $articulos->id; ?>">
                <td><?php echo $articulos->IDProd; ?></td>
                <td><?php echo $articulos->NomProd; ?></td>
                <td><?php echo $articulos->Descripcion; ?></td>
                <td><?php echo $articulos->Stock; ?></td>
                <td><?php echo $articulos->Estado; ?></td>
                <td><?php echo $articulos->Categoria; ?></td>
                <td><img src="<?php echo $articulos->url; ?>" alt="<?php echo $articulos->Descripcion; ?>" /></td>
                <td><a href="<?php echo constant('URL') . 'articulos/verArticulo/' . $articulos->id; ?>">Actualizar</a>
                </td>
                <td><button class="btnEliminar" data-articulo="<?php echo $articulos->id; ?>"
                    id="art<?php echo $articulos->id; ?>">Eliminar</button></td>
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