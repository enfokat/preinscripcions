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
	
	public function verPreinscripcions(){ 
		$consulta = "SELECT p.data, c.nom, c.codi
				FROM p = preinscripcions, c = cursos
				WHERE u.id = p.id_usuari;";
		
		return Database::get()->query($consulta);
	}
	
}

?>