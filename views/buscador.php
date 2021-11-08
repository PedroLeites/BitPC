<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/buscador.css">
<div class="container">
  <div class="productos_container">
    <ul class="menu_nav">
      <li>
        <p id="p">Productos por Categoría<span class="iconify" data-icon="entypo:triangle-down"></span>
        <p>
        <ul class="submenu_productos">
          <li><a href="<?php echo constant('URL'); ?>articulos/listar">Ver Todos</a></li>
          <li><a href="">Computadoras</a></li>
          <li><a href="">Accesorios</a></li>
          <li><a href="">Componentes de PC</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="busqueda_container">
    <input type="text" placeholder="Buscar productos">
    <div class="btn_buscar">
      <a href=""><span class="iconify" data-icon="ci:search"></span></a>
    </div>
  </div>
  <div class="carrito_container">
    <ul>
      <li>
        <a id="a" href="<?php echo constant('URL'); ?>carrito">
          <span class="iconify" data-icon="fa-solid:shopping-cart"></span>
          <div class="cantidadElemCarrito">
            <span id="cantidadElemCarrito">0</span>
          </div>
        </a>
      </li>
    </ul>
  </div>
</div>