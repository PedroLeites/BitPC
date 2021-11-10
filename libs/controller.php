<?php

//"importando" la libreria
require_once 'traduccion/Translate.php';
use \SimpleTranslation\Translate;

//manejo de cookies
$idioma = $_COOKIE['idioma'] ?? "es";
Translate::init($idioma, "lang/" . $idioma . ".php");

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
        session_start();
        //echo "<p>Controlador principal</p>";
    }

    //carga el modelo si existe
    public function loadModel($model)
    {
        //var_dump($this);

        $url = 'models/' . ucfirst($model) . '_Model.php';
        //$url = 'models/' . ucfirst($model) . '_Model.php';
        //var_dump($url);

        if (file_exists($url)) {
            require $url;

            $modelName   = ucfirst($model) . '_Model';
            $this->model = new $modelName();
        }
    }
}