<?php
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';

class Login_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->resultadoLogin = "";
    }

    public function render()
    {
        $this->view->render('login/index');
    }

    public function ingresar()
    {
        // compruebo que están llenos los campos
        if (!isset($_POST['login'])) {
            throw new Exception("no se ha iniciado sesión");
        }
        if (strlen($_POST['correo']) == 0) {
            throw new Exception("Ingrese su correo electrónico");
        }
        if (strlen($_POST['pass']) == 0) {
            throw new Exception("Ingrese su contraseña");
        }
        // $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
        $res = $this->model->ingresar($correo, $pass);
        if ($res->res) {
            $token = Auth::SignIn([
                'id' => $res->id,
                'email' => $correo,
                'rol' => $res->rol,
            ]);
            $_SESSION["estalogueado"] = true;
            $_SESSION["email"] = $correo;
            $_SESSION["rol"] = $res->rol;
            $_SESSION["id"] = $res->id;
            $_SESSION["token"] = $token;
            $this->view->token = $token;
            $this->view->render('login/ingresar');
        } else {
            $this->view->resultadoLogin = "Correo Electrónico o contraseña incorrectos";
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
