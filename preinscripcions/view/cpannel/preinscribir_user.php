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
		
		<section>
			<form method="POST">
				<label>Cercar usuari per DNI</label>
				<input type="text" name="cercaUsuari"/>
				<input type="submit" name="cercadorUsuaris" value="cercar"/>
			</form>
		</section>

		<section id="content">
			<h2>Preinscriure Usuaris registrats</h2>
						
			<table id='tabla'>
				<tr>
					<th>Nom</th>		
					<th>Cognom 1</th>
					<th>Cognom 2</th>					
					<th>Dni</th>
					<th>Email</th>
					<th>Buscar</th>
				</tr>	
		<?php		
		
				
					echo "<tr>";
					echo@ "<td>$cerca->nom</td>";
					echo@ "<td>$cerca->cognom1</td>";
					echo@ "<td>$cerca->cognom2</td>";
					echo@ "<td>$cerca->dni</td>";
					echo@ "<td>$cerca->email</td>";
					
					echo "<td><form>
						<input type='hidden' name='id_usuari' value='$cerca->id'>
						<select name ='id_curs'>;"
					?>
					<?php 
					
						foreach($cursos as $c){
							echo "<option value=$c->id>$c->nom</option>";
						}				

					echo "</select>
						</form></td>";
					echo "</tr>";
						
		
		?>
		<form method="post">
			<input type="submit" name="guardar" value="Confirmar" />
		</form>	
			</table>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>
