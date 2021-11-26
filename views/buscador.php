<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/buscador.css">
<div class="container">
  <div class="productos_container">
    <ul class="menu_nav">
      <li>
        <a><?php echo Translate::__('Products_by_Category'); ?><span class="iconify"
            data-icon="entypo:triangle-down"></span>
        </a>
        <ul class="submenu_productos">
          <li><a href="<?php echo constant('URL'); ?>articulos/listar"><?php echo Translate::__('View_All'); ?></a></li>
          <li><a href="<?php echo constant('URL'); ?>articulos/filtar" .><?php echo Translate::__('Computers'); ?></a>
          </li>
          <li><a href="<?php echo constant('URL'); ?>articulos/filtar"><?php echo Translate::__('Accessories'); ?></a>
          </li>
          <li><a href="<?php echo constant('URL'); ?>articulos/filtar"><?php echo Translate::__('PC_Components'); ?></a>
          </li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="busqueda_container">
    <input type="text" id="buscadortexto" placeholder="<?php echo Translate::__('Search'); ?>">
    <div class="btn_buscar" id="clickBuscar">
      <a href="#"><span class="iconify" data-icon="ci:search"></span></a>
    </div>
  </div>


  <div class="carrito_container">
    <a id="a" href="<?php echo constant('URL'); ?>carrito">
      <span class="iconify" data-icon="fa-solid:shopping-cart"></span>
      <div class="cantidadElemCarrito">
        <span id="cantidadElemCarrito">0</span>
      </div>
    </a>
  </div>
</div>
<form action="<?php echo constant('URL'); ?>articulos/buscar" method="post" id="searchForm" style="display: none;">
  <input type="hidden" name="textoBuscador" value="" id="textoculto">
  <input type="submit" value="enviar" id="btnSend">
</form>


<!-- echo Translate::__(''); -->