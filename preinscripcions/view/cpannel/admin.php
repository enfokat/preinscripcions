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
						<h2 class="titul">Panel de Control</h2>
			
			<section class="admin">
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionUsuarios.jpg" width="150">
					</figure>
					<div>
						<h3>Gestió de Usuaris</h3>
						<a href="index.php?controlador=Usuario&operacion=registro">Agregar usuari</a><br/>
						<a href="index.php?controlador=Usuario&operacion=listarTodos">Llistar Usuaris</a><br/>
						<a href="index.php?controlador=Usuario&operacion=admModificar">Modificar usuari</a><br/>
						<a href="index.php?controlador=Usuario&operacion=admBorrar">Esborrar usuari</a><br/>
					</div>
				</div>
				
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionCursos.png" width="150">
					</figure>
					<div>
						<h3>Gestió de Cursos</h3>
						<a href="index.php?controlador=Curso&operacion=agregar">Agregar Curs</a><br/>
						<a href="index.php?controlador=Curso&operacion=listar">Llistar Curs</a><br/>
						<a href="index.php?controlador=Curso&operacion=admModificar">Modificar Curs</a><br/>
						<a href="index.php?controlador=Curso&operacion=admBorrar">Esborrar Curs</a><br/>
					</div>	
				</div>
			</section>
			
						<section class="admin">
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionArea.png" width="150">
					</figure>
					<div>
						<h3>Gestió Àreas Formativa</h3>
						<a href="index.php?controlador=Area&operacion=guardado">Agregar Àrea</a><br/>
						<a href="index.php?controlador=Area&operacion=listado">Llistar Àrea</a><br/>
						<a href="index.php?controlador=Area&operacion=modificado">Modificar Àrea</a><br/>
						<a href="index.php?controlador=Area&operacion=admBorrar">Esborrar Àrea</a><br/>
					</div>
				</div>
				
				<div class="col">
					<figure>
						<img alt="" src="images/panel/gestionPre.jpg" width="150">
					</figure>
					<div>
						<h3>Gestió Pre-inscripcions</h3>
						<a href="index.php?controlador=Preinscripcio&operacion=guardarPreins&parametro=$cerca->dni">Agregar Pre-Inscripció</a><br/>
						<a href="index.php?controlador=Preinscripcion&operacion=borrarPreinscAdm&parametro=$p->id">Llistar Pre-Inscripció</a><br/>
						<a href="">Esborrar Pre-Inscripció</a><br/>
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
						<a href="">Listar Usuaris Subscrits</a><br/>
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
						<a href="index.php?controlador=Cpannel&operacion=menu">Actualizar Datos</a><br/><br/>
						<label class="resEs">Total Usuaris Registrats:</label><b class="totales">  <?php  echo $sumaU[0]->suma; ?></b><br/>
						<label class="resEs">Total Cursos Publicats:</label><b class="totales">  <?php  echo $sumaC[0]->suma; ?></b><br/>				
						<label class="resEs">Total Areas Formatives: </label><b class="totales">  <?php  echo $sumaA[0]->suma; ?></b><br/>
						<label class="resEs">Total Pre-Inscripcions:</label><b class="totales">  <?php  echo $sumaP[0]->suma; ?></b><br/>
						<label class="resEs">Total Subscripcions</label><b class="totales">  <?php  echo $sumaS[0]->suma; ?></b><br/>
					</div>
				</div>
				
			</section>
			


		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
