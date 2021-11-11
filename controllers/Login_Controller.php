<?php
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';

class Login_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }

    public function render()
    {
        $this->view->render('login/index');
    }

    public function ingresar()
    {
        $nombre = $_POST['nombre'];
        $pass   = $_POST['pass'];
        $res    = $this->model->ingresar($nombre, $pass);
        if ($res->res) {
            $token = Auth::SignIn([
                'id' => $res->id,
                'name' => $nombre,
                'rol' => $res->rol,
            ]);
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"]       = $nombre;
            $_SESSION["rol"]          = $res->rol;
            $_SESSION["token"]        = $token;
            $this->view->token        = $token;
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
        $_SESSION["token"] = null;
        $this->view->render('index/index');
    }
}