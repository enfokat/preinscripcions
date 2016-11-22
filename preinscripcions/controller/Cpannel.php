<?php
	class Cpannel extends Controller{
	
		//Método por defecto
		//Carga el panel de control -> solo muestra la vista al usuario administrador
		public function menu(){
		
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		
			if(@$datos['usuario']->admin == 1){
				$this->load_view('view/cpannel/admin.php', $datos);
			}else{
				throw new Exception('Solo Admin');
			}
		}	
	}
	
?>
