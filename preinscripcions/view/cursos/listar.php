<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Preinscripcions</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css2;?>" />
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
				<tr>
					<th>Codi</th>
					<th>Nom</th>
					<th>Descripcio</th>
					<th>Hores</th>
					<th></th>
				</tr>
		<?php 
			foreach($cursos as $curso){
				echo "<tr>";
				echo "<td>$curso->codi</td>";
				echo "<td>$curso->nom</td>";
				echo "<td>$curso->descripcio</td>";
				echo "<td>$curso->hores</td>";
				echo "<td><a href='index.php?controlador=Curso&operacion=ver&parametro=$curso->id'>
				<img src='images/ver.jpeg' width='60' title='Ver'/></a></td>";
				echo "</tr>";
			}
		?>
			</table>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
