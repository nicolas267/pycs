<?php 

class GestorTerritorioController{


	public function verProvincias(){
		$provincias = GestorTerritorioModel::verProvincias();

		if (count($provincias) != 0) {
			
			for($i = 0; $i < count($provincias); $i++){
				echo '
					
					<option value="' . $provincias[$i]["idprovincia"] . '">
					
						' . $provincias[$i]["provincia"] . '

					</option>

				';
			}
		}
	}

	public function verProvinciasInhabilitadas(){
		$provincias = GestorTerritorioModel::verProvinciasInhabilitadas();

		if (count($provincias) != 0) {
			
			for($i = 0; $i < count($provincias); $i++){
				echo '
					
					<option value="' . $provincias[$i]["idprovincia"] . '">
					
						' . $provincias[$i]["provincia"] . '

					</option>

				';
			}
		}
	}

	public function agregarProvincia(){
		$respuesta = GestorTerritorioModel::agregarProvincia();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
	}


	public function inhabilitarProvincia(){
		$respuesta = GestorTerritorioModel::inhabilitarProvincia();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
	}
	public function habilitarProvincia(){
		$respuesta = GestorTerritorioModel::habilitarProvincia();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
	}
	public function eliminarProvincia(){
		$respuesta = GestorTerritorioModel::eliminarProvincia();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
	}
	public function agregarCiudad(){
		$respuesta = GestorTerritorioModel::agregarCiudad();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
	}
	public function inhabilitarCiudad(){
		$respuesta = GestorTerritorioModel::inhabilitarCiudad();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
	}

}