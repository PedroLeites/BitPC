<?php

require_once 'controllers/Errores_Controller.php';

class App
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            $archivoController = 'controllers/Index_Controller.php';
            require $archivoController;
            $controller = new Index_Controller();
            $controller->loadModel('index');
            $controller->render();
            return false;
        } else {
            $archivoController = 'controllers/' . ucfirst($url[0]) . '_Controller.php';
        }

        //var_dump($archivoController);
        if (file_exists($archivoController)) {

            //var_dump($archivoController);
            require $archivoController;

            //var_dump($archivoController);
            $controllerName = ucfirst($url[0]) . '_Controller';
            //var_dump($controllerName);
            //$controller = new $url[0]();
            $controller = new $controllerName();

            $controller->loadModel($url[0]);

            // Se obtienen el número de param
            $nparam = sizeof($url);
            // si se llama a un método
            if ($nparam > 1) {
                // hay parámetros
                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else {
                    // solo se llama al método
                    $controller->{$url[1]}();
                }
            } else {
                // si se llama a un controlador, por defecct
                //echo "<b>ejecuta el metodo por defecto</b>";
                //var_dump($controller);
                $controller->render();
            }
        } else {
            $controller = new Errores_Controller();
        }
    }
}
