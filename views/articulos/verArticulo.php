<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/articulos/verArticulo.css">
  <title>Editar Articulo</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>

  <div id="form-container">
    <div>
      <h1>Editar Articulo</h1>
    </div>
    <form id="form01" action="<?php echo constant('URL'); ?>articulos/actualizar" method="post"
      enctype="multipart/form-data">
      <div>
        <label for="articuloId">Id</label>
        <input class="input" type="text" id="articuloId" name="id" disabled value="<?php echo $this->articulo->id; ?>">
      </div>
      <div>
        <label for="articuloNombre">Nombre</label>
        <input class="input" type="text" id="articuloNombre" name="nombre" value="<?=$this->articulo->nombre;?>">
      </div>
      <div>
        <label for="articuloDescripcion">Descripcion</label>
        <textarea name="descripcion" id="articuloDescripcion" cols="40"
          rows="20"><?=$this->articulo->descripcion;?></textarea>
      </div>
      <div>
        <label for="articuloPrecio">Precio</label>
        <input class="input" type="text" id="articuloPrecio" name="precio" value="<?=$this->articulo->precio;?>">
      </div>
      <div>
        <label for="articuloEstado">Estado</label>
        <select value="<?=$this->articulo->estado;?>" name="estado" id="articuloEstado">
          <option value="activo">activo</option>
          <option value="inactivo">inactivo</option>
        </select>
      </div>
      <div>
        <label for="articuloStock">Stock</label>
        <input class="input" type="text" id="articuloStock" name="stock" value="<?=$this->articulo->stock;?>">
      </div>
      <div>
        <label for="articuloCategoria">Categoría</label>
        <select value="<?=$this->articulo->categoria;?>" name="categoria" id="articuloCategoria">
          <option value="Computadora">Computadora</option>
          <option value="Accesorio">Accesorio</option>
          <option value="Componente">Componente</option>
        </select>
      </div>
      <div>
        <label for="articuloFoto">URL de la Foto</label>
        <input class="input" type="file" id="articuloFoto" name="img">
      </div>
      <div id="imgP"></div>
      <div>
        <button id="btnEnviarForm" type="submit">Guardar</button>
      </div>
<<<<<<< HEAD
      <input type="hidden" value="<?php echo $this->articulo->id; ?>" id="articuloId" name="articuloId">
    </form>
  </div>
<<<<<<< HEAD
=======
      <input type="hidden" value="<?php echo $this->articulos->$IDProd; ?>" IDProd="IDProd" name="IDProd">
      </form>
    </div>
>>>>>>> axel

  <!-- importo el jQuery-->
  <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
=======
  <?php require_once 'views/footer.php';?>
>>>>>>> origin/axel
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/verArticulo.js"></script>

</body>

</html>