<!DOCTYPE html>
<html lang="es">
<head>
<title>BIT PC - LogIn</title>
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login/login.css">
</head>
<body>
<?php require 'views/header.php';?>
<?php require_once 'views/buscador.php';?>
    <div>
        <h1><?php echo $this->resultadoLogin; ?></h1>
    </div>
    <div id="form-container">
        <form id="form-login" action="<?php echo constant('URL'); ?>login/ingresar" method="post">
            <h1>Ingrese sus datos</h1>
            <input class="input-login" type="text" id="username" name="nombre" placeholder="Correo Electrónico">
            <input class="input-login" type="password" id="password" name="pass" placeholder="Contraseña">
            <button type="submit">Iniciar Sesión</button>
            <p>¿No tienes una cuenta? <a id="registro-link" href="<?php echo constant('URL'); ?>registro">Regístrate</a></p>
        </form>
    </div>
    <?php require 'views/footer.php';?>
</body>
</html>