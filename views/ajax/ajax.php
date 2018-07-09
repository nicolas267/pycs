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

    public function guardarCliente(){
    	$respuesta = GestorClientesController::guardarCliente();

    	echo json_encode($respuesta);
    }
    public function varCiudadesAjax(){
    	$respuesta = AjaxController::verCiudadesAjax();
    	echo json_encode($respuesta);
    }
    public function varCiudadesInhabilitadas(){
        $respuesta = GestorTerritorioController::varCiudadesInhabilitadas();
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
}


if (isset($_POST['nuevoUsuario'])) {
	$a = new Ajax();
	$a -> guardarPerfilAjax();
}
if (isset($_POST['ingresar'])) {
	$b = new Ajax();
	$b -> ingresar();
}
if (isset($_POST['nuevaFoto'])) {
	$c = new Ajax();
	$c -> cambiarFoto();
}
if (isset($_POST['actualizarInfo'])) {
	$d = new Ajax();
	$d -> actualizarInfo();
}
if (isset($_POST['guardarCliente'])) {
	$e = new Ajax();
	$e -> guardarCliente();
}
if (isset($_POST['varCiudadesAjax'])) {
	$f = new Ajax();
	$f -> varCiudadesAjax();
}
if (isset($_POST['varCiudadesInhabilitadas'])) {
    $f = new Ajax();
    $f -> varCiudadesInhabilitadas();
}
if (isset($_POST['verCliente'])) {
	$h = new Ajax();
	$h -> verCliente();
}
if (isset($_POST['borrarCliente'])) {
	$i = new Ajax();
	$i -> borrarCliente();
}
if (isset($_POST['actualizarCliente'])) {
	$j = new Ajax();
	$j -> actualizarCliente();
}

if (isset($_POST['agregarProvincia'])) {
    $k = new Ajax();
    $k -> agregarProvincia();
}

if (isset($_POST['inhabilitarProvincia'])) {
    $l = new Ajax();
    $l -> inhabilitarProvincia();
}
if (isset($_POST['habilitarProvincia'])) {
    $l = new Ajax();
    $l -> habilitarProvincia();
}
if (isset($_POST['eliminarProvincia'])) {
    $l = new Ajax();
    $l -> eliminarProvincia();
}
if (isset($_POST['agregarCiudad'])) {
    $m = new Ajax();
    $m -> agregarCiudad();
}

if (isset($_POST['habilitarCiudad'])) {
    $m = new Ajax();
    $m -> habilitarCiudad();
}

if (isset($_POST['inhabilitarCiudad'])) {
    $m = new Ajax();
    $m -> inhabilitarCiudad();
}

if (isset($_POST['eliminarCiudad'])) {
    $l = new Ajax();
    $l -> eliminarCiudad();
}



