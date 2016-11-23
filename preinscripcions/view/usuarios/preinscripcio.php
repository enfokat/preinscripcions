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
<<<<<<< HEAD
					<th>id usuari</th>
					<th>Codi curs</th>	
					<th>Nom curs</th>		
					<th>Data inscripcio</th>					
					<th>Data Inici curs</th>
					<th>Descripció</th>
					<th>Duració</th>
					<th></th>
=======
					<th>Codi Curs</th>		
					<th>Nom Curs</th>
					<th>Duració</th>					
					<th>Data Inici</th>
					<th>Data Inscripció</th>
>>>>>>> branch 'master' of https://github.com/enfokat/preinscripcions.git
				</tr>	
		<?php		
<<<<<<< HEAD
				foreach($preinscripcions as $p){ //poner el formulario de acceso para registrado
=======
				foreach($preinscripcions as $p){
>>>>>>> branch 'master' of https://github.com/enfokat/preinscripcions.git
					echo "<tr>";
<<<<<<< HEAD
					//echo "<td><a href='index.php?controlador=Curso&operacion=inscripcion&parametro=$curso->id'>Inscribirme</a></td>";
					//echo "<td><img src='images/areas/$curso->id_area.jpeg' alt='$curso->id_area' width=100></td>";
					echo "<td>$p->id_usuari</td>";
					echo "<td>$p->codi</td>";
					echo "<td>$p->nom</td>";
=======
					echo "<td>$p->codi</td>";
					echo "<td><a href='index.php?controlador=Curso&operacion=ver&parametro=$p->id'>$p->nom</a></td>";
					echo "<td>$p->hores hores</td>";
					echo "<td>$p->data_inici</td>";
>>>>>>> branch 'master' of https://github.com/enfokat/preinscripcions.git
					echo "<td>$p->data</td>";
<<<<<<< HEAD
					echo "<td>$p->data_inici</td>";
					echo "<td>$p->descripcio</td>";
					echo "<td>$p->hores</td>";
					
					echo "<td id='borrar'><a href='index.php?controlador=Preinscripcio&operacion=borrarPreinscripcio&parametro=$p->id'>
					<img src='images/papelera.png' title='Borrar'/>
					<fidcation</a></td>";				
=======
>>>>>>> branch 'master' of https://github.com/enfokat/preinscripcions.git
					echo "</tr>";
				}			
		
		?>
			</table>
			<br/><br/>
			<p>Per veure els detalls del curs inscrit fes click sobre el nom</p>
		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
