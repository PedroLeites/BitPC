<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Editar Articulo</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>

  <div>
    <div>
      <div>
        <h1>Editar Articulo</h1>
      </div>
    </div>
    <form id="form01" action="<?php echo constant('URL'); ?>articulos/actualizar" method="post"
      enctype="multipart/form-data">
      <div>
<<<<<<< HEAD
        <label for="articuloId">Id</label>
        <input type="text" id="articuloId" name="id" disabled value="<?php echo $this->articulo->id; ?>">
      </div>
      <div>
        <label for="articuloNombre">Nombre</label>
        <input type="text" id="articuloNombre" name="nombre" value="<?=$this->articulo->nombre;?>">
      </div>
      <div>
        <label for="articuloDescripcion">Descripcion</label>
        <input type="text" id="articuloDescripcion" name="descripcion" value="<?=$this->articulo->descripcion;?>">
      </div>
      <div>
        <label for="articuloPrecio">Precio</label>
        <input type="text" id="articuloPrecio" name="precio" value="<?=$this->articulo->precio;?>">
=======
          <label for="articuloId">Id</label>
          <input type="text"
          id="articuloId"
          name="id"
          disabled
          value="<?php echo $this->articulos->$IDProd; ?>">
      </div>
      <div>
          <label for="articuloNombre">Nombre</label>
          <input type="text"
          id="articuloNombre"
          name="nombre"
          value="<?=$this->Articulos->$NomProd;?>">
      </div>
      <div>
          <label for="articuloDescripcion">Descripcion</label>
          <input type="text"
          id="articuloDescripcion"
          name="descripcion"
          value="<?=$this->articulos->Descripcion;?>">
      </div>
      <div>
          <label for="articuloPrecio">Stock</label>
          <input type="text"
          id="articuloPrecio"
          name="precio"
          value="<?=$this->articulos->Stock;?>">
      </div>
      <div>
          <label for="articuloPrecio">Estado</label>
          <input type="text"
          id="articuloPrecio"
          name="precio"
          value="<?=$this->articulos->Estado;?>">
      </div>
      <div>
          <label for="articuloPrecio">Categoria</label>
          <input type="text"
          id="articuloPrecio"
          name="precio"
          value="<?=$this->articulos->Categoria;?>">
>>>>>>> axel
      </div>
      <div>
        <label for="articuloFoto">URL de la Foto</label>
        <input type="file" id="articuloFoto" name="img">
      </div>
      <div id="imgP"></div>
      <div>
        <button id="btnEnviarForm" type="submit">Guardar</button>
      </div>
<<<<<<< HEAD
      <input type="hidden" value="<?php echo $this->articulo->id; ?>" id="articuloId" name="articuloId">
    </form>
  </div>
=======
      <input type="hidden" value="<?php echo $this->articulos->$IDProd; ?>" IDProd="IDProd" name="IDProd">
      </form>
    </div>
>>>>>>> axel

  <!-- importo el jQuery-->
  <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
  <!-- importo el javascript-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/verArticulo.js"></script>

</body>

</html>