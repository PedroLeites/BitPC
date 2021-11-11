<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>BIT PC - Tienda</title>
</head>

<body>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">
  <!-- <input type="hidden" value="http://localhost/proyectofinal3bj/BitPC/apicarrito/completarCarrito" id="url"> -->
  <?php require 'views/header.php';?>
  <?php require_once 'views/buscador.php';?>
  <div>
    <div>
      <div>
        <h1>Tienda Productos</h1>
      </div>
    </div>
    <div>
      <?php foreach ($this->articulos as $key => $value) {
    $articulos = new Articulos();
    $articulos = $value;

    ?>
        <div class="col">
          <div class="card">
          <div>
          <!--<h5>ID: <?=$articulos->IDProd;?>-->
          <img src="<?php echo $articulos->URL; ?>" alt="<?php echo $articulos->Descripcion; ?>" />
          <p class=""> <?=$articulos->NomProd;?></p>
          <p class=""> <?=$articulos->Descripcion;?></p>
          <p class="">$ <?=$articulos->Precio;?></p>
          <p class=""> <?=$articulos->Stock;?></p>
          <p class=""> <?=$articulos->Estado;?></p>
          <p class=""> <?=$articulos->Categoria;?></p>
          <input IDProd="art-<?=$articulos->IDProd;?>" value="1" type="number"></p>
            <button class="btnAgregar" type="button" data-articulo-id="<?php echo $articulos->IDProd; ?>">Agregar</button>
          </div>
        </div><!-- end card -->
      </div><!-- end col --><?php }
;?>
    </div>
  </div>
  <?php require 'views/footer.php';?>
  <!-- importo script de listar-->
  <script src="<?php echo constant('URL'); ?>/public/js/articulos/listar.js"></script>

</body>

</html>