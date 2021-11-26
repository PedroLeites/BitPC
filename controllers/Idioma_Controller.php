<?php
class Idioma_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('idioma/index');
    }

    public function cambiarIdioma()
    {
        $idioma02 = $_POST['idioma'] ?? "es";
        setcookie("idioma", $idioma02, time() + 60 * 60 * 24 * 365, "/");
        //var_dump($_POST);
        $this->view->idioma = $idioma02;
        $this->view->render('idioma/cambiarIdioma');
    }

}