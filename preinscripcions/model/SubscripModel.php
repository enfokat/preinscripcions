<?php
class SubscripModel{
	//propietats
	public $id, $id_usuari, $id_area, $data;
	
	public function verSubscrip(){
			$consulta = "SELECT * FROM subscripcions AS sub
			JOIN usuaris AS u ON sub.id_usuari = u.id
			JOIN arees_formatives AS a ON sub.id_area = a.id;";
	
	
		$datos = Database::get()->query($consulta);
	
		$subscripcions = array();
	
	
		while($subscripcio = $datos->fetch_object('SubscripModel'))
			$subscripcions[] = $subscripcio;
	
			$datos->free();
	
			return $subscripcions;
	}
	
		public static function getSubs($u=0,$a=0){
			$consulta = "SELECT * FROM subscripcions WHERE id_usuari=$u AND id_area=$a;";
			
			$resultado = Database::get()->query($consulta);
							
			$s= $resultado->fetch_object('SubscripModel');
			$resultado->free();
				
			return $s;
		}
		
		public function borrar(){
		$consulta = "DELETE FROM subscripcions
					WHERE id_usuari=$this->id_usuari AND id_area=$this->id_area;";
		
		return Database::get()->query($consulta);
	}
	
	public function guardar(){
		$consulta = "INSERT INTO subscripcions(id_usuari, id_area)
					VALUES ('$this->id_usuari', '$this->id_area');";

		return Database::get()->query($consulta);
	}
	
}	
?>	