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
			<h1>Llistat de les meves inscripcions</h1>			
	
			<table id='tabla'>
				<tr>
					<th>id_curs</th>		
					<th>id_usuari</th>					
					<th>Nom</th>
					<th>Descripció</th>
					<th>Duració</th>
					<th></th>
				</tr>	
		<?php		
				foreach($preinscripcions as $preinscripcio){ //poner el formulario de acceso para registrado
					echo "<tr>";
					//echo "<td><a href='index.php?controlador=Curso&operacion=inscripcion&parametro=$curso->id'>Inscribirme</a></td>";
					//echo "<td><img src='images/areas/$curso->id_area.jpeg' alt='$curso->id_area' width=100></td>";
					echo "<td>$preinscripcio->codi</td>";
					echo "<td>$preinscripcio->nom</td>";
					echo "<td>$preinscripcio->descripcio</td>";
					echo "<td>$preinscripcio->hores</td>";
					echo "<td><a href='index.php?controlador=Preinscripcio&operacion=verPreinscripcio&parametro=$curso->id'>
					<img src='images/ver.jpeg' width='60' title='Ver'/></a></td>";
					echo "</tr>";
				}			
		
		?>
			</table>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>