<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Agregar Preinscripció</title>
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
		
		<section class="busca">
			<form method="POST">
				<label>Cercar Preinscripció per Dni</label>
				<input type="text" name="cercaUsuari"/>
				<input type="submit" name="cercadorUsuari" value="cercar"/>
			</form>

			<form method="POST">
				<label>Cercar Preinscripció per Curs</label>
				<input type="text" name="cercaCurs"/>
				<input type="submit" name="cercadorCurs" value="cercar"/>
			</form>
		</section>

		<section id="content">
			<h2 class="titul">Llistat de Preinscripcions</h2>
						
			<table id='tabla'>
				<tr>
					<th>Nom Curs</th>		
					<th>DNI</th>
					<th>Data Preinscripcio</th>					
					<th>Telefon</th>
				</tr>	
		<?php		
				foreach($preinsc as $p){
					echo "<tr>";
					echo "<td>$p->nom</td>";
					echo "<td>$p->dni</td>";
					echo "<td>$p->data</td>";
					echo "<td>$p->telefon_mobil</td>";
					echo "</tr>";
				}	
						
		
		?>
			</table>

		</section>
		
		
		<?php Template::footer();?>
    </body>
</html>
