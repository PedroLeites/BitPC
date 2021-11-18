<?php
require_once 'utils/Utils.php';
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';

class Pedidos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        //$this->view->articulos = $this->model->get();
        //$this->view->render('pedidos/index');
        try {
            //code...
            $token = $_SESSION["token"];
            //$token    = substr($tokenAux, 7, strlen($tokenAux));
            Auth::Check($token);
            $role = Auth::GetData($token)->rol;
            if ($role != 'admin') {
                throw new Exception("no tiene autorizacion");
            }
            $this->view->articulos = $this->model->get();
            $this->view->render('pedidos/index');
        } catch (Exception $e) {
            //throw $e;
            $this->view->mensaje = "no autorizado";
            $this->view->render('errores/index');
        }
        //var_dump($this);
        //var_dump($this->view);
    }

}