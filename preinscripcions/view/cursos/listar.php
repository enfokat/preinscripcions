<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Preinscripcions</title>
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
			<h1 class="titul">Listado de cursos</h1>
			<table id='tabla'>	
	<?php 
		if(!$usuario){ //poner el formulario de acceso para no registrado
			echo "<tr>";			
			echo "<th>Area Formativa</th>";
			echo "<th>Codi</th>";
			echo "<th>Nom</th>";
			echo "<th>Descripció</th>";
			echo "<th>Duració</th>";
			echo "<th></th>";
			echo "</tr>";			
			foreach($cursos as $curso){
				echo "<tr>";
				echo "<td><img src='images/areas/$curso->id_area.jpeg' alt='$curso->id_area' width=100></td>";
				echo "<td>$curso->codi</td>";
				echo "<td>$curso->nom</td>";
				echo "<td>$curso->descripcio</td>";
				echo "<td>$curso->hores hores</td>";
				echo "<td><a href='index.php?controlador=Curso&operacion=ver&parametro=$curso->id'>
				<img class='icon' src='images/info.png' width='60' title='Ver'/></a></td>";
				echo "</tr>";
			}			
		}else{
			echo "<table id='tabla'>";
			echo "<tr>";
			echo "<th></th>";
			echo "<th>Area Formativa</th>";
			echo "<th>Codi</th>";
			echo "<th>Nom</th>";
			echo "<th>Descripció</th>";
			echo "<th>Duració</th>";
			echo "<th></th>";
			echo "</tr>";			
				foreach($cursos as $curso){ //poner el formulario de acceso para  registrado
					echo "<tr>";
					echo "<td><a href='index.php?controlador=Curso&operacion=inscripcion&parametro=$curso->id'>Inscribirme</a></td>";
					echo "<td><img src='images/areas/$curso->id_area.jpeg' alt='$curso->id_area' width=100></td>";
					echo "<td>$curso->codi</td>";
					echo "<td>$curso->nom</td>";
					echo "<td>$curso->descripcio</td>";
					echo "<td>$curso->hores hores</td>";
					echo "<td><a href='index.php?controlador=Curso&operacion=ver&parametro=$curso->id'>
					<img class='icon' src='images/info.png' width='60' title='Ver'/></a></td>";
					echo "</tr>";
				}				
		}
?>

	</table>		
		</section>
			<br/><br/>
		
		<?php Template::footer();?>
    </body> 
</html>