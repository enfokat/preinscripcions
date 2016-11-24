<?php
class CursoModel{
	//propiedades
	public $id, $codi, $id_area,$nom,$descripcio,$hores;
	public $data_inici, $data_fi, $horari,$torn,$tipus,$requisits;
	
	//guarda el usuario en la BDD
	public function guardar(){
		$user_table = Config::get()->db_user_table;
		$consulta = "INSERT INTO cursos(id, codi, id_area, nom, descripcio, hores, data_inici, data_fi, horari, torn, tipus, requisits)
		VALUES ('$this->id', '$this->codi', '$this->id_area', '$this->nom', '$this->descripcio', '$this->hores', '$this->data_inici', '$this->data_fi', '$this->horari', '$this->torn', '$this->tipus', '$this->requisits');";
	
		return Database::get()->query($consulta);
	}

	
	//recuperar todos los cursos
	public static function getCursos(){
		$consulta ="SELECT * FROM cursos;";
			
		$resultado = Database::get()->query($consulta);
			
		$cursos = array();
			
		while($curso = $resultado->fetch_object('CursoModel'))
			$cursos[] = $curso;
				
			$resultado->free();

			return $cursos;
	}

	//recuperar un curso
	public static function getCurso($id=0){
		$consulta = "SELECT * FROM cursos WHERE id=$id;";
			
		$resultado = Database::get()->query($consulta);
		if(!$resultado) return null;
			
		$curso = $resultado->fetch_object('CursoModel');
		$resultado->free();
			
		return $curso;
	}
	
	public static function totalInscrits($curs=0){
//		$consulta = "SELECT count( id_usuari ) AS suma FROM preinscripcions GROUP BY id_curs ";
			$consulta = "SELECT c . * , p . * , COUNT( id_usuari ) AS suma FROM cursos c INNER JOIN preinscripcions p ON c.id = p.id_curs GROUP BY c.id";

			
		$resultado = Database::get()->query($consulta);
		if(!$resultado) return null;
			
		$inscrits = $resultado->fetch_object('CursoModel');
		$resultado->free();
			
		return $inscrits;
	}
	
}
?>