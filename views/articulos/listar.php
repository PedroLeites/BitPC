<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BIT PC - Tienda</title>
</head>
<body>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <?php require 'views/header.php';?>
    <?php require_once 'views/buscador.php';?>
    <div>
      <div>
        <div>
          <h1>Tienda Productos</h1>
        </div>
      </div>

      <div>
      <?php foreach ($this->articulos as $key => $value) {;

    ?><div>
      <div>
        <img src="<?=$value->url;?>"/>
        <div>
          <h5>ID: <?=$value->IDProd;?> <?=$value->$NomProd;?></h5>
          <p class=""><?=$value->Descripcion;?></p>
          <p class="">$ <?=$value->Precio;?></p>
          <p class="">$ <?=$value->Stock;?></p>
          <p class="">$ <?=$value->Estado;?></p>
          <p class="">$ <?=$value->Categoria;?></p>
          <input IDProd="art-<?=$value->IDProd;?>"
          value="1" type="number"
          ></p>
          <button class="btnAgregar" type="button" data-articulos-IDProd="<?php echo $value->IDProd; ?>">Agregar</button>
        </div>
      </div><!-- end card -->
    </div><!-- end col --><?php }
;?>
      </div>
    </div>

    <?php require 'views/footer.php';?>
    <!-- importo jQuery-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/listar.js"></script>

</body>
</html>