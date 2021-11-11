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
        <label for="articuloId">Id</label>
        <input type="text" id="IDProd" name="id" disabled value="<?php echo $this->articulos->IDProd; ?>">
      </div>
      <div>
        <label for="articuloNombre">Nombre</label>
        <input type="text" id="articulosNombre" name="nombre" value="<?=$this->articulos->NomProd;?>">
      </div>
      <div>
        <label for="articuloDescripcion">Descripcion</label>
        <input type="text" id="articulosDescripcion" name="Descripcion" value="<?=$this->articulos->Descripcion;?>">
      </div>
      <div>
        <label for="articuloPrecio">Precio</label>
        <input type="text" id="articulosPrecio" name="Precio" value="<?=$this->articulos->Precio;?>">
      </div>
      <div>
        <label for="articuloPrecio">Cantidad</label>
        <input type="text" id="articulosStock" name="Stock" value="<?=$this->articulos->Stock;?>">
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