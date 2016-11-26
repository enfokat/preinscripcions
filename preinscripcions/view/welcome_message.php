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
			<h2 class="titul">Pre-Inscripcions</h2>
			<p>Apunta't als cursos que t'interessin</p>
			
			<p>En aquest centre trobaràs un gran ventall de cursos a la teva mida.</p>
			
			<p>Hi ha cursos de diferents nivells de dificultad que s'adapten als diferents perfils dels alumnes</p>
			
			<p>Són cursos adaptats a les necessitats del mercat de treball i, a més, donen l'opció de l'obtenció de títols que faciliten la inserció laboral</p>
			
			<p>per tal poder inscriure't en un curs has d'estar enregistrat.</p>
			<p>Per enregistrar-te has d'anar a llistar cursos</p>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>