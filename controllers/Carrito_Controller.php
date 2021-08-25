<?php
require_once 'entidades/articulo.php';

class Carrito_Controller extends Controller
{
    public function __construct()
    {

        $cambio = "a eliminar";
        parent::__construct();
        $this->view->mensaje = "";
    }

    //http://localhost/proyectofinal3bj/BitPC/carrito
    public function render()
    {
        $this->view->render('carrito/index');
    }

}
