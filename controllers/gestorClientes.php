<?php 


class GestorClientesController{
	public function guardarCliente(){
		$respuesta = GestorClientesModel::guardarCliente();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
	}

	public function verClientes(){

		$registros = GestorClientesModel::verClientes();


		for($i = 0; $i < count($registros); $i++) {
			echo '
				<tr>
					<td>'.$registros[$i]['nombre'].'</td>
					<td>'.$registros[$i]['apellido'].'</td>
					<td>'.$registros[$i]['dni'].'</td>
					<td>'.$registros[$i]['email'].'</td>
					<td>'.$registros[$i]['telefono1'].'</td>
					<td>'.$registros[$i]['provincia'].'</td>
					<td>'.$registros[$i]['ciudad'].'</td>
					<td>
						<ul class="list-unstyled list-inline" style="display: inline-flex;">
						<li>
							<a class="btn btn-xs btn-info verInfoCliente" accesskey="'.$registros[$i]["idcliente"].'" href="#">
								Ver
							</a>
						</li>
						<li>
							<button class="btn btn-xs btn-primary editarCliente" accesskey="'.$registros[$i]["idcliente"].'">
								Editar
							</button>
						</li>
						<li>
							<button class="btn btn-xs btn-danger borrarCliente" accesskey="'.$registros[$i]["idcliente"].'">
								Borrar
							</button>
						</li>
						</ul>
						
					</td>
				</tr>
			';
		}

	}

	public function verCliente(){
		$respuesta = GestorClientesModel::verCliente();

		return $respuesta;
	}
	public function borrarCliente(){
		$respuesta = GestorClientesModel::borrarCliente();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
		
	}
	public function actualizarCliente(){

		$respuesta = GestorClientesModel::actualizarCliente();

		if ($respuesta == 'ok') {
			$array["resp"] = 'ok';
			return $array;
		}else{
			return $respuesta;
		}
		
	}
	
}