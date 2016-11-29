<?php
class Curso extends Controller{

	public function index(){
		$this->listar();
	}
	
	//para listar
	public function listar(){
		$this->load('model/CursoModel.php');
		$cursos = CursoModel::getCursos();
		$inscrits = CursoModel::totalInscrits();
		
		//pasarle los cursos a la vista
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		$datos['cursos'] = $cursos;
		$datos['inscrits'] = $inscrits;
	
		if(!Login::isAdmin())
			$this->load_view('view/cursos/listar.php', $datos);
			else
				$this->load_view('view/cpannel/lista_admin.php',$datos);
	}
	
	public function listarAdm(){
		$this->load('model/CursoModel.php');

	
		//pasarle los cursos a la vista
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		$datos['$inscrits'] = $inscrits;
	
		$this->load_view('view/cpannel/lista_admin.php',$datos);
	}
	
	
	//veure curs
	public function ver($id=0){
		//if(!Login::getUsuario())
			//throw new Exception('Solo para los usuarios registrados');
	
			$this->load('model/CursoModel.php');
			$curso = CursoModel::getCurso($id);
	
			if(!$curso)
				throw new Exception("No s'ha trobat curs");
	
				//pasar el curso a la vista
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['curso'] = $curso;
				$this->load_view('view/cursos/detalles.php', $datos);
	}
	
	public function agregar(){
		//si no llegan los datos a guardar
		if(empty($_POST['guardar'])){
		
			//mostramos la vista del formulario
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$this->load_view('view/cpannel/nuevoCurso.php', $datos);
				
			//si llegan los datos por POST
		}else{
			//crear nuevo curso
			$this->load('model/CursoModel.php');
			$c = new CursoModel();
			$conexion = Database::get();
		
		
			//tomar los datos que vienen por POST
			//real_escape_string evita las SQL Injections
			$c->id_area = $conexion->real_escape_string($_POST['id_area']);
			$c->codi = $conexion->real_escape_string($_POST['codi']);
			$c->nom = $conexion->real_escape_string($_POST['nom']);
			$c->descripcio = $conexion->real_escape_string($_POST['descripcio']);
			$c->hores = $conexion->real_escape_string($_POST['hores']);
			$c->data_inici = $conexion->real_escape_string($_POST['data_inici']);
			$c->data_fi = $conexion->real_escape_string($_POST['data_fi']);
			$c->horari = $conexion->real_escape_string($_POST['horari']);
			$c->torn = $conexion->real_escape_string($_POST['torn']);
			$c->tipus = $conexion->real_escape_string($_POST['tipus']);
			$c->requisits = $conexion->real_escape_string($_POST['requisits']);
		
		}
		
		//guardar el usuario en BDD
		if(@!$c->guardar())
			throw new Exception("No s'ha pogut guardar el curs");
		
			//mostrar la vista de éxito
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['mensaje'] = "El curs s'ha salvat exitosament";
			$this->load_view('view/exito.php', $datos);
		
	}
	
	public function admModificar(){
	
		$this->load('model/CursoModel.php');
	
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		
		$conexion = Database::get();
		$c = @$conexion->real_escape_string($_POST['cercaCurs']);

		$datos['cerca'] = CursoModel::getCurso2($c);
		$this->load_view('view/cpannel/editCurso.php', $datos);
	}
	
	
	public function editar($id=0){
		//si no llegan los datos a modificar
		if(empty($_POST['modificar'])){
		
			//mostramos la vista del formulario
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$this->load('model/CursoModel.php');
			
			$datos['curso'] = CursoModel::getCurso($id); 	
			$this->load_view('view/cpannel/editandoCurso.php', $datos);
				
			//si llegan los datos por POST
		}else{
			
			$this->load('model/CursoModel.php');
			$c = CursoModel::getCurso($id);
			
			$conexion = Database::get();
			
			//recupera el nuevo nombre y el nuevo email
			$c->id_area = $conexion->real_escape_string($_POST['id_area']);
			$c->codi = $conexion->real_escape_string($_POST['codi']);
			$c->nom = $conexion->real_escape_string($_POST['nom']);
			$c->descripcio = $conexion->real_escape_string($_POST['descripcio']);
			$c->hores = $conexion->real_escape_string($_POST['hores']);
			$c->data_inici = $conexion->real_escape_string($_POST['data_inici']);
			$c->data_fi = $conexion->real_escape_string($_POST['data_fi']);
			$c->horari = $conexion->real_escape_string($_POST['horari']);
			$c->torn = $conexion->real_escape_string($_POST['torn']);
			$c->tipus = $conexion->real_escape_string($_POST['tipus']);
			$c->requisits = $conexion->real_escape_string($_POST['requisits']);
		
			
			//modificar el usuario en BDD
			$this->load('model/CursoModel.php');
			if(!$c->actualizar())
				throw new Exception('Error en la modificació de les dades');
			
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = "Les dades del curs s'han modificat correctament";
				$this->load_view('view/exito.php', $datos);
		}
	}
	
		public function admBorrar(){

			$this->load('model/CursoModel.php');
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			
			$conexion = Database::get();
			$c = @$conexion->real_escape_string($_POST['cercaCurs']);
			
			$datos['cerca'] = CursoModel::getCurso2($c);

			$this->load_view('view/cpannel/borradoCurso.php', $datos);

		}
		
		public function borrado($id=0){
				
			$this->load('model/CursoModel.php');
			$c = CursoModel::getCurso($id);
			
			if(empty($c))
				throw new Exception("No s'ha trobat el curs");
			
			if(empty($_POST['borrar'])){
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['curso'] = $c;
				$this->load_view('view/usuarios/borrar.php', $datos);
			}else{
		
				if(!$c->borrar())
					throw new Exception("S'ha produït un error");
		
					$datos = array();
					$datos['usuario'] = Login::getUsuario();
					$datos['mensaje'] = 'BORRADO OK';
					$this->load_view('view/exito.php', $datos);
		
			}
		}
		
		
	
	
}
?>