<?php 
class Estadisticas extends Controller{

		public function sumaCursos(){
			$this->load('model/EstadisticasModel.php');
			$sumaCursos = EstadisticasModel::numCursos();
			
			var_dump($sumaCursos);
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['sumaCursos'] = $sumaCursos;

			$this->load_view('view/cpannel/admin.php',$datos);
		}
	
	
}
?>