<?php

class Pedidos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->articulos = $this->model->get();
        $this->view->render('pedidos/index');
        //var_dump($this);
        //var_dump($this->view);
    }

}
