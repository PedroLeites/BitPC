<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/css/main.css">
    <title>Error</title>
</head>
<body>
    <?php require 'views/header.php';?>
    <?php require_once 'views/buscador.php';?>
    <div>
        <h1>
        <?php echo $this->mensaje; ?>
        </h1>
    </div>
</body>
</html>