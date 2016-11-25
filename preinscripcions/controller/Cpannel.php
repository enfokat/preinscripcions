<?php
	class Cpannel extends Controller{
	
		//Método por defecto
		//Carga el panel de control -> solo muestra la vista al usuario administrador
		public function menu(){
		
			$this->load('model/EstadisticasModel.php');
			$sumaC = EstadisticasModel::numCursos();
			$sumaU = EstadisticasModel::numUsers();	
			$sumaA = EstadisticasModel::numAreas();
			$sumaP = EstadisticasModel::numPreins();
			$sumaS= EstadisticasModel::numSubs();
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['sumaC'] = $sumaC;
			$datos['sumaU'] = $sumaU;
			$datos['sumaA'] = $sumaA;
			$datos['sumaP'] = $sumaP;
			$datos['sumaS'] = $sumaS;
			
			if(@$datos['usuario']->admin == 1){
				$this->load_view('view/cpannel/admin.php', $datos);
			}else{
				throw new Exception('Solo Admin');
			}
		}	
	
		
	}
	
?>
