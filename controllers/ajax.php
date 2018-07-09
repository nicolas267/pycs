<?php 

class AjaxController{
	public function verProvinciasAjax(){
		$respuesta = GestorTerritorioModel::verProvincias();
		return $respuesta;
	}
	public function verCiudadesAjax(){
		$respuesta = GestorTerritorioModel::verCiudades();
		return $respuesta;
	}
}