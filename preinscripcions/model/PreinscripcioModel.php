<?php
class PreinscripcioModel{
	//propietats
	public $id_usuari, $id_curs,$data, $codi, $nom, $data_inici, $descripcio, $hores;


	//METODOS
	//guardar un curs
	public function guardar(){
		$consulta = "INSERT INTO preinscripcions(id_usuari, id_curs)
		VALUES($this->id_usuari,$this->id_curs);";
			
	
		return Database::get()->query($consulta);
	}
	
	public function verPreinscripcions($id=0){ 
		$consulta = "SELECT p.id_usuari, c.id, c.codi, c.nom, p.data, c.data_inici, c.descripcio, c.hores
				FROM preinscripcions p INNER JOIN cursos c
				ON c.id = p.id_curs
				WHERE p.id_usuari=$id;";		
		
		
		$datos = Database::get()->query($consulta);
		
		$preinscripcions = array();	

		
		while($preinscripcio = $datos->fetch_object('PreinscripcioModel'))
			$preinscripcions[] = $preinscripcio;
		
			$datos->free();

			return $preinscripcions;
		}
		
		//recuperar una preinscripcio
		public static function getPreinsc($u=0,$c=0){
			$consulta = "SELECT * FROM preinscripcions WHERE id_usuari=$u AND id_curs=$c;";
			
			$resultado = Database::get()->query($consulta);
							
			$preinscripcio = $resultado->fetch_object('PreinscripcioModel');
			$resultado->free();
				
			return $preinscripcio;
		}
	public function eliminarPreinscripcio(){
		$consulta = "DELETE FROM preinscripcions
					WHERE id_usuari=$this->id_usuari AND id_curs=$this->id_curs;";
		
		return Database::get()->query($consulta);
	}
}

?>