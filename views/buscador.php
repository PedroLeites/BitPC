<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/buscador.css">
<div id="buscador-container">
  <ul class="ul-nav">
     <li>
      <a href=""><b>Productos por categoría</b></a>
      <ul id="categorias">
        <li><a href="<?php echo constant('URL'); ?>articulos/listar">Ver Todos</a></li>
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
  <div id="carrito-container">
    <ul>
    <li>
      <a href="<?php echo constant('URL'); ?>carrito">
        <span class="iconify" data-icon="fa-solid:shopping-cart"></span>
        <span id="cantidadElemCarrito">0</span>
      </a>
    </li>
    </ul>
  </div>
</div>
