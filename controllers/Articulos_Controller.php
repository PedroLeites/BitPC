<?php
require_once 'entidades/articulo.php';
require_once 'utils/Utils.php';
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';

class Articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    //http://localhost/proyectofinal3bj/BitPC/articulos
    public function render()
    {
        //$articulos             = $this->model->get();
        //$this->view->articulos = $articulos;
        //$this->view->render('articulos/index');
        try {
            //code...
            $token = $_SESSION["token"];
            //$token    = substr($tokenAux, 7, strlen($tokenAux));
            Auth::Check($token);
            $role = Auth::GetData($token)->rol;
            if ($role != 'admin') {
                throw new Exception("no tiene autorizacion");
            }
            $articulos             = $this->model->get();
            $this->view->articulos = $articulos;
            $this->view->render('articulos/index');
        } catch (Exception $th) {
            $this->view->mensaje = "no autorizado";
            $this->view->render('errores/index');
        }
    }

    public function verArticulo($param = null)
    {
        $idArticulo = $param[0];
        $articulo   = $this->model->verArticulo($idArticulo);

        $_SESSION["id_articulo"] = $idArticulo;

        $this->view->articulo = $articulo;
        $this->view->render('articulos/verArticulo');
    }

    public function actualizar($param = null)
    {
        //var_dump($_POST);
        $resultado = true;
        try {
            $articulo              = new Articulo();
            $articulo->id          = $_POST['articuloId'];
            $articulo->nombre      = $_POST['nombre'];
            $articulo->descripcion = $_POST['descripcion'];
            $precioSF              = $_POST['precio'];
            $precio                = floatval($precioSF);
            $articulo->precio      = number_format((float) $precio, 2, '.', '');
            $articulo->estado      = $_POST['estado'];
            $articulo->stock       = $_POST['stock'];
            $articulo->categoria   = $_POST['categoria'];
            $pathImg               = $_FILES['img']['tmp_name'];
            $tmpName               = $_FILES['img']['name'];
            $array                 = explode(".", $tmpName);
            $ext                   = $array[count($array) - 1];
            $ruta                  = 'public/img/articulos/' . $articulo->id . "." . $ext;
            $articulo->url         = $ruta;
            $resultado             = $this->model->actualizar($articulo);
            move_uploaded_file($pathImg, $ruta);
        } catch (\Throwable $th) {
            $resultado = false;
        }
        $this->view->respuesta = $resultado;
        $this->view->render('articulos/actualizar');
    }

    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->listar();
        //lo asigna a la varible articulos
        $this->view->articulos = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
    }

    public function crear()
    {
        $this->view->render('articulos/crear');
    }

    public function creado()
    {
        $llegoImg     = false;
        $nombreImagen = $_FILES['img']['name'];
        if ($nombreImagen != "") {
            $llegoImg = true;
        }
        //$llegoImg              = $_FILES['img']['tmp_name']['error'];
        $articulo              = new Articulo();
        $articulo->nombre      = $_POST['nombre'];
        $articulo->descripcion = $_POST['descripcion'];
        $articulo->precio      = $_POST['precio'];
        $articulo->estado      = $_POST['estado'];
        $articulo->stock       = $_POST['stock'];
        $articulo->categoria   = $_POST['categoria'];
        $pathImg               = $_FILES['img']['tmp_name'];
        $tmpName               = $_FILES['img']['name'];
        $array                 = explode(".", $tmpName);
        $ext                   = $array[count($array) - 1];
        $rutaBase              = 'public/img/articulos/';
        $articulo->urlBase     = $rutaBase;
        $articulo->ext         = $ext;
        $resultado             = $this->model->creado($articulo, $llegoImg);
        if ($llegoImg) {
            move_uploaded_file($pathImg, $rutaBase . $resultado . "." . $ext);
        }

        $this->view->respuesta = $resultado;
        $this->view->render('articulos/creado');
    }

    public function buscar()
    {
        try {
            $texto                 = $_POST['textoBuscador'];
            $this->view->articulos = $resultado = $this->model->buscar($texto);
            $estaLogueado          = isset($_SESSION["estalogueado"]) ? $_SESSION["estalogueado"] : false;
            if ($estaLogueado == true) {
                $token = $_SESSION["token"];
                Auth::Check($token);
                $role = Auth::GetData($token)->rol;
                if ($role == 'admin') {
                    $this->view->respuesta = $resultado;
                    $this->view->render('articulos/buscar');
                } else {
                    $this->view->respuesta = $resultado;
                    $this->view->render('articulos/buscarProd');
                }
            } else {
                $this->view->respuesta = $resultado;
                $this->view->render('articulos/buscarProd');
            }
        } catch (Exception $th) {
            $resultado = false;
        }

    }

    public function filtar($param = null)
    {
        # code...
    }

    public function verInfo($param = null)
    {
        $idArticulo = $param[0];
        $articulo   = $this->model->verInfo($idArticulo);

        $_SESSION["id_articulo"] = $idArticulo;

        $this->view->articulo = $articulo;
        $this->view->render('articulos/verInfo');
    }

}