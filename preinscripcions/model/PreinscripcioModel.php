<?php
class PreinscripcioModel{
	//propietats
	public $id_usuari, $id_curs,$data;


	//METODOS
	//guardar un curs
	public function guardar(){
		$consulta = "INSERT INTO preinscripcions(id_usuari, id_curs)
		VALUES($this->id_usuari,$this->id_curs);";
			
	
		return Database::get()->query($consulta);
	}
	
	public function verPreinscripcions($id){ 
		$consulta = "SELECT p.*, c.*
				FROM preinscripcions p INNER JOIN cursos c
				ON c.id = p.id_curs
				WHERE id_usuari=$id;";
		
		$datos = Database::get()->query($consulta);
		
		$preinscripcions = array();
		

		
		while($preinscripcio = $datos->fetch_object('PreinscripcioModel'))
			$preinscripcions[] = $preinscripcio;
		
			$datos->free();

			return $preinscripcions;
		}
	}
	


?>