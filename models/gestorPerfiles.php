<?php

require_once "conexion.php";

class GestorPerfilesModel{

	#GUARDAR PERFIL
	#------------------------------------------------------------
	public function guardarPerfilModel($datosModel, $tabla){

		$consulta = new Consulta();

		$usu = $datosModel["usuario"];
		$usuario = $consulta->ver_registros("select usuario from $tabla where usuario = '$usu'");

		if(count($usuario) == 0){


			$usuario = $datosModel["usuario"];
			$password = $datosModel["password"];
			$email = $datosModel["email"];
			$photo = $datosModel["photo"];
			$rol = $datosModel["rol"];

			$consulta->guardar_registro("INSERT INTO $tabla (usuario, password, email, photo, rol) VALUES ('$usuario', '$password', '$email', '$photo', '$rol')");


			return "ok";
		
		}else{
			return "Este usuario ya existe";
		}

	}

	#VISUALIZAR PERFILES
	#------------------------------------------------------
	public function verPerfilesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password,  email, rol, photo FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}

	#ACTUALIZAR PERFIL
	#---------------------------------------------------
	public function editarPerfilModel($datosModel, $tabla){

		$consulta = new Consulta();


		$usuario = $datosModel["usuario"];
		$password = $datosModel["password"];
		$email = $datosModel["email"];
		$rol = $datosModel["rol"];
		$id = $datosModel["id"];


		$consulta->actualizar_registro("UPDATE $tabla SET usuario = '$usuario', password = '$password', email = '$email', rol = '$rol' WHERE id = '$id'");	


		
		return "ok";
		

	}

	#BORRAR PERFIL
	#-----------------------------------------------------
	public function borrarPerfilModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	
	#CAMBIAR FOTO
	public function cambiarFoto($ruta){

		$consulta = new Consulta();

		$id = $_SESSION["id"];


		$item = $consulta->ver_registros("select photo from usuarios where id= '$id'");

		if($item[0]["photo"] != "views/images/perfiles/user.png"){
			unlink("../../".$item[0]["photo"]);
		}



		$consulta->actualizar_registro("update usuarios set photo = '$ruta' where id= '$id'");

		$_SESSION["photo"] = $ruta;
		return "ok";
	
	}



}