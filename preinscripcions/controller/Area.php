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
							$datos['mensaje'] = "El curs s'ha salvat exitosament";

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
		
			
	}
	
?>	