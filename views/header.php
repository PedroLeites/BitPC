<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/header.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/main.css">
<link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
<div id="header-principal">
  <nav>
  <div id="menu-container">
  <div id="logo-container">
     <img src="<?php echo constant('URL'); ?>public/img/logos/logo-nav.png" height="auto" width="200px">
   </div>
   <ul>
      <li><a href="<?php echo constant('URL'); ?>index"><b>Inicio</b></a></li>
      <li><a href="<?php echo constant('URL'); ?>articulos/listar"><b>Tienda</b></a></li>
      <li><a href="<?php echo constant('URL'); ?>articulos"><b>Administrar Articulos</b></a></li>
    </ul>
    <div id="user-menu">
    <?php

if (isset($_SESSION["estalogueado"])) {
    $estaLogueado = $_SESSION["estalogueado"];
} else {
    $estaLogueado = false;
}
$estaLogueado = isset($_SESSION["estalogueado"]) ? $_SESSION["estalogueado"] : false;
if ($estaLogueado) {
    ?><?php $nombre = $_SESSION["nombre"];?>
        <a href="#"><?php echo $nombre; ?></a>
        <a href="<?php echo constant('URL'); ?>login/salir">Salir</a>
  <?php } else {
    ?>
          <a class="" href="<?php echo constant('URL'); ?>login"><b>Ingresar</b></a>
          <a class="" href="<?php echo constant('URL'); ?>"><b>Registrarse</b></a>
<?php }
;?>
   </div>
   </div>
  </nav>
</div>