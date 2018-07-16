<?php 

require_once '../../models/conexion.php';
require_once '../../models/consulta.php';
require_once '../../models/gestorTerritorio.php';
require_once '../../models/gestorPerfiles.php';
require_once '../../models/gestorClientes.php';
require_once '../../models/gestorTerritorio.php';
require_once '../../models/ingreso.php';

require_once '../../controllers/ajax.php';
require_once '../../controllers/gestorPerfiles.php';
require_once '../../controllers/gestorClientes.php';
require_once '../../controllers/gestorTerritorio.php';
require_once '../../controllers/ingreso.php';




class Ajax{

    #FUNCTIONES GESTIONAR USUARIO ACTUAL

    	public function guardarPerfilAjax(){

    		$respuesta = GestorPerfiles::guardarPerfilController();

    		echo json_encode($respuesta);

        }
    	public function cambiarFoto(){
            $respuesta = GestorPerfiles::cambiarFoto();

            echo json_encode($respuesta);
    	}
    		
    	public function actualizarInfo(){
            $respuesta = GestorPerfiles::editarPerfilController();

            echo json_encode($respuesta);
        }

    #-->

    #FUNCIONES PARA GESTIONAR CLIENTES

        public function guardarCliente(){
        	$respuesta = GestorClientesController::guardarCliente();

        	echo json_encode($respuesta);
        }
         public function verCliente(){
            $respuesta = GestorClientesController::verCliente();

            echo json_encode($respuesta);
        }
        public function borrarCliente(){
            $respuesta = GestorClientesController::borrarCliente();

            echo json_encode($respuesta);
        }
         public function actualizarCliente(){
            $respuesta = GestorClientesController::actualizarCliente();

            echo json_encode($respuesta);
        }

    #-->

    #FUNCIONES PARA GESTINAR TERRITORIO

        public function varCiudadesAjax(){
        	$respuesta = AjaxController::verCiudadesAjax();
        	echo json_encode($respuesta);
        }
        public function varCiudadesInhabilitadas(){
            $respuesta = GestorTerritorioController::varCiudadesInhabilitadas();
            echo json_encode($respuesta);
        }

        public function agregarProvincia(){
            $respuesta = GestorTerritorioController::agregarProvincia();

            echo json_encode($respuesta);
        }
        public function inhabilitarProvincia(){
            $respuesta = GestorTerritorioController::inhabilitarProvincia();

            echo json_encode($respuesta);
        }
        public function habilitarProvincia(){
            $respuesta = GestorTerritorioController::habilitarProvincia();

            echo json_encode($respuesta);
        }
        public function eliminarProvincia(){
            $respuesta = GestorTerritorioController::eliminarProvincia();

            echo json_encode($respuesta);
        }
         public function agregarCiudad(){
            $respuesta = GestorTerritorioController::agregarCiudad();

            echo json_encode($respuesta);
        }

        public function habilitarCiudad(){
            $respuesta = GestorTerritorioController::habilitarCiudad();

            echo json_encode($respuesta);
        }
        public function inhabilitarCiudad(){
            $respuesta = GestorTerritorioController::inhabilitarCiudad();

            echo json_encode($respuesta);
        }
         public function eliminarCiudad(){
            $respuesta = GestorTerritorioController::eliminarCiudad();

            echo json_encode($respuesta);
        }

    #-->
}

$ajax = new Ajax();

//ACCIONES AJAX PARA GETIONAR USUARIO ACTUAL

    if (isset($_POST['nuevoUsuario'])) {
    	$ajax -> guardarPerfilAjax();
    }
    if (isset($_POST['nuevaFoto'])) {
    	$ajax -> cambiarFoto();
    }
    if (isset($_POST['actualizarInfo'])) {
    	$ajax -> actualizarInfo();
    }
//-->

//ACCIONES AJAX PARA GESTIONAR LOS CLIENTES

    if (isset($_POST['guardarCliente'])) {
    	$ajax -> guardarCliente();
    }
    if (isset($_POST['verCliente'])) {
        $ajax -> verCliente();
    }
    if (isset($_POST['borrarCliente'])) {
        $ajax -> borrarCliente();
    }
    if (isset($_POST['actualizarCliente'])) {
        $ajax -> actualizarCliente();
    }
//-->

//ACCIONES AJAX PARA GESTIONAR TERRITORIO

    if (isset($_POST['varCiudadesAjax'])) {
    	$ajax -> varCiudadesAjax();
    }
    if (isset($_POST['varCiudadesInhabilitadas'])) {
        $ajax -> varCiudadesInhabilitadas();
    }

    if (isset($_POST['agregarProvincia'])) {
        $ajax -> agregarProvincia();
    }

    if (isset($_POST['inhabilitarProvincia'])) {
        $ajax -> inhabilitarProvincia();
    }
    if (isset($_POST['habilitarProvincia'])) {
        $ajax -> habilitarProvincia();
    }
    if (isset($_POST['eliminarProvincia'])) {
        $ajax -> eliminarProvincia();
    }
    if (isset($_POST['agregarCiudad'])) {
        $ajax -> agregarCiudad();
    }

    if (isset($_POST['habilitarCiudad'])) {
        $ajax -> habilitarCiudad();
    }

    if (isset($_POST['inhabilitarCiudad'])) {
        $ajax -> inhabilitarCiudad();
    }

    if (isset($_POST['eliminarCiudad'])) {
        $ajax -> eliminarCiudad();
    }

//-->
