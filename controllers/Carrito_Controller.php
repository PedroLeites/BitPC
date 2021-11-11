<?php
require_once 'entidades/articulos.php';

class Carrito_Controller extends Controller
{
    public function __construct()
    {

        parent::__construct();
        $cambio = "a eliminar";
        $this->view->mensaje = "";
    }

    //http://localhost/proyectofinal3bj/BitPC/carrito
    public function render()
    {
        $this->view->render('carrito/index');
    }

}
