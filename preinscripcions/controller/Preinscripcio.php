<?php
class Preinscripcio extends Controller{
	

	public function crear($id_curs){

			//si llegan los datos del formulario
			//inscribir-me
			require_once 'model/PreinscripcioModel.php';
		
			$preinscripcio = new PreinscripcioModel();
			$preinscripcio->id_usuari = Login::getUsuario()->id;
			$preinscripcio->id_curs = $id_curs;

			if(!$preinscripcio->guardar())
				throw new Exception("No ha pogut inscribir-se");
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = 'Usuari '.$usuari->nom.' inscrit correctament.';
			$this->load_view('view/exito.php', $datos);
	}
}
?>