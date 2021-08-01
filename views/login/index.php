<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
</head>
<body>
<div>
    <div>
        <div>
            <h1>Login</h1>
        </div>
    </div>
    <div>
        <div>
            <h1><?php echo $this->resultadoLogin; ?></h1>
        </div>
    </div>
        <form action="<?php echo constant('URL'); ?>login/ingresar" method="post">
        <div>
            <label for="username">Nombre de usuario</label>
            <input type="text" id="username" name="nombre">
        </div>
        <div>
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="pass">
        </div>
        <div>
            <button type="submit">Ingresar</button>
        </div>
        </form>
    </div>
</body>
</html>