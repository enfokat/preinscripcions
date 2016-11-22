<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>CPannel - Administración</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css2;?>" />
		<script type="text/javascript" src="<?php echo Config::get()->js;?>"></script>
	</head>
	
	<body>
		<?php 
			Template::header(); //pone el header

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menú
		?>

		<section id="content">
						<h2>Panel de Control</h2>
			
			<section class="admin">
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionUsuarios.jpg" width="150">
					</figure>
					<div>
						<h3>Gestión de Usuarios</h3>
						<a href="index.php?controlador=Usuario&operacion=registro">Agregar un usuario</a><br/>
						<a href="">Listar Usuarios</a><br/>
						<a href="">Modificar un usuario</a><br/>
						<a href="">Eliminar usuario</a><br/>
					</div>
				</div>
				
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionCursos.png" width="150">
					</figure>
					<div>
						<h3>Gestión de Cursos</h3>
						<a href="">Agregar Curso</a><br/>
						<a href="">Listar Curso</a><br/>
						<a href="">Modificar Curso</a><br/>
						<a href="">Eliminar Curso</a><br/>
					</div>	
				</div>
			</section>
			
						<section class="admin">
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionArea.png" width="150">
					</figure>
					<div>
						<h3>Gestión  Areas Formatives</h3>
						<a href="">Agregar Area</a><br/>
						<a href="">Listar Area</a><br/>
						<a href="">Modificar Area</a><br/>
						<a href="">Eliminar Area</a><br/>
					</div>
				</div>
				
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionPre.jpg" width="150">
					</figure>
					<div>
						<h3>Gestión Pre-inscripcions</h3>
						<a href="">Agregar Pre-Inscripció</a><br/>
						<a href="">Listar Pre-Inscripció</a><br/>
						<a href="">Eliminar Pre-Inscripció</a><br/>
						<a href="">Exportar XML</a><br/>
						<a href="">Imprimir Llistat</a><br/>
					</div>	
				</div>
			</section>
			
			<section class="admin">
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionSubs.jpg" width="150">
					</figure>
					<div>
						<h3>Gestión Subscripcions</h3>
						<a href="">Listar Subscripció</a><br/>
						<a href="">Agregar Subscripció</a><br/>
						<a href="">Eliminar Subscripció</a><br/>

					</div>
				</div>

				<div class="col">
					<figure>
						<img alt="" src="images/panel/estadisticas.jpeg" width="150">
					</figure>
					<div>
						<h3>Estadísticas</h3>
						<a href="">Actualizar Datos</a><br/><br/>
						<p class="resEs">Total Usuaris Registrats: </p>
						<p class="resEs">Total Cursos Publicats: </p>
						<p class="resEs">Total Areas Formatives: </p>
						<p class="resEs">Total Pre-Inscripcions: </p>
						<p class="resEs">Total Subscripcions: </p>
					</div>
				</div>
				
			</section>
			


		</section>
		
		<?php Template::footer();?>
    </body> 
</html>