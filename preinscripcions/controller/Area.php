<?php
	class Area  extends Controller{
		
		public function guardado(){
			
				if(empty($_POST['guardar'])){
		
					//mostramos la vista del formulario
					$datos = array();
					$datos['usuario'] = Login::getUsuario();
					$this->load_view('view/cpannel/AddArea.php', $datos);
		
					//si llegan los datos por POST
				}else{
					//crear nuevo curso
					$this->load('model/AreaModel.php');
					$a = new AreaModel();
					$conexion = Database::get();

					$a->nom = $conexion->real_escape_string($_POST['nom']);

						//guardar el usuario en BDD
							if(@!$a->guardar())
								throw new Exception("No s'ha pogut guardar el curs");
				
							//mostrar la vista de éxito
							$datos = array();
							$datos['usuario'] = Login::getUsuario();
							$datos['mensaje'] = "El area s'ha salvat exitosament";

							$this->load_view('view/exito.php', $datos);
						}
			}
			
			public function listado(){
				$this->load('model/AreaModel.php');
				$areas = AreaModel::getAreas();

				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['areas'] = $areas;

				$this->load_view('view/areas/listar.php', $datos);

			}
		
			public function modificado(){
				$this->load('model/AreaModel.php');
				
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				
				$conexion = Database::get();
				$a = @$conexion->real_escape_string($_POST['cercaArea']);
				
				$datos['cerca'] = AreaModel::getArea($a);
				$this->load_view('view/cpannel/editArea.php', $datos);
			}
			
	public function editar($id=0){
		//si no llegan los datos a modificar
		if(empty($_POST['guardar'])){
		
			//mostramos la vista del formulario
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$this->load('model/AreaModel.php');
			
			$datos['area'] = AreaModel::getArea($id); 	
			$this->load_view('view/cpannel/editandoArea.php', $datos);
				
			//si llegan los datos por POST
		}else{
			
			$this->load('model/AreaModel.php');
			$a = AreaModel::getArea($id);
			
			$conexion = Database::get();
		
			$a->nom = $conexion->real_escape_string($_POST['nom']);

		
			
			//modificar el dato en BDD
			$this->load('model/AreaModel.php');
			if(!$a->actualizar())
				throw new Exception('Error en la modificació de les dades');
			
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = "Les dades s'han modificat correctament";
				$this->load_view('view/exito.php', $datos);
		}
	}
	
	public function admBorrar(){
	
		$this->load('model/AreaModel.php');
			
		$datos = array();
		$datos['usuario'] = Login::getUsuario();
			
		$conexion = Database::get();
		$a = @$conexion->real_escape_string($_POST['cercaArea']);
			
		$datos['cerca'] = AreaModel::getArea($a);
		$this->load_view('view/cpannel/deleteArea.php', $datos);
	
	}
	
	
	public function borrado($id=0){
	
		$this->load('model/AreaModel.php');
		$a = AreaModel::getArea($id);

		if(!empty($a))
			throw new Exception("No s'ha trobat aquesta area formativa");
		
			if(!AreaModel::borrar($a))
				throw new Exception("Ha ocorregut un error");
	
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = 'BORRADO OK';
				$this->load_view('view/exito.php', $datos);
	
	}
	
			
	}
	
?>	