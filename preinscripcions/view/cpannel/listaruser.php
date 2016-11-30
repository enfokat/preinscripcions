<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>CPannel - Administración</title>
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
						<h2 class="titul">Llistat dels Usuaris registrats</h2>
						
						<table id='tabla'>
				<tr>
					<th>Nom</th>		
					<th>Cognom 1</th>
					<th>cognom 2</th>					
					<th>Dni</th>
					<th>email</th>
				</tr>	
		<?php		
				foreach($usuarios as $u){
					echo "<tr>";
					echo "<td>$u->nom</td>";
					echo "<td>$u->cognom1</td>";
					echo "<td>$u->cognom2</td>";
					echo "<td>$u->dni</td>";
					echo "<td>$u->email</td>";
					echo "</tr>";
				}			
		
		?>
			</table>

		</section>
		
		<br/><br/>
		
		<?php Template::footer();?>
    </body> 
</html>