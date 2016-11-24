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
	public function listarPreinscripcio(){
		if(!Login::getUsuario())
			throw new Exception('Solo para los usuarios registrados');
		
		$this->load('model/PreinscripcioModel.php');
				
		$id_usuari = Login::getUsuario()->id;	
		
		$preinscripcions = PreinscripcioModel::verPreinscripcions($id_usuari);
	
		if(!$preinscripcions)
			throw new Exception('No se encuentra las preinscripciones');
	
			//pasar el curso a la vista
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinscripcions'] = $preinscripcions;
			$this->load_view('view/usuarios/preinscripcio.php', $datos);
	}
	
	public function borrarPreinscripcio($c){
		if(!Login::getUsuario())
			throw new Exception('Només per als usuaris enregistrats');
		
		$this->load('model/PreinscripcioModel.php');
		
		$u = Login::getUsuario()->id;
		$preinscripcion = PreinscripcioModel::getPreinsc($u,$c);				
				
		if(empty($preinscripcion))
			throw new Exception("No s'ha trobat la preinscripcio");
		
				
		if(empty($_POST['borrar'])){
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinscripcions'] = $preinscripcion;
			$this->load_view('view/usuarios/borrar.php', $datos);
		}else{
			
			if(!$preinscripcion->eliminarPreinscripcio())
				throw new Exception('Se produjo un error al borrar');

			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = 'ESBORRAT CORRECTAMENT';
			$this->load_view('view/exito.php', $datos);

		}
	}
}
	

?>