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
			<h1>Listado de cursos</h1>
	<table id="tabla">			
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
				<img src='images/ver.jpeg' width='60' title='Ver'/></a></td>";
				echo "</tr>";
			}			
		}else{
			echo "<table id='tabla'>";
			echo "<tr>";
			echo "<th>Num de Inscrits</th>";
			echo "<th>Area Formativa</th>";
			echo "<th>Codi</th>";
			echo "<th>Nom</th>";
			echo "<th>Descripció</th>";
			echo "<th>Duració</th>";
			echo "<th></th>";
			echo "<th></th>";
			echo "<th></th>";
			echo "</tr>";			
				foreach($inscrits as $curso){ 
					echo "<tr>";
					echo "<td>$curso->suma</td>";
					echo "<td><img src='images/areas/$curso->id_area.jpeg' alt='$curso->id_area' width=100></td>";
					echo "<td>$curso->codi</td>";
					echo "<td>$curso->nom</td>";
					echo "<td>$curso->descripcio</td>";
					echo "<td>$curso->hores hores</td>";
					echo "<td><a href='index.php?controlador=Curso&operacion=ver&parametro=$curso->id'>
					<img src='images/ver.jpeg' width='60' title='Ver'/></a></td>";
					echo "<td><a href=''>Modificar</a></td>";
					echo "<td><a href=''>Esborrar</a></td>";
					echo "</tr>";
				}				
		}
?>

	</table>		
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
