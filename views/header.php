<div>
  <nav>
   <div id="menu-container">
    <ul>
      <li>BIT PC</li>
      <li><a href="<?php echo constant('URL'); ?>index">Inicio</a></li>
      <li><a href="<?php echo constant('URL'); ?>index">Tienda</a></li>
    </ul>
   </div>
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
          <a class="btn btn-outline-light mx-2" href="<?php echo constant('URL'); ?>login">Ingresar</a>
<?php }
;?>
   </div>
  </nav>
</div>