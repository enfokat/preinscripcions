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

			if(!$usuario) Template::login(); //posa el formulari de login
			else Template::logout($usuario); //pone el formulari de logout
			
			Template::menu($usuario); //posa el menú
		?>

		<section id="content">
			<article id="lista" class="verCurso">
				<h1>Detalls del curs:</h1>
				<hr>
				
				<h2><?php echo $curso->nom;?></h2>
				
				<article class="caract">
					<div>
						<p><b>Tipus: </b>  <?php echo $curso->tipus;?></p>
						<p><b>Hores:</b> <?php echo $curso->hores;?></p>
						<p><b>Requisits:</b> <?php echo $curso->requisits;?></p>
					</div>
					<figure>
						<img src="images/areas/<?php echo $curso->id_area;?>.jpeg" height=200  width=150>
					</figure>
				</article>	
				
				<article class="infCurs">
						<h1>Descripció del Curs</h1>
						<p><?php echo $curso->descripcio;?></p>
				</article>
				
				<article class="infCurs"> 
						<h1>Informació del Curs</h1>
						<p><b>Data de Inici: </b> <?php echo $curso->data_inici;?></p>
						<p><b>Data Finalització: </b> <?php echo $curso->data_fi;?></p>
						<p><b>Horari: </b> <?php echo $curso->horari;?></p>
						<p><b>Torn: </b> <?php echo $curso->torn;?></p>
				</article>
				

				<form method="post" action="index.php?controlador=preinscripcio&operacion=crear&parametro=<?php echo $curso->id;?>">
					<button type="submit" class="buttonInscr" name="guardar" value="inscribir-me" ><img src="images/editar.png"> Inscriure'm</button>
				</form>
			</article>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
