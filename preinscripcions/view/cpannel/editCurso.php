<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Editar Curs</title>
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
		
			<section>
			<form method="POST">
				<label>Cercar Curs per Codi</label>
				<input type="text" name="cercaCurs"/>
				<input type="submit" name="cercadorCurs" value="cercar"/>
			</form>
		</section>

		<section id="content">
			<h2 class="titul">Curs sel.leccionat</h2>
						
			<table id='tabla'>
				<tr>
					<th>Codi</th>		
					<th>Nom</th>
					<th>Descripció</th>					
					<th>Data Inici</th>
					<th>Horari</th>
					<th>Modificar</th>
				</tr>	
		<?php		
					echo "<tr>";
					echo@ "<td>$cerca->codi</td>";
					echo@ "<td>$cerca->nom</td>";
					echo@ "<td>$cerca->descripcio</td>";
					echo@ "<td>$cerca->data_inici</td>";
					echo@ "<td>$cerca->horari</td>";
					echo@ "<td><a href='index.php?controlador=Curso&operacion=editar&parametro=$cerca->id'>Modificar</a></td>";
					echo "</tr>";
						
		
		?>
			</table>

		</section>
		
		
		<?php Template::footer();?>
    </body>
</html>
