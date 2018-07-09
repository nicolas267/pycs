<?php
session_start();
class Ingreso{

	public function ingresoController(){


		if(isset($_POST["usuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])){

			   	//$encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("usuario"=>$_POST["usuario"],
				                     "password"=>$_POST["password"]);

				$respuesta = IngresoModels::ingresoModel($datosController, "usuarios");
				
				$intentos = $respuesta["intentos"];
				$usuarioActual = $_POST["usuario"];

				$maximoIntentos = 2;

				if($intentos < $maximoIntentos){

					var_dump($respuesta);

					if($respuesta[0]["usuario"] == $_POST["usuario"] && password_verify($_POST["password"], $respuesta[0]["password"])){

						echo "string";

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);
						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

					
						

						$_SESSION["validar"] = true;
						$_SESSION["usuario"] = $respuesta[0]["usuario"];
						$_SESSION["id"] = $respuesta[0]["id"];
						$_SESSION["password"] = $respuesta[0]["password"];
						$_SESSION["email"] = $respuesta[0]["email"];
						$_SESSION["photo"] = $respuesta[0]["photo"];
						$_SESSION["rol"] = $respuesta[0]["rol"];

						
						header("location: index");
		
					}

					else{

						++$intentos;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

						echo '<div class="alert alert-danger">Error al ingresar</div>';

					}

				}

				else{
						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuarioActual, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "usuarios");

						echo '<div class="alert alert-danger">Ha fallado 3 veces, demuestre que no es un robot</div>';

				}

			}

		}
	}

}