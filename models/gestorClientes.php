<?php 

class GestorClientesModel{

	public function guardarCliente(){
		$consulta = new Consulta();

		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$sexo = $_POST["sexo"];
		$fechaN = $_POST["fechaNacimiento"];
		$email = $_POST["email"];
		$dni = $_POST["dni"];
		$tel1 = $_POST["telefono1"];
		$tel2 = $_POST["telefono2"];
		$direc1 = $_POST["direccion1"];
		$direc2 = $_POST["direccion2"];
		$idNaci = $_POST["pais"];
		$idciudad = $_POST["ciudad"];
		$cliente = $_POST["cliente"];
		$proveedor = $_POST["proveedor"];
		$oferta = ($proveedor == 'on') ? 1 : 0;
		$demanda = ($cliente == 'on') ? 1 : 0;
		$rutaDDBB = '';


		$filtro = filter_var($email, FILTER_VALIDATE_EMAIL);

		if ($filtro != false) {


			if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
			

				$aleatorio = mt_rand(100, 9999);

				$rutaDDBB = "views/images/fotosClientes/fotoCliente".$aleatorio.".jpg"; 

				move_uploaded_file($_FILES["foto"]["tmp_name"],'../../' . $rutaDDBB);

			}


			$consulta->guardar_registro("INSERT INTO clientes (nombre, apellido,dni,sexo, fechanacimiento, email,telefono1,telefono2,direccion1,direccion2,idnacionalidad,idciudad,oferta,demanda,foto) VALUES ('$nombre', '$apellido', '$dni', '$sexo', '$fechaN', '$email', '$tel1', '$tel2', '$direc1', '$direc2', '$idNaci','$idciudad','$oferta','$demanda','$rutaDDBB')");

			return 'ok';
		}else{
			$error['texto'] = "Correo no válido";
			$error["id"] = "contentEmail";
			return $error;
		}
		
	
	}

	public function verClientes(){
		$consulta = new Consulta();

		$registros = $consulta->ver_registros("select * from clientes inner join ciudades on clientes.idciudad = ciudades.idciudad inner join provincias on ciudades.idprovincia = provincias.idprovincia");

		return $registros;
	}

	public function verCliente(){
		$consulta = new Consulta();

		$idCliente = $_POST["idCliente"];

		$registros = $consulta ->ver_registros("select * from clientes inner join ciudades on clientes.idciudad = ciudades.idciudad inner join provincias on ciudades.idprovincia = provincias.idprovincia where clientes.idcliente = '$idCliente'");

		$idProvincia = $registros[0]["idprovincia"];


		$provincias = $consulta ->ver_registros("select * from provincias");
		$ciudades = $consulta ->ver_registros("select * from ciudades where idprovincia= '$idProvincia'");

		$array["cliente"] = $registros;
		$array["provincias"] = $provincias;
		$array["ciudades"] = $ciudades;

		return $array;
	}

	public function borrarCliente(){
		$consulta = new Consulta();

		$idCliente = $_POST["idCliente"];

		$foto = $consulta ->ver_registros("select foto from clientes where idcliente = '$idCliente'");

		if (file_exists("../../".$foto[0]["foto"])) {
			unlink("../../".$foto[0]["foto"]);
		}

		$consulta -> borrar_registro("delete from clientes where idcliente = '$idCliente'");

		return 'ok';
	}
	public function actualizarCliente(){
		$consulta = new Consulta();

		$nombre = $_POST["nuevoNombre"];
		$apellido = $_POST["nuevoApellido"];
		$sexo = $_POST["sexo"];
		$fechaN = $_POST["nuevaFechaNacimiento"];
		$email = $_POST["nuevoEmail"];
		$dni = $_POST["nuevoDni"];
		$tel1 = $_POST["nuevoTelefono1"];
		$tel2 = $_POST["nuevoTelefono2"];
		$direc1 = $_POST["nuevaDireccion1"];
		$direc2 = $_POST["nuevaDireccion2"];
		$idNaci = $_POST["nuevoPais"];
		$idciudad = $_POST["nuevaCiudad"];
		$id = $_POST["idcliente"];
		$cliente = $_POST["nuevoCliente"];
		$proveedor = $_POST["nuevoProveedor"];
		$oferta = ($proveedor == 'on') ? 1 : 0;
		$demanda = ($cliente == 'on') ? 1 : 0;
		$rutaDDBB = '';

		
		$filtro = filter_var($email, FILTER_VALIDATE_EMAIL);

		if ($filtro != false) {

			if (is_uploaded_file($_FILES["nuevaFoto"]["tmp_name"])) {
			

				$aleatorio = mt_rand(100, 9999);

				$rutaDDBB = "views/images/fotosClientes/fotoCliente".$aleatorio.".jpg"; 

				move_uploaded_file($_FILES["nuevaFoto"]["tmp_name"],'../../' . $rutaDDBB);

				$consulta -> actualizar_registro("UPDATE clientes set foto = '$rutaDDBB' where idcliente = '$id'");

			}



			$consulta->actualizar_registro("UPDATE clientes set nombre = '$nombre', apellido = '$apellido',dni = '$dni',sexo = '$sexo', fechanacimiento = '$fechaN', email = '$email', telefono1 ='$tel1',telefono2 = '$tel2',direccion1 = '$direc1', direccion2 = '$direc2', idnacionalidad = '$idNaci', idciudad = '$idciudad', oferta = '$oferta', demanda = '$demanda' where idcliente = '$id'");

			return 'ok';
		}else{
			$error['texto'] = "Correo no válido";
			$error["id"] = "contentEmailActualizar";
			return $error;
		}

	
	}

}