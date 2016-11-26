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
			<h2 class="titul">Acerca de Preinscripcions</h2><br/>
			<p>Aquesta aplicació serveix per la gestió de Preincripcions</p>
			
			<p>El desenvolupament ha estat a carrec de Montserrat Valero y Pedro Pérez fent us de Robs Micro Framnework de Robert Sallent com a práctica final del curs Desenvolupament d'aplicacions web</p>
			
			<p>Totes les eines de desenvolupament empleades son de Software lliure</p>
			
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>