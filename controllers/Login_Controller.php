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
        $Nombre = $_POST['Nombre'];
        $Contrasena = $_POST['Contrasena'];
        $exitoLogin = $this->model->ingresar($Nombre, $Contrasena);
        if ($exitoLogin) {
            $_SESSION["estalogueado"] = true;
            $_SESSION["Nombre"] = $Nombre;
            $this->view->render('login/ingresar');
        } else {
            $this->view->resultadoLogin = "Nombre de usuario o contraseña incorrectos";
            $this->view->render('login/index');
        }
    }

    public function salir()
    {
        $_SESSION["estalogueado"] = false;
        unset($_SESSION["Nombre"]);
        $this->view->render('index/index');
    }
}
