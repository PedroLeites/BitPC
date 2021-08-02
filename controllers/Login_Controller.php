<?php

class Login_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";
    }

    public function render()
    {
        $this->view->render('login/index');
    }

    public function ingresar()
    {
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];
        $exitoLogin = $this->model->ingresar($nombre, $pass);
        if ($exitoLogin) {
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"] = $nombre;
            $this->view->render('login/ingresar');
        } else {
            $this->view->resultadoLogin = "Nombre de usuario o contraseña incorrectos";
            $this->view->render('login/index');
        }
    }

    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["nombre"]);
        $this->view->render('index/index');
    }
}
