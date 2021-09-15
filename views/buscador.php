<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/buscador.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/main.css">
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<div id="buscador-container">
  <ul class="ul-nav">
     <li>
      <a href=""><b>Productos por categoría</b></a>
      <ul id="categorias">
        <li><a href="">Ver Todos</a></li>
        <li><a href="">Computadoras</a></li>
        <li><a href="">Perisféricos</a></li>
        <li><a href="">Componentes</a></li>
      </ul>
      </li>
    </ul>
  <div id="barra-busqueda">
    <form action="">
      <input type="text" name="buscador" placeholder="Encuentra todo lo que busques...">
      <input type="submit" value="Buscar">
    </form>
  </div>
  <div id="carrito/container">
    <ul>
    <li><i class="fas fa-shopping-cart"></i><a href="<?php echo constant('URL'); ?>carrito"><b>Carrito</b><span id="CantidadElemCarrito">0</span></a></li>
    </ul>
  </div>
</div>
