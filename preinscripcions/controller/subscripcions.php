<?php
class Preinscripcio extends Controller{

	public function listar(){
		
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		$this->load_view('view/cpannel/listarSubscripcions.php', $datos);
	}
	
}
?>