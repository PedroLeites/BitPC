<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/main.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/header.css">
<nav class="menu">
  <div id="logo">
    <a href="<?php echo constant('URL'); ?>index"><img src="<?php echo constant('URL'); ?>public/img/logos/logo-nav.png" height="auto" width="200px"></a>
  </div>
<?php
if (isset($_SESSION["estalogueado"])) {
    $estaLogueado = $_SESSION["estalogueado"];
} else {
    $estaLogueado = false;
}
$estaLogueado = isset($_SESSION["estalogueado"]) ? $_SESSION["estalogueado"] : false;
if ($estaLogueado) {
    ?><?php $nombre = $_SESSION["nombre"];?>
      <ul class="menu_items">
        <li><a href="<?php echo constant('URL'); ?>articulos">Administrar Articulos</a></li>
        <li><a href="#"><?php echo $nombre; ?></a></li>
        <li><a href="<?php echo constant('URL'); ?>login/salir">Salir</a></li>
      </ul>
    <?php } else {
    ?>
      <ul class="menu_items">
        <li><a href="<?php echo constant('URL'); ?>articulos">Administrar Articulos</a></li>
        <li><a class="" href="<?php echo constant('URL'); ?>login">Iniciar Sesión</a></a></li>
        <li><a class="" href="<?php echo constant('URL'); ?>">Registrarse</a></li>
      </ul>
    <?php }
;?>
    <span class="btn_menu">
      <span class="iconify" data-icon="bx:bx-menu"></span>
    </span>
  </nav>
</div>
<script src="<?php echo constant('URL'); ?>public/js/headers/header.js"></script>