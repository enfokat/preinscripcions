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
			<h1 class="titul">¿Vols Rebre Informació?</h1>
			
			<p>Per Rebre informació sobre els futurs cursos que es publiquin, tens de estar enregistrat en aquesta aplicació, i fer click al botó "Subscribir-me" de l'àrea que t'interisi. </p>		
		
			<h1 class="titul">Listado de cursos</h1>
			<table id='tabla'>	
	<?php 
			echo "<tr>";			
			echo "<th>ID</th>";
			echo "<th>Nom Àrea Formativa</th>";
			echo "<th>Subscripció</th>";
			echo "</tr>";			
			foreach($areas as $a){
				echo "<tr><form method='post'>";
				echo "<td>$a->id</td>";
				echo "<td>$a->nom</td>";
				echo "<td><a href='index.php?controlador=subscripcions&operacion=nuevo&parametro=$a->id'><img class='icon' src='images/guardar.png'/></a></td>";
				echo "</form></tr>";
			}					
?>

	</table>		
		</section>
		<br/><br/>
		
		<?php Template::footer();?>
    </body> 
</html>
