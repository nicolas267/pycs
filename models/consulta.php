<?php  
	class Consulta extends Conexion{
		public function __construct(){
			parent::__construct();
		}

		public function ver_registros($sql){
			$consulta = $this->conexion->prepare($sql);
			$consulta->execute();
			$resultado = $consulta->fetchAll();
			
			return $resultado;

			$consulta -> close();
		}
		public function guardar_registro($sql){
			try{
				$consulta = $this->conexion->prepare($sql);
				$consulta->execute();
		
		
			}catch(Exception $e){
				die("Ha ocurrido un error al insertar un nuevo registro (" . $e->getLine() . ") " . $e->getMessage());
			}
		}
		public function bind_param_guardar_registro($stmtPrepare, $stmt){
			try{

				$stmt = $this->conexion->prepare($stmtPrepare);

				if($stmt->execute()){

					return "ok";
				}

				else{

					return "error";
				}

				$stmt->close();

			}catch(Exception $e){
				die("Ha ocurrido un error al insertar un nuevo registro (" . $e->getLine() . ") " . $e->getMessage());
			}
		}
		public function borrar_registro($sql){
			try{
				$consulta = $this->conexion->prepare($sql);
				$resultado = $consulta->execute();
				return $resultado;
				
			}catch(Exception $e){
				die("Ha ocurrido un error al borrar el registro (" . $e->getLine() . ") " . $e->getMessage());
			}
		}
		public function actualizar_registro($sql){
			try{
				$consulta = $this->conexion->prepare($sql);
				$resultado = $consulta->execute();
			}catch(Execption $e){
				die("Ha ocurrido un error al actualizar el registro");
			}
		}
	}
