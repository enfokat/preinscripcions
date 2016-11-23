<?php
	//CONTROLADOR USUARIO 
	// implementa las operaciones que puede realizar el usuario
	class Usuario extends Controller{

		//PROCEDIMIENTO PARA REGISTRAR UN USUARIO
		public function registro(){

			//si no llegan los datos a guardar
			if(empty($_POST['guardar'])){
				
				//mostramos la vista del formulario
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['max_image_size'] = Config::get()->user_image_max_size;
				$this->load_view('view/usuarios/registro.php', $datos);
			
			//si llegan los datos por POST
			}else{
				//crear una instancia de Usuario
				$u = new UsuarioModel();
				$conexion = Database::get();
				
				
				//tomar los datos que vienen por POST
				//real_escape_string evita las SQL Injections
				$u->dni = $conexion->real_escape_string($_POST['dni']);
				$u->nom = $conexion->real_escape_string($_POST['nom']);
				$u->cognom1 = $conexion->real_escape_string($_POST['cognom1']);
				$u->cognom2 = $conexion->real_escape_string($_POST['cognom2']);
				$u->data_naixement = $conexion->real_escape_string($_POST['data_naixement']);
				$u->estudis = $conexion->real_escape_string($_POST['estudis']);
				$u->situacio_laboral = $conexion->real_escape_string($_POST['situacio_laboral']);
				$u->prestacio = $conexion->real_escape_string($_POST['prestacio']);
				$u->telefon_mobil = $conexion->real_escape_string($_POST['telefon_mobil']);
				$u->telefon_fix = $conexion->real_escape_string($_POST['telefon_fix']);
				$u->email = $conexion->real_escape_string($_POST['email']);
				
				}
								
				//guardar el usuario en BDD
				if(@!$u->guardar())
					throw new Exception('No se pudo registrar el usuario');
				
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = 'Operación de registro completada con éxito';
				$this->load_view('view/exito.php', $datos);
			//}
		}
		

		//PROCEDIMIENTO PARA MODIFICAR UN USUARIO
		public function modificacion(){
			//si no hay usuario identificado... error
			if(!Login::getUsuario())
				throw new Exception('Debes estar identificado para poder modificar tus datos');
				
			//si no llegan los datos a modificar
			if(empty($_POST['modificar'])){
				
				//mostramos la vista del formulario
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
			//	$datos['max_image_size'] = Config::get()->user_image_max_size;
				$this->load_view('view/usuarios/editar.php', $datos);
					
				//si llegan los datos por POST
			}else{
				//recuperar los datos actuales del usuario
				$u = Login::getUsuario();
				$conexion = Database::get();
		
				//recupera el nuevo nombre y el nuevo email
				$u->dni = $conexion->real_escape_string($_POST['dni']);
				$u->nom = $conexion->real_escape_string($_POST['nom']);
				$u->cognom1 = $conexion->real_escape_string($_POST['cognom1']);
				$u->cognom2 = $conexion->real_escape_string($_POST['cognom2']);
				$u->data_naixement = $conexion->real_escape_string($_POST['data_naixement']);
				$u->estudis = $conexion->real_escape_string($_POST['estudis']);
				$u->situacio_laboral = $conexion->real_escape_string($_POST['situacio_laboral']);
				$u->prestacio = $conexion->real_escape_string($_POST['prestacio']);
				$u->telefon_mobil = $conexion->real_escape_string($_POST['telefon_mobil']);
				$u->telefon_fix = $conexion->real_escape_string($_POST['telefon_fix']);
				$u->email = $conexion->real_escape_string($_POST['email']);
				var_dump($u);
				
				//modificar el usuario en BDD
				if(!$u->actualizar())
					throw new Exception('No se pudo modificar');
		
						
				//hace de nuevo "login" para actualizar los datos del usuario
				//desde la BDD a la variable de sesión.
				Login::log_in($u->dni, $u->data_naixement);
					
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = Login::getUsuario();
				$datos['mensaje'] = 'Datos de Usuario modificados correctamente';
				$this->load_view('view/exito.php', $datos);
			}
		}
		
		
		//PROCEDIMIENTO PARA DAR DE BAJA UN USUARIO
		//solicita confirmación
		public function baja(){		
			//recuperar usuario
			$u = Login::getUsuario();
			
			//asegurarse que el usuario está identificado
			if(!$u) throw new Exception("Per donarte'n de baixa tens d'estar identificat"	);
			
			//si no nos están enviando la conformación de baja
			if(empty($_POST['confirmar'])){	
				//carga el formulario de confirmación
				$datos = array();
				$datos['usuario'] = $u;
				$this->load_view('view/usuarios/baja.php', $datos);
		
			//si nos están enviando la confirmación de baja
			}else{
				//validar password
				$p =Database::get()->real_escape_string($_POST['data_naixement']);
				if($u->data_naixement != $p) 
					throw new Exception('La data de naixement es incorrecta, no es pot realitzar la baixa');
				
				//de borrar el usuario actual en la BDD
				if(!$u->borrar())
					throw new Exception('No es pot realitzar la baixa');
						
			
				//cierra la sesion
				Login::log_out();
					
				//mostrar la vista de éxito
				$datos = array();
				$datos['usuario'] = null;
				$datos['mensaje'] = 'Usuari eliminat correctament';
				$this->load_view('view/exito.php', $datos);
			}
		}
		
		public function listar(){
			$this->load('model/UsuarioModel.php');
			
			$datos = array();
			$datos['usuario'] = Login::getUsuario();
			$datos['usuarios'] = UsuarioModel::getUsuarios();
			
			$this->load_view('view/usuarios/listaruser.php', $datos);
		}

		
	}
?>