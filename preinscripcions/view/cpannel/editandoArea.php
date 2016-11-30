<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Agregar Àrea Formativa</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css2;?>" />
		<script type="text/javascript" src="<?php echo Config::get()->js;?>"></script>
	</head>
	
	<body>
		<?php 
			Template::header(); //pone el header.

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menú
		?>
		
		<section id="content">
			<h2 class="titul">Agregar Àrea Formativa</h2>
			
			<form method="post">
				<label>Editar Àrea Formativa</label>
				<input name="nom"  type="text"  value="<?php echo $area->nom; ?>">
				<input type="submit" name="guardar" value="Guardar">
			</form>

		</section>
		
		<?php Template::footer();?>
    </body>
</html>