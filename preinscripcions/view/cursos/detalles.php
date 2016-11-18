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

			if(!$usuario) Template::login(); //posa el formulari de login
			else Template::logout($usuario); //pone el formulari de logout
			
			Template::menu($usuario); //posa el menú
		?>

		<section id="content">
			<article id="lista">
			<h1>Detalls del curs:</h1>
			
			<h2><?php echo "Codi: $curso->codi, nom: $curso->nom";?></h2>
			
			<ul>
				<li><b>Codi: </b><?php echo $curso->codi;?></li>				
				<li><b>id_area: </b><?php echo $curso->id_area;?></li>
				<li><b>Nom: </b><?php echo $curso->nom;?></li>
				<li><b>Descripcio: </b><?php echo $curso->descripcio;?></li>
				<li><b>Hores: </b><?php echo $curso->hores;?></li>
				<li><b>Data_inici: </b><?php echo $curso->data_inici;?></li>
				<li><b>Data_fi: </b><?php echo $curso->data_fi;?></li>
				<li><b>Horari: </b><?php echo $curso->horari;?></li>
				<li><b>Torn: </b><?php echo $curso->torn;?></li>
				<li><b>Tipus: </b><?php echo $curso->tipus;?></li>
				<li><b>Requisits: </b><?php echo $curso->requisits;?></li>			
			</ul>
			</article>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
