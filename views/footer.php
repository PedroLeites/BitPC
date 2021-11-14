<?php

require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

?>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/footer/footer.css">
<footer>
  <div class="row">
    <div class="logo_footer"">
      <img src=" <?php echo constant('URL'); ?>public/img/logos/logo-footer.png">
    </div>
    <div class="desc">
      <p><?php echo Translate::__('DescBIT'); ?></p>
    </div>
    <div class="redes">
      <a href="https://www.facebook.com/people/Bit-PC/100073611537474/" target="_blank"><span class="iconify social fb"
          data-icon="akar-icons:facebook-fill"></span></a>
      <a href="https://www.instagram.com/bitpc.uy/?hl=es" target="_blank"><span class="iconify social ig"
          data-icon="akar-icons:instagram-fill"></span></a>
      <a href="https://www.tiktok.com/@bitpc.uy?" target="_blank"><span class="iconify social tk"
          data-icon="bx:bxl-tiktok"></span></a>
    </div>
  </div>
  <div class="row">
    <h2><?php echo Translate::__('Contact'); ?></h2>
    <span class="iconify" data-icon="entypo:location-pin"></span>
    <input type="checkbox" id="btn-up">
    <label for="btn-up" class="up">Av. Artigas, 15900 Las Piedras, Departamento de Canelones.</label>
    <a href=""><span class="iconify" data-icon="foundation:telephone"></span> 23691032</a>
    <a href=""><span class="iconify" data-icon="akar-icons:whatsapp-fill"></span> 093343923</a>
    <a href=""><span class="iconify" data-icon="fontisto:email"></span> bitpc2021@gmail.com</a>
  </div>
  </div>
  <div class="row">
    <div class="logo_footer">
      <img src="<?php echo constant('URL'); ?>public/img/logos/code-footer.png" height="auto" width="100px">
    </div>
    <div class="desc">
      <p><?php echo Translate::__('DescCode'); ?></p>
    </div>
  </div>
</footer>
<script src="<?php echo constant('URL'); ?>/public/js/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/main/main.js"></script>
<script src="https://code.iconify.design/2/2.0.4/iconify.min.js"></script>
<!-- echo Translate::__(''); -->