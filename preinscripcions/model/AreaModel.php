<?php
	class AreaModel{
		//propiedades
		public $id, $nom;
		

		//guarda el usuario en la BDD
			public function guardar(){
					$consulta = "INSERT INTO arees_formatives(id, nom)
					VALUES ('$this->id', '$this->nom');";

			return Database::get()->query($consulta);
		}
		
		public static function getAreas(){
			$consulta ="SELECT * FROM arees_formatives;";	
			$resultado = Database::get()->query($consulta);
				
			$areas = array();			
			while($area = $resultado->fetch_object('AreaModel'))
				$areas[] = $area;
		
				$resultado->free();	
				return $areas;
		}
		
		public static function getArea($id=0){
			$consulta = "SELECT * FROM arees_formatives WHERE id=$id;";
				
			$resultado = Database::get()->query($consulta);
			if(!$resultado) return null;
				
			$area = $resultado->fetch_object('AreaModel');
			$resultado->free();
				
			return $area;
		}
		
		public function actualizar(){
			$consulta = "UPDATE arees_formatives SET nom='$this->nom' WHERE id='$this->id';";
			return Database::get()->query($consulta);
		}
		
		public function borrar($id=0){
			@$consulta = "DELETE FROM arees_formatives WHERE id='$this->id';";
			return Database::get()->query($consulta);
		}
		
	}	
	
	
?>