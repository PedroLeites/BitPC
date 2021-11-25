<?php
require_once 'utils/Utils.php';
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';
require_once 'entidades/pedido.php';
//require_once 'models/Pedidos_Model.php';

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
        $idPedido              = $param[0];
        $estado                = $param[1];
        $this->view->estado    = $estado;
        $estadoNuevo           = ($estado == "pendiente") ? "entregado" : "pendiente";
        $pedido                = $this->model->cambiarEstado($idPedido, $estadoNuevo);
        $_SESSION["id_pedido"] = $idPedido;
        $this->view->pedido    = $pedido;
        $pedidoModelUnico      = new Pedidos_Model();
        $this->view->articulos = $pedidoModelUnico->get();
        $this->view->render('pedidos/index');
    }

    public function verDetalle($param = null)
    {
        $idPedido = $param[0];
        $res      = $this->model->verDetalle($idPedido);
        //$_SESSION["id_pedido"] = $idPedido;
        $this->view->articulo = $res->lista;
        $this->view->total    = $res->total;

        $this->view->render('pedidos/verDetalle');
    }

    public function historial()
    {
        $token = $_SESSION["token"];
        Auth::Check($token);
        $idUser                = Auth::GetData($token)->id;
        $this->view->articulos = $this->model->historial($idUser);
        $this->view->render('pedidos/historial');
    }

}