<?php

class Registro_Controller extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->resultadoRegistro = "";
    }

    public function render()
    {
        $this->view->render('registro/index');
    }

    public function registrarse()
    {
        try {
            if (!isset($_POST['registrarse'])) {
                throw new Exception("no se ha registrado");
            }
            if (strlen($_POST['correo']) == 0) {
                throw new Exception("Ingrese su correo electrónico");
            }
            if (strlen($_POST['nombre']) == 0) {
                throw new Exception("Debe ingresar su nombre");
            }
            if (strlen($_POST['apellido']) == 0) {
                throw new Exception("Debe ingresar su apellido");
            }
            if (strlen($_POST['fechanac']) == 0) {
                throw new Exception("Debe ingresar su fecha de nacimiento");
            }
            if (strlen($_POST['direccion']) == 0) {
                throw new Exception("Debe ingresar su dirección");
            }
            if (strlen($_POST['telefono']) == 0) {
                throw new Exception("Debe ingresar su teléfono");
            }
            if (strlen($_POST['password']) == 0) {
                throw new Exception("Debe ingresar una contraseña");
            }
            $correo    = $_POST['correo'];
            $nombre    = $_POST['nombre'];
            $apellido  = $_POST['apellido'];
            $fechanac  = $_POST['fechanac'];
            $direccion = $_POST['direccion'];
            $telefono  = $_POST['telefono'];
            $password  = $_POST['password'];
            $resultado = $this->model->registrarse($correo, $nombre, $apellido, $fechanac, $direccion, $telefono, $password);
            if ($resultado->resultado) {
                $this->view->nombre = $nombre;
                $this->view->render('registro/registrado');
            } else {

                $this->view->resultadoRegistro = "Debe compretar todos los campos del formulario";
                $this->view->render('registro/index');
            }
        } catch (Exception $ex) {
            //throw $th;
            $this->view->error = $ex->getMessage();
        }
        // compruebo si se apretó el botón
    }
}