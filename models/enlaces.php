<?php

class EnlacesModels{

	public function enlacesModel($enlaces){

		if( $enlaces == "registrarEmpresas" ||
			$enlaces == "login" ||
			$enlaces == "profile" ||
			$enlaces == "ingreso" ||
			$enlaces == "clientes" ||
			$enlaces == "gestorTerritorio" ||
			$enlaces == "registro" ||
			$enlaces == "cerrarSesion"){

			$module = "views/modules/".$enlaces.".php";

		}
		else if($enlaces == "index"){
			$module = "views/modules/index.php";
		}else {
			$module = "views/modules/page_404.html";
		}

		return $module;

	}


}