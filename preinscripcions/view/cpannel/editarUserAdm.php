<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>CPannel - Modificar Usuari</title>
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
		<br/>
			<form class="buscadorFondo" method="POST">
				<label  class="buscador">Cercar usuari per DNI </label>
				<input class="buscador"  type="text" name="cercaUsuari"/>
				<button  class="buttonForm search"  type="submit" name="cercadorUsuaris" value="cercar"><img  src="images/buscar.png"/> Cercar</button>
			</form>
		</section>

		<section id="content" >
			<h2 class="titul">Llistat dels Usuaris registrats</h2>
						
			<table id='tabla'>
				<tr>
					<th>Nom</th>		
					<th>Cognom 1</th>
					<th>Cognom 2</th>					
					<th>Dni</th>
					<th>Email</th>
					<th>Modificar</th>
				</tr>	
		<?php		
		
				
					echo "<tr>";
					echo@ "<td>$cerca->nom</td>";
					echo@ "<td>$cerca->cognom1</td>";
					echo@ "<td>$cerca->cognom2</td>";
					echo@ "<td>$cerca->dni</td>";
					echo@ "<td>$cerca->email</td>";
					echo@ "<td><a href='index.php?controlador=Usuario&operacion=editUserAdm&parametro=$cerca->dni'><img class='icon' src='images/editar.png'></a></td>";
					echo "</tr>";
						
		
		?>
			</table>

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>