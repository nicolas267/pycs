
<?php 


class GestorTerritorioModel{

	public function verProvincias(){
		$consulta = new Consulta();

		$stmt = $consulta->ver_registros("SELECT * FROM provincias where borrado = '0'");

		return $stmt;
	}


	public function verProvinciasDeCiudadesInhabilitadas(){
		$consulta = new Consulta();

		$stmt = $consulta->ver_registros("SELECT * FROM provincias inner join ciudades on provincias.idprovincia = ciudades.idprovincia where ciudades.borrado = 1");

		return $stmt;
	}

	public function verProvinciasInhabilitadas(){
		$consulta = new Consulta();

		$stmt = $consulta->ver_registros("SELECT * FROM provincias where borrado = '1'");

		return $stmt;
	}

	public function verCiudadesInhabilitadas(){
		$consulta = new Consulta();

		$provincia = $_POST["idProvincia"];

		$stmt = $consulta->ver_registros("SELECT * FROM ciudades where borrado = '1' and idprovincia = '$provincia'");

		return $stmt;
	}
	public function agregarProvincia(){
		$consulta = new Consulta();

		$pais = $_POST["pais"];
		$provincia = $_POST["nuevaProvincia"];

		$consulta->guardar_registro("insert into provincias (provincia , idpais, borrado) values ('$provincia','$pais', 0 )");

		return 'ok';
	}
	public function inhabilitarProvincia(){
		$consulta = new Consulta();

		$pais = $_POST["pais2"];
		$provincia = $_POST["provinciaInhabilitar"];

		$consulta->actualizar_registro("update provincias set borrado= 1 where idprovincia = '$provincia' and idpais = '$pais'");

		$consulta->actualizar_registro("update ciudades set borrado= 1 where idprovincia = '$provincia'");

		return 'ok';
	}
	public function habilitarProvincia(){
		$consulta = new Consulta();

		$pais = $_POST["paisA"];
		$provincia = $_POST["provinciaHabilitar"];

		$consulta->actualizar_registro("update provincias set borrado= 0 where idprovincia = '$provincia' and idpais = '$pais'");
		$consulta->actualizar_registro("update ciudades set borrado= 0 where idprovincia = '$provincia'");

		return 'ok';
	}
	public function eliminarProvincia(){
		$consulta = new Consulta();

		$pais = $_POST["paisE"];
		$provincia = $_POST["provinciaEliminar"];

		$consulta->borrar_registro("delete from provincias where idprovincia = '$provincia' and idpais = '$pais'");
		$consulta->borrar_registro("delete from ciudades where idprovincia = '$provincia'");

		return 'ok';
	}

	public function verCiudades(){
		$consulta = new Consulta();

		$idProvincia =$_POST["idProvincia"];

		$stmt = $consulta->ver_registros("SELECT * FROM ciudades where idprovincia = '$idProvincia' and borrado = '0'");

		return $stmt;
	}
	public function agregarCiudad(){
		$consulta = new Consulta();

		$provincia = $_POST["provinciaC"];
		$ciudad = $_POST["nuevaCiudad"];

		$consulta->guardar_registro("insert into ciudades (idprovincia , ciudad,borrado) values ('$provincia','$ciudad', 0 )");

		return 'ok';
	}

	public function habilitarCiudad(){
		$consulta = new Consulta();

		$provincia = $_POST["provinciaCiudadHabilitar"];
		$ciudad = $_POST["ciudad"];


		$consulta->actualizar_registro("update ciudades set borrado= 0 where idciudad = '$ciudad' and idprovincia = '$provincia'");
		$consulta->actualizar_registro("update provincias set borrado= 0 where idprovincia = '$provincia'");

		return 'ok';
	}

	public function inhabilitarCiudad(){
		$consulta = new Consulta();

		$provincia = $_POST["provinciaI"];
		$ciudad = $_POST["ciudad"];


		$consulta->actualizar_registro("update ciudades set borrado= 1 where idciudad = '$ciudad' and idprovincia = '$provincia'");

		return 'ok';
	}

	public function eliminarCiudad(){
		$consulta = new Consulta();

		$provincia = $_POST["provinciaE"];
		$ciudad = $_POST["ciudad"];

		$consulta->borrar_registro("delete from ciudades where idciudad = '$ciudad' and idprovincia = '$provincia'");

		return 'ok';
	}

}