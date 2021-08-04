<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BIT PC - Tienda</title>
</head>
<body>
<input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
    <?php require 'views/header.php';?>
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
          <h5>ID: <?=$value->id;?> <?=$value->nombre;?></h5>
          <p class="card-text"><?=$value->descripcion;?></p>
          <p class="card-text">$ <?=$value->precio;?></p>
          <input id="art-<?=$value->id;?>"
          value="1" type="number"
          ></p>
          <button type="button" data-articulo-id="<?php echo $value->id; ?>">Agregar</button>
        </div>
      </div><!-- end card -->
    </div><!-- end col --><?php }
;?>
      </div>
    </div>

    <script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/articulos/listar.js"></script>

</body>
</html>