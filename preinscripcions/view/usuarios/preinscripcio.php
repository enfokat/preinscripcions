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
					<th>Codi curs</th>	
					<th>Nom curs</th>		
					<th>Data inscripcio</th>					
					<th>Data Inici curs</th>
					<th>Descripció</th>
					<th>Duració</th>
					<th>Esborrar</th>
				</tr>	
		<?php		
				foreach($preinscripcions as $p){
					echo "<tr>";
					echo "<td>$p->codi</td>";
					echo "<td>$p->nom</td>";					
					$fecha = new DateTime($p->data);										
					//echo "<td>$p->data</td>";
					echo "<td>"; echo $fecha->format("d/m/Y"); echo "</td>";
					echo "<td>$p->data_inici</td>";
					echo "<td>$p->descripcio</td>";
					echo "<td>$p->hores hores</td>";
					echo "<td id='borrar'><a href='index.php?controlador=Preinscripcio&operacion=borrarPreinscripcio&parametro=$p->id'>
					<img  class='icon' src='images/borrar.png' title='Borrar'/>
					<fidcation</a></td>";				
					echo "</tr>";
				}			
		
		?>
			</table>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
