<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/main.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/header.css">
<div>
  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url000">
  <nav class="menu">
    <div id="logo">
      <a href="<?php echo constant('URL'); ?>index"><img
          src="<?php echo constant('URL'); ?>public/img/logos/logo-nav.png" height="auto" width="250px"></a>
    </div>
    <?php
if (isset($_SESSION["estalogueado"])) {
    $estaLogueado = $_SESSION["estalogueado"];
} else {
    $estaLogueado = false;
}
$estaLogueado = isset($_SESSION["estalogueado"]) ? $_SESSION["estalogueado"] : false;
if ($estaLogueado) {
    ?><?php $correo = $_SESSION["email"];?>
    <ul class="menu_items">
      <?php if ($_SESSION['rol'] == 'admin') {?>
      <li><a href="<?php echo constant('URL'); ?>articulos">Administrar Articulos</a></li>
      <li><a href="<?php echo constant('URL'); ?>pedidos">Administrar Pedidos</a></li>
      <?php }
    ;?>
      <li class="perfil">
        <a href="#"><?php echo $correo; ?></a>
        <ul class="menu_perfil">
          <li><a href="<?php echo constant('URL'); ?>pedidos/historial">Historial de Pedidos</a></li>
          <li><a href="<?php echo constant('URL'); ?>login/salir" id="btnSalir"><span class="iconify"
                data-icon="mdi:logout"></span>
              <?php echo Translate::__('Log_out'); ?></a></li>
        </ul>
      </li>
      <li><a href="<?php echo constant('URL'); ?>idioma"><span class="iconify"
            data-icon="carbon:language"></span><?php echo Translate::__('LangOp'); ?></a></li>
    </ul>
    <?php } else {
    ?>
    <ul class="menu_items">
      <!--<li><a href="<?php echo constant('URL'); ?>articulos">Administrar Articulos</a></li>-->
      <!--<li><a href="<?php echo constant('URL'); ?>pedidos">Administrar Pedidos</a></li>-->
      <li><a class="" href="<?php echo constant('URL'); ?>login"><span class="iconify" data-icon="entypo:login"></span>
          <?php echo Translate::__('Sing_in'); ?></a></a></li>
      <li><a class="" href="<?php echo constant('URL'); ?>registro"><span class="iconify"
            data-icon="bx:bxs-user-plus"></span><?php echo Translate::__('Sing_up'); ?></a></li>
      <li><a href="<?php echo constant('URL'); ?>idioma"><span class="iconify"
            data-icon="carbon:language"></span></span>
          <?php echo Translate::__('LangOp'); ?></a></li>
    </ul>
    <?php }
;?>
    <span class="btn_menu">
      <span class="iconify" data-icon="bx:bx-menu"></span>
    </span>
  </nav>
</div>
<script src="<?php echo constant('URL'); ?>public/js/headers/header.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/login/salir.js"></script>
<!-- echo Translate::__(''); -->