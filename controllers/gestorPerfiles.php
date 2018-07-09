<?php

class GestorPerfiles{

	#GUARDAR PERFIL
	#------------------------------------------------------------
	public function guardarPerfilController(){

		$ruta = "";

		if(isset($_POST["nuevoUsuario"])){	

			if($_FILES["nuevaImagen"]["tmp_name"] != ""){

				$imagen = $_FILES["nuevaImagen"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				if (is_uploaded_file($imagen)) {
					$ruta = "views/images/perfiles/perfil".$aleatorio.".jpg";
					move_uploaded_file($imagen, "../../".$ruta);
				}

				// $origen = imagecreatefromjpeg($imagen);

				// $destino = imagecrop($origen, ["x"=>0, "y"=>0, "width"=>100, "height"=>100]);

				// imagejpeg($destino, "../../".$ruta);

			}

			if($ruta == ""){

				$ruta = "views/images/perfiles/user.png";	

			}

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"])){

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("usuario"=>$_POST["nuevoUsuario"],
										 "password"=>$encriptar,
										 "email"=>$_POST["nuevoEmail"],
										 "rol"=>$_POST["rol"],
										 "photo"=> $ruta);

				$respuesta = GestorPerfilesModel::guardarPerfilModel($datosController, "usuarios");



				if ($respuesta == 'ok') {
					$array["resp"] = 'ok';
					return $array;
				}else{
					return $respuesta;
				}
				
				

			}

			else{

				echo '<div class="alert alert-danger"><h4><b>Oops</b> ha ocurrido un error, asegúrece de no introducir caracteres especiales y verifíque su correo.</h4></div>';
			}

		}

	}

	#VISUALIZAR LOS PERFILES
	#------------------------------------------------------------

	// public function verPerfilesController(){

	// 	$respuesta = GestorPerfilesModel::verPerfilesModel("usuarios");	

	// 	$rol = "";

	// 	foreach($respuesta as $row => $item){

	// 		if( $item["rol"] == 0){

	// 			$rol = "Administrador";

	// 	      }

	// 	     else{

	// 	        $rol = "Editor";

	// 	      }
        
	// 		echo ' <tr>
	// 		        <td>'.$item["usuario"].'</td>
	// 		        <td>'.$rol.'</td>
	// 		        <td>'.$item["email"].'</td>
	// 		        <td><a href="#perfil'.$item["id"].'" data-toggle="modal"><span class="btn btn-info fa fa-pencil"></span></a>
	// 		            <a href="index.php?action=perfil&idBorrar='.$item["id"].'&borrarImg='.$item["photo"].'"><span class="btn btn-danger fa fa-times"></span></a></td>
	// 		      </tr>

	// 		       <div id="perfil'.$item["id"].'" class="modal fade">

	// 			       	<div class="modal-dialog modal-content">

	// 						<div class="modal-header" style="border:1px solid #eee">

	// 							<button type="button" class="close" data-dismiss="modal">X</button>

	// 							<h3 class="modal-title">Editar Perfil</h3>

	// 						</div>

	// 						<div class="modal-body" style="border:1px solid #eee">
							
	// 							<form style="padding:0px 10px" method="post" enctype="multipart/form-data">

	// 							      <input name="idPerfil" type="hidden" value="'.$item["id"].'">
								    
	// 							     <div class="form-group">
								       
	// 							      <input name="editarUsuario" type="text" class="form-control" value="'.$item["usuario"].'" required>

	// 							     </div>

	// 							      <div class="form-group">

	// 							          <input name="editarPassword" type="password" placeholder="Ingrese la Contraseña hasta 10 caracteres" maxlength="10" class="form-control" required>

	// 							      </div>

	// 							      <div class="form-group">

	// 							         <input name="editarEmail" type="email" value="'.$item["email"].'" class="form-control" required>

	// 							      </div>

	// 							      <div class="form-group">

	// 							        <select name="editarRol" class="form-control" required>

	// 							            <option value="">Seleccione el Rol</option>
	// 							            <option value="0">Administrador</option>
	// 							            <option value="1">Editor</option>

	// 							        </select>

	// 							      </div>

	// 							       <div class="form-group text-center">

	// 							       		<div style="display:block;">

	// 									     	<img src="'.$item["photo"].'" width="20%" class="img-circle">

	// 	       								 	<input type="hidden" value="'.$item["photo"].'" name="editarPhoto">

	// 								   		</div>	    

	// 						    		<input type="file" class="btn btn-default" name="editarImagen" style="display:inline-block; margin:10px 0">

	// 							          <p class="text-center" style="font-size:12px">Tamaño recomendado de la imagen: 100px * 100px, peso máximo 2MB</p>

	// 							       </div>

	// 							        <div class="form-group text-center">

	// 							    		<input type="submit" id="guardarPerfil" value="Actualizar Perfil" class="btn btn-primary">

	// 							    	</div>

	// 							</form>

	// 						</div>

	// 						<div class="modal-footer" style="border:1px solid #eee">
								
	// 							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

	// 						</div>
				        
	// 			       	</div>

	// 		       </div>';

	// 	}

	// }

	#EDITAR PERFIL
	#------------------------------------------------------------

	public function editarPerfilController(){

		if(isset($_POST["editarUsuario"])){	


			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])&&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"])){

				 $encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array("id"=>$_SESSION["id"],
										 "usuario"=>$_POST["editarUsuario"],
						                 "password"=>$encriptar,
						                 "email"=>$_POST["editarEmail"],
						                 "rol"=>$_POST["editarRol"]);

				$respuesta = GestorPerfilesModel::editarPerfilModel($datosController, "usuarios");


				if($respuesta == "ok"){

					$_SESSION["usuario"] = $_POST["editarUsuario"];
					$_SESSION["password"] = $encriptar;
					$_SESSION["email"] = $_POST["editarEmail"];
					$_SESSION["rol"] = $_POST["editarRol"];

					$array["resp"] = 'ok';

					return $array;

				}

			}

			else{

				echo '<div class="alert alert-warning"><b>¡ERROR!</b> No ingrese caracteres especiales ni espacios en blanco</div>';
			}

		}

	}

	#BORRAR PERFIL
	#------------------------------------------------------------

	public function borrarPerfilController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			unlink($_GET["borrarImg"]);

			$respuesta = GestorPerfilesModel::borrarPerfilModel($datosController, "usuarios");

			if($respuesta == "ok"){

					echo'<script>

					swal({
						  title: "¡OK!",
						  text: "¡El usuario se ha borrado correctamente!",
						  type: "success",
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
					},

					function(isConfirm){
							 if (isConfirm) {	   
							    window.location = "perfil";
							  } 
					});


				</script>';

			}

		}


	}


	#CAMBIAR FOTO
	public function cambiarFoto(){

		if(isset($_FILES["nuevaFoto"])){

			if($_FILES["nuevaFoto"]["tmp_name"] != ""){

				$imagen = $_FILES["nuevaFoto"]["tmp_name"];

				$aleatorio = mt_rand(100, 999);

				if (is_uploaded_file($imagen)) {
					$ruta = "views/images/perfiles/perfil".$aleatorio.".jpg";
					move_uploaded_file($imagen, "../../".$ruta);

					$respuesta = GestorPerfilesModel::cambiarFoto($ruta);
				}
			}
		}
		
		if ($respuesta == 'ok') {
			$array["resp"] =  'ok';
			return $array;
		}
		
	}


}