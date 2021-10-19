<?php

class Registro_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoRegistro = "";
    }

    public function render()
    {
        $this->view->render('registro/index');
    }

}
