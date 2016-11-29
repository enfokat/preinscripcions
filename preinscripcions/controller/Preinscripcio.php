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
			throw new Exception('Només per als usuaris enregistrats');
		
		$this->load('model/PreinscripcioModel.php');
				
		$id_usuari = Login::getUsuario()->id;	
		
		$preinscripcions = PreinscripcioModel::verPreinscripcions($id_usuari);
	
		if(!$preinscripcions)
			throw new Exception('No es troba les preinscripcions');
	
			//pasar el curso a la vista
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinscripcions'] = $preinscripcions;
			$this->load_view('view/usuarios/preinscripcio.php', $datos);
	}
	
	public function listarPreinscripcioAdm(){
		
		if(@$_POST['cercaUsuari']){
			$dni = $_POST['cercaUsuari'];
			$this->load('model/PreinscripcioModel.php');
			$preinsc = PreinscripcioModel::verPreinscripcionsAdmUsuari($dni);
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinsc'] = $preinsc;
			$this->load_view('view/cpannel/searchPreinscripcio.php', $datos);
		}
		elseif(@$_POST['cercaCurs']){
			$id = $_POST['cercaCurs'];
			$this->load('model/PreinscripcioModel.php');
			$preinsc = PreinscripcioModel::verPreinscripcionsAdmCurs($id);
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinsc'] = $preinsc;
			$this->load_view('view/cpannel/searchPreinscripcio.php', $datos);
		} 
		else{
			$this->load('model/PreinscripcioModel.php');
			$preinsc = PreinscripcioModel::verPreinscripcionsAdm();
		
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinsc'] = $preinsc;
			$this->load_view('view/cpannel/searchPreinscripcio.php', $datos);
		}
	}
	
	public function printPreinscripcioAdm(){
	
		if(@$_POST['cercaUsuari']){
			$dni = $_POST['cercaUsuari'];
			$this->load('model/PreinscripcioModel.php');
			$preinsc = PreinscripcioModel::verPreinscripcionsAdmUsuari($dni);
				
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinsc'] = $preinsc;
			$this->load_view('view/cpannel/printPreinscripcio.php', $datos);
		}
		elseif(@$_POST['cercaCurs']){
			$id = $_POST['cercaCurs'];
			$this->load('model/PreinscripcioModel.php');
			$preinsc = PreinscripcioModel::verPreinscripcionsAdmCurs($id);
				
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinsc'] = $preinsc;
			$this->load_view('view/cpannel/printPreinscripcio.php', $datos);
		}
		else{
			$this->load('model/PreinscripcioModel.php');
			$preinsc = PreinscripcioModel::verPreinscripcionsAdm();
	
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinsc'] = $preinsc;
			$this->load_view('view/cpannel/printPreinscripcio.php', $datos);
		}
	}
	
	public function borrarPreinscripcio($c){
		if(!Login::getUsuario())
			throw new Exception('Només per als usuaris enregistrats');
		
		$this->load('model/PreinscripcioModel.php');
		
		$u = Login::getUsuario()->id;
		$preinscripcion = PreinscripcioModel::getPreinsc($u,$c);				
				
		if(empty($preinscripcion))
			throw new Exception("No s'ha trobat la preinscripció");
		
				
		if(empty($_POST['borrar'])){
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinscripcions'] = $preinscripcion;
			$this->load_view('view/usuarios/borrar.php', $datos);
		}else{
			
			if(!$preinscripcion->eliminarPreinscripcio())
				throw new Exception("S'ha produït un error a l'esborrar");

			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = 'ESBORRAT CORRECTAMENT';
			$this->load_view('view/exito.php', $datos);

		}
	}
	
	//OPERACIONES DEL ADMINISTRADOR
	public function guardarPreins(){
	
		//si llegan los datos del formulario, incribir usuario		
		require_once 'model/PreinscripcioModel.php';	
			
		if(!Login::isAdmin())
			throw new Exception ("has de ser administrador");
			
		//si no llega el DNI del usuario
		if(empty($_POST['cercadorUsuaris']) && empty($_POST['preinscriure'])){
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$this->load_view('view/cpannel/select_user.php', $datos);		
		}	
		
		//si llega el DNI del usuario
		if(!empty($_POST['cercadorUsuaris'])){
			$dni = $_POST['dni'];
			
			//recuperar un usuario por DNI
			$usuari = UsuarioModel::getUsuario($dni); 
			
			if(empty($usuari))
				throw new Exception ("No existeix l'usuari amb dni ".$dni);
			
			$this->load('model/CursoModel.php');
			$cursos = CursoModel::getCursos();
				
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['usuari'] = $usuari;
			$datos['cursos'] = $cursos;
			$this->load_view('view/cpannel/preinscribir_user.php', $datos); //TODO
				
		}
		
		//si llega ya la petición de preinscripcion
		if(!empty($_POST['preinscriure'])){

			$preinscripcio = new PreinscripcioModel();
			$preinscripcio->id_usuari = intval($_POST['id_usuari']);
			$preinscripcio->id_curs = intval($_POST['id_curs']);
			
			if(!$preinscripcio->guardar())
				throw new Exception("inscripció no realitzada");
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = "Inscrit correctament.";
			$this->load_view('view/exito.php', $datos); 
		}
	}
	public function borrarPreinscAdm(){
		if(!Login::isAdmin())
			throw new Exception('Has de ser administrador');
	
		$this->load('model/PreinscripcioModel.php');
		
		$id_curs = intval($_GET['c']);
		$id_usuari = intval($_GET['u']);			
		$preinsc = PreinscripcioModel::getPreinsc($id_usuari,$id_curs);

		if(empty($preinsc))
			throw new Exception("No s'ha trobat la preinscripció");


		if(empty($_POST['borrar'])){
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['preinscripcio'] = $preinsc;
			$this->load_view('view/usuarios/borrar.php', $datos);
		}else{
				
			if(!$preinsc->eliminarPreinscripcio())
				throw new Exception("S'ha produït un error a l'esborrar");

			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = 'ESBORRAT CORRECTAMENT';
			$this->load_view('view/exito.php', $datos);

		}
	}
	
	public function expXml(){
		$this->load('model/PreinscripcioModel.php');
		//$this->load('libraries/xml_library.php');
	
		if(!Login::isAdmin())
			throw new Exception ("has de ser administrador");
	
			$preinscripcion = PreinscripcioModel::verPreinscripcionsAdm();
			$xml = PreinscripcioModel::toXML($preinscripcion);
	
			if(!empty($_POST['descargar']))
				header('Content-Disposition:attachment; file=preinscripcions.xml');
			else
				header('Content-type:text/xml; charset=utf-8');


			$datos = array();
			$datos['xml'] = $xml;
			$this->load_view('view/xml.php', $datos);
	}
	
}
	

?>