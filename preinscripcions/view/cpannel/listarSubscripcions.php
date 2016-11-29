<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>CPannel - Listar Subscripcions</title>
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
						<h2 class="titul">Llistat de Subscripcions</h2>
						
						<table id='tabla'>
				<tr>
					<th>Area Formativa</th>		
					<th>Data Subscripció</th>
					<th>Dni</th>					
					<th>Telefón Móvil</th>
					<th>email</th>
					<th>Esborrar</th>
				</tr>	
		<?php	
				foreach($subs as $s){
					echo "<tr>";
					echo "<td>$s->nom</td>";
					echo "<td>$s->data</td>";
					echo "<td>$s->dni</td>";
					echo "<td>$s->telefon_mobil</td>";
					echo "<td>$s->email</td>";
					echo "<td><a href='index.php?controlador=Subscripcions&operacion=borrar&u=$s->id_usuari&a=$s->id_area'><img class='icon' src='images/borrar.png'></a></td>";
					echo "</tr>";
				}			
		
		?>
			</table>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>