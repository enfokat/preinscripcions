<?php
class CursoModel{
	//propiedades
	public $id, $codi, $id_area,$nom,$descripcio,$hores;
	public $data_inici, $data_fi, $horari,$torn,$tipus,$requisits;

	
	//recuperar todos los cursos
	public static function getCursos(){
		$consulta ="SELECT id,codi,id_area,nom,descripcio,hores FROM cursos;";
			
		$resultado = Database::get()->query($consulta);
			
		$cursos = array();
			
		while($curso = $resultado->fetch_object('CursoModel'))
			$cursos[] = $curso;
				
			$resultado->free();

			return $cursos;
	}

	//recuperar un curso
	public static function getCurso($id=0){
		$consulta = "SELECT codi,nom,descripcio,hores FROM cursos WHERE id=$id;";
			
		$resultado = Database::get()->query($consulta);
		if(!$resultado) return null;
			
		$curso = $resultado->fetch_object('CursoModel');
		$resultado->free();
			
		return $curso;
	}
}
?>