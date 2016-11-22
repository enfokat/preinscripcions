<?php
	class Cpannel extends Controller{
	
		//Método por defecto
		//Carga la portada del sitio (vista welcome_message)
		public function menu(){
			
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		
		$this->load_view('view/cpannel/admin.php', $datos);
			
		}
		
	}
?>
