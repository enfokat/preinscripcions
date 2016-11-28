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
			<h2 class="titul">Protecció de Dades Personals</h2><br/>
			<p>En compliment del que s'estableix en la Llei orgànica 15/1999, de 13 de desembre,
			 de Protecció de Dades de Caràcter Personal, l'informem que,  
			 les seves dades personals quedaran incorporades i seran tractades en els fitxers “Pre-Inscripcions”
			 propietat de CIFO Vallès, amb l'objectiu de poder oferir-li les nostres ofertes formatives.
			 Així mateix, l'informem de la possibilitat que exerceixi els drets d'accés, rectificació, 
			 cancel·lació i oposició de les seves dades de caràcter personal, comunicant-ho al mateix centre, 
			 o desde aquesta mateixa aplicació desde la opció "Mis Dades", Baixa del Servei.</p>
			
			
			
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>