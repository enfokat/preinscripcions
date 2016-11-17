<?php
class Curso extends Controller{

	public function index(){
		$this->listar();
	}
	//para listar
	public function listar(){
		$this->load('model/CursoModel.php');
		$cursos = CursoModel::getCursos();
	
		//pasarle los cursos a la vista
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
		$datos['cursos'] = $cursos;
	
		if(!Login::isAdmin())
			$this->load_view('view/cursos/listar.php', $datos);
			else
				$this->load_view('view/cursos/admin/lista_admin.php',$datos);
	}
	
	//ver vivienda
	public function ver($id=0){
		if(!Login::getUsuario())
			throw new Exception('Solo para los usuarios registrados');
	
			$this->load('model/CursoModel.php');
			$curso = CursoModel::getCurso($id);
	
			if(!$curso)
				throw new Exception('No se encuentra el curso');
	
				//pasar la vivienda a la vista
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['curso'] = $curso;
				$this->load_view('view/cursos/detalles.php', $datos);
	}
}
?>