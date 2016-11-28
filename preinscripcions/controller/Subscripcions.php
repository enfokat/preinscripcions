<?php
class Subscripcions extends Controller{

	public function listar(){
		$this->load('model/SubscripModel.php');
		$subs = SubscripModel::verSubscrip();
		
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		$datos['subs'] = $subs;
		$this->load_view('view/cpannel/listarSubscripcions.php', $datos);
	}
	
	public function borrar($id=0){
	
	if(!Login::isAdmin())
			throw new Exception('Has de ser administrador');
	
		$this->load('model/SubscripModel.php');
		
		$id_usuari = @intval($_GET['u']);
		$id_area= @intval($_GET['a']);			
		$s = SubscripModel::getSubs($id_usuari, $id_area);

		
		if(empty($s))
			throw new Exception("No s'ha trobat la preinscripcio");
				
			if(!$s->borrar())
				throw new Exception("S'ha produït un error a l'esborrar");

			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = 'ESBORRAT CORRECTAMENT';
			$this->load_view('view/exito.php', $datos);
	}
	
	public function nuevo($id){
		require_once 'model/SubscripModel.php';
			
		if(!Login::getUsuario())
			throw new Exception ("has d'estar enregistrat");
				
			$subs = new SubscripModel();
			$subs->id_usuari = Login::getUsuario()->id;
			$subs->id_area = $id;

			if(!$subs->guardar())
				throw new Exception("No ha pogut inscribir-se");
		
		
	
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		$datos['mensaje'] = "T'has subscrit correctament al area formativa";
		$this->load_view('view/exito.php', $datos);
	}
}
?>