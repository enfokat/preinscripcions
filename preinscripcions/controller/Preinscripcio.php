<?php
class Preinscripcio extends Controller{
	

	public function crear($id_curs){

			//si llegan los datos del formulario
			//inscribir-me
			require_once 'model/PreinscripcioModel.php';
		
			
			if(!Login::getUsuario())
				throw new Exception ("has d'estar enregistrat");
			
			$preinscripcio = new PreinscripcioModel();
			$preinscripcio->id_usuari = Login::getUsuario()->id;
			$preinscripcio->id_curs = $id_curs;

			if(!$preinscripcio->guardar())
				throw new Exception("No ha pogut inscribir-se");
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = "T'has inscrit correctament.";
			$this->load_view('view/exito.php', $datos);
	}
	
	//veure preinscripcions
	public function listarPreinscripcio($id){
		if(!Login::getUsuario())
		throw new Exception('Solo para los usuarios registrados');
	
		$this->load('model/PreinscripcioModel.php');
		$preinscripcio = PreinscripcioModel::verPreinscripcions($id);
	
		if(!$preinscripcio)
			throw new Exception('No se encuentra las preinscripciones');
	
			//pasar el curso a la vista
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinscripcio'] = $preinscripcio;
			$this->load_view('view/usuarios/preinscripcio.php', $datos);
	}
	}

?>