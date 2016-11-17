<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Registro de usuarios</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css2;?>" />
		<script type="text/javascript" src="js/script.js"></script>
	</head>
	
	<body>
		<?php 
			Template::header(); //pone el header

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menú
		?>
		
		<section id="content">
			<h2>Formulario de registro</h2>
			<form method="post"  autocomplete="off">
			
				<label>Nom:</label>
				<input type="text" name="nom" required="required"  onBlur="MaysPrimera(this);" /><br/>
				
				<label>Cognom1:</label>
				<input type="text" name="cognom1" required="required"  onBlur="MaysPrimera(this);" /><br/>
				
				<label>Cognom 2:</label>
				<input type="text" name="cognom2"  onBlur="MaysPrimera(this);" /><br/>
				
				<label>Data Naixament:</label>
				<input type="date" name="data_naixement" required="required" placeholder="AAAA-MM-DD"/><br/>
				
				<label>DNI:</label>
				<input type="text" name="dni" required="required"  onBlur="Mayus(this);" /><br/>
				
				<label>Telefon Movil:</label>
				<input type="text" name="telefon_mobil" required="required"/><br/>
				
				<label>Telefon Fix:</label>
				<input type="text" name="telefon_fix" /><br/>
				
				<label>E-mail:</label>
				<input type="email" name="email" required="required"/><br/>	
				
				<label> Nivell d'estudis</label>
				<select name="estudis">
					<option></option>
					<option value="0">Sense Estudis</option>
					<option value="1">Educació Primaria</option>
					<option value="2">Educació Secondaria</option>
					<option value="3">Cicles Formatius Grau Mitjà</option>
					<option value="4">Cicles Formatius Grau Superior</option>
					<option value="5">Batxillerat</option>
					<option value="6">Estudis Universitaris</option>
				</select><br/>
				
				<label>Situació Laboral</label>
					<input type="radio" name="situacio_laboral" value="0"/><label>Desempleat</label> 
					<input type="radio" name="situacio_laboral" value="1"/><label>Empleat</label> 
				<br/>
				
				<label>¿Rep alguna prestació?</label>
				<input type="radio" name="prestacio" value="1"/><label>SÍ</label> 
				<input type="radio" name="prestacio" value="0"/><label>NO</label> 
					

				
				<label></label>
				<input type="submit" name="guardar" value="guardar"/>
				<input type="reset" name="reset" value="Esborrar"/><br/>
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>