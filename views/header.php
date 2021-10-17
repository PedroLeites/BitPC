<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/main.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/headers/header.css">
<div id="header-principal">
  <nav>
  <div id="menu-container">
  <div id="logo-container">
     <a href="<?php echo constant('URL'); ?>index"><img src="<?php echo constant('URL'); ?>public/img/logos/logo-nav.png" height="auto" width="200px"></a>
   </div>
   <ul>
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
          <a class="" href="<?php echo constant('URL'); ?>login"><b>Iniciar Sesión</b></a>
          <a class="" href="<?php echo constant('URL'); ?>"><b>Registrarse</b></a>
<?php }
;?>
   </div>
   </div>
  </nav>
</div>