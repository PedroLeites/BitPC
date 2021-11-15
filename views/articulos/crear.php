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
    <form id="form01" action="<?php echo constant('URL'); ?>articulos/crear" method="post"
      enctype="multipart/form-data">
      <div>
        <label for="articuloNombre">Nombre</label>
        <input type="text" id="articuloNombre" name="nombre" value="">
      </div>
      <div>
        <label for="articuloDescripcion">Descripcion</label>
        <input type="text" id="articuloDescripcion" name="descripcion" value="">
      </div>
      <div>
        <label for="articuloPrecio">Precio</label>
        <input type="text" id="articuloPrecio" name="precio" value="">
      </div>
      <div>
        <label for="articuloEstado">Estado</label>
        <select value="" name="estado" id="articuloEstado">
          <option disabled selected>Selecciona una opción</option>
          <option value="activo">activo</option>
          <option value="inactivo">inactivo</option>
        </select>
      </div>
      <div>
        <div>
          <button id="btnEnviarForm" type="submit">Guardar</button>
        </div>
        <input type="hidden" value="<?php echo $this->articulo->id; ?>" id="articuloId" name="articuloId">
    </form>
  </div>
  <?php require_once 'views/footer.php';?>
</body>

</html>