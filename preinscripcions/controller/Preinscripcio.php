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
	
	//veure curs
	/*public function listarPreinscripcio($id=0){
		//if(!Login::getUsuario())
		//throw new Exception('Solo para los usuarios registrados');
	
		$this->load('model/PreinscripcioModel.php');
		$curso = PreinscripcioModel::getCurso($id);
	
		if(!$curso)
			throw new Exception('No se encuentra el curso');
	
			//pasar el curso a la vista
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['curso'] = $curso;
			$this->load_view('view/cursos/detalles.php', $datos);
	}
	}*/
}
?>