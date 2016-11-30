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
		<br/>
			<form  class="buscadorFondo" method="POST">
				<label>Cercar Area per ID</label>
				<input class="buscador"  type="text" name="cercaArea"/>
				<button  class="buttonForm search" type="submit" name="cercadorArea" value="cercar"><img  src="images/buscar.png"> Cercar</button>
			</form>
		</section>

		<section id="content">
			<h2>Area Seleccionada</h2>
						
			<table id='tabla'>
				<tr>
					<th>Nom</th>		
					<th>Modificar</th>
				</tr>	
		<?php		
					echo "<tr>";
					echo@ "<td>$cerca->nom</td>";
					echo@ "<td><a href='index.php?controlador=Area&operacion=editar&parametro=$cerca->id'><img class='icon' src='images/editar.png'></a></td>";
					echo "</tr>";
					
		?>
			</table>

		</section>
		
		
		<?php Template::footer();?>
    </body>
</html>
