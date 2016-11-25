<?php 

	Class EstadisticasModel{
		
		public function numCursos(){
			$consulta = "SELECT count(*) AS suma FROM cursos";
			$resultado = Database::get()->query($consulta);

			$cursos = array();
			
			while($curso = $resultado->fetch_object('EstadisticasModel'))
				$cursos[] = $curso;
			
				//libera memoria
				$resultado->free();
					
				//retorno
				return $cursos;
		}
		
		public function numUsers(){
			$consulta = "SELECT count(*) AS suma FROM usuaris";
			$resultado = Database::get()->query($consulta);
		
			$usuaris = array();
				
			while($usuari = $resultado->fetch_object('EstadisticasModel'))
				$usuaris[] = $usuari;
					
				//libera memoria
				$resultado->free();
					
				//retorno
				return $usuaris;
		}
		
		public function numAreas(){
			$consulta = "SELECT count(*) AS suma FROM arees_formatives";
			$resultado = Database::get()->query($consulta);
		
			$arees = array();
		
			while($area = $resultado->fetch_object('EstadisticasModel'))
				$arees[] = $area;
					
				//libera memoria
				$resultado->free();
					
				//retorno
				return $arees;
		}
		
		public function numPreins(){
			$consulta = "SELECT count(*) AS suma FROM preinscripcions";
			$resultado = Database::get()->query($consulta);
		
			$pres = array();
		
			while($pre = $resultado->fetch_object('EstadisticasModel'))
				$pres[] = $pre;
					
				//libera memoria
				$resultado->free();
					
				//retorno
				return $pres;
		}
		
		public function numSubs(){
			$consulta = "SELECT count(*) AS suma FROM subscripcions";
			$resultado = Database::get()->query($consulta);
		
			$subs = array();
		
			while($sub = $resultado->fetch_object('EstadisticasModel'))
				$subs[] = $sub;
					
				//libera memoria
				$resultado->free();
					
				//retorno
				return $subs;
		}
		
	}

?>