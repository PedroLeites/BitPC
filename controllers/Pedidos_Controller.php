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
        try {
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
            $this->view->mensaje = "no autorizado";
            $this->view->render('errores/index');
        }
    }

    public function cambiarEstado($param = null)
    {
        $idPedido = $param[0];
        $pedido   = $this->model->cambiarEstado($idPedido);

        $_SESSION["id_pedido"] = $idPedido;

        $this->view->pedido = $pedido;
        $this->view->render('pedidos/cambiarEstado');
    }

    public function actualizar($param = null)
    {
        //var_dump($_POST);
        $resultado = true;
        try {
            $articulo         = new Articulo();
            $articulo->estado = $_POST['estado'];
            $resultado        = $this->model->actualizar($articulo);
            move_uploaded_file($pathImg, $ruta);
        } catch (\Throwable $th) {
            $resultado = false;
        }
        $this->view->respuesta = $resultado;
        $this->view->render('pedidos/actualizar');
    }

}