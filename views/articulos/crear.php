<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Artículo</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require_once 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <div>
      <div>
        <h1>Crear Articulo</h1>
      </div>
    </div>
    <form id="formCrear" action="<?php echo constant('URL'); ?>articulos/creado" method="post"
      enctype="multipart/form-data">
      <div>
        <label for="articuloNombre">Nombre</label>
        <input type="text" id="articuloNombre" name="nombre" value="">
      </div>
      <div>
        <label for="articuloDescripcion">Descripcion</label>
        <textarea name="descripcion" id="articuloDescripcion" cols="40" rows="20"></textarea>
      </div>
      <div>
        <label for="articuloPrecio">Precio</label>
        <input type="text" id="articuloPrecio" name="precio" value="">
      </div>
      <div>
        <label for="articuloEstado">Estado</label>
        <select value="" name="estado" id="articuloEstado">
          <option value="activo">activo</option>
          <option value="inactivo">inactivo</option>
        </select>
      </div>
      <div>
        <label for="articuloStock">Stock</label>
        <input type="text" id="articuloStock" name="stock" value="">
      </div>
      <div>
        <label for="articuloFoto">URL de la Foto</label>
        <input type="file" id="articuloFoto" name="img">
      </div>
      <div id="imgP"></div>
      <div>
        <button id="btnEnviarForm" type="submit">Guardar</button>
      </div>
    </form>
  </div>
  <?php require_once 'views/footer.php';?>
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/crear.js"></script>
</body>

</html>