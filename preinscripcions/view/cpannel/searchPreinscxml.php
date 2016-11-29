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
		
		
		<section id="content">
			<h2 class="titul">Llistat de Preinscripcions</h2>
						
			<table id='tabla'>
				<tr>
					<th>Nom Curs</th>		
					<th>DNI</th>
					<th>Data Preinscripcio</th>					
					<th>Telefon</th>
					<th>Esborrar preinscripcio</th>
				</tr>	
		<?php		
				foreach($preinsc as $p){
					echo "<tr>";
					echo "<td>$p->nom</td>";
					echo "<td>$p->dni</td>";
					$fecha = new DateTime($p->data);					
					echo "<td>"; echo $fecha->format("d/m/Y"); echo "</td>";					
					echo "<td>$p->telefon_mobil</td>";
					echo "<td id='borrar'><a href='index.php?controlador=Preinscripcio&operacion=borrarPreinscAdm&u=$p->id_usuari&c=$p->id_curs'>
					<img class='icon' src='images/borrar.png' title='Borrar'/>
					<fidcation</a></td>";
					echo "</tr>";
				}	
						
		
		?>
		</table>
		<form method="post" style="text-align: right;" action="index.php?controlador=Preinscripcio&operacion=expXml">
			<span>Descargar</span>
			<input type="checkbox" name="descargar" value="1"/>
			<input type="submit" name="axml" value="a XML" />
		</form>	

		</section>
		
		
		<?php Template::footer();?>
    </body>
</html>