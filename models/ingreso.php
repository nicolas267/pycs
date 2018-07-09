<?php

require_once "conexion.php";

class IngresoModels{

	public function ingresoModel($datosModel, $tabla){

		$consulta = new Consulta();

		$usuario = $datosModel["usuario"];

		$stmt = $consulta->ver_registros("SELECT * FROM $tabla WHERE usuario = '$usuario'");


		return $stmt;

	}

	public function intentosModel($datosModel, $tabla){

		$consulta = new Consulta();

		$intentos = $datosModel["actualizarIntentos"];
		$usuario = $datosModel["usuarioActual"];

		$stmt = $consulta->actualizar_registro("UPDATE $tabla SET intentos = '$intentos' WHERE usuario = '$usuario'");


		return "ok";

	}

}