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
					<th>Codi Curs</th>		
					<th>Nom Curs</th>
					<th>Duració</th>					
					<th>Data Inici</th>
					<th>Data Inscripció</th>
				</tr>	
		<?php		
		var_dump($preinscripcions);
				foreach($preinscripcions as $p){ //poner el formulario de acceso para registrado
					echo "<tr>";
					echo "<td>$p->codi</td>";
					echo "<td>$p->nom</td>";
					echo "<td>**</td>";
					echo "<td>**</td>";
					echo "<td>$p->data</td>";
					echo "</tr>";
				}			
		
		?>
			</table>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
