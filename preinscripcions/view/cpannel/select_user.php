<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>CPannel - Modificarr Usuari</title>
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
			<h2 class="titul">Cerca d'usuari</h2>
		
			<form class="buscadorFondo" method="POST">
				<label>Cercar usuari per DNI</label>
				<input class="buscador" type="text" name="dni"/>
				<button  class="buttonForm search"  type="submit" name="cercadorUsuaris" value="cercar"><img  src="images/buscar.png"/> Cercar</button>
			</form>
		</section>
		<br/><br/><br/>
		<?php Template::footer();?>
    </body> 
</html>
