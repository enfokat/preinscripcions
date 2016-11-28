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
						<h2>Llistat de Subscripcions</h2>
						
						<table id='tabla'>
				<tr>
					<th>Area Formativa</th>		
					<th>Data Subscripció</th>
					<th>Nom</th>					
					<th></th>
					<th>email</th>
					<th>Modificar</th>
					<th>Esborrar</th>
				</tr>	
		<?php		
				foreach($usuarios as $u){
					echo "<tr>";
					echo "<td>$u->nom</td>";
					echo "<td>$u->cognom1</td>";
					echo "<td>$u->cognom2</td>";
					echo "<td>$u->dni</td>";
					echo "<td>$u->email</td>";
					echo "<td><a href=''>Modificar</a></td>";
					echo "<td><a href=''>Esborrar</a></td>";
					echo "<td></td>";
					echo "</tr>";
				}			
		
		?>
			</table>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>