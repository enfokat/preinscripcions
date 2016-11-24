<?php 

	Class EstadisticasModel{
		
		public function numCursos(){
			$consulta = "SELECT count(*) FROM cursos";
			$resultado = Database::get()->query($consulta);
			$suma = $resultado->num_rows('CursoModel');
			return $suma;
		}
		
	}

?>