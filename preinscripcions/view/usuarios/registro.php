<!DOCTYPE html>
<html>
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Registro de usuarios</title>
		<link rel="stylesheet" type="text/css" href="<?php echo Config::get()->css;?>" />
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
			<form method="post" enctype="multipart/form-data" autocomplete="off">
			
				<label>Nom:</label>
				<input type="text" name="nom" required="required" 
					pattern="^[a-zA-Z]\w{2,9}" title="3 a 10 caracteres (numeros, letras o guión bajo), comenzando por letra"/><br/>
				
				<label>Cognom1:</label>
				<input type="text" name="cognom1" required="required" 
					pattern=".{4,16}" title="4 a 16 caracteres"/><br/>
				
				<label>Cognom 2::</label>
				<input type="text" name="cognom2" /><br/>
				
				<label>Data Naixament:</label>
				<input type="date" name="data_naixament" required="required" placeholder="DD/MM/AAAA"/><br/>
				
				<label>DNI:</label>
				<input type="text" name="dni" required="required" /><br/>
				
				<label>Telefon Movil:</label>
				<input type="text" name="telefon_mobil" required="required"/><br/>
				
				<label>Telefon Fix:</label>
				<input type="text" name="telefon_fix" /><br/>
				
				<label>E-mail:</label>
				<input type="email" name="email" required="required"/><br/>	
				
				<label> Nivell d'estudis</label>
				<select name="estudis">
					<option></option>
					<option>Sense Estudis</option>
					<option>Educació Primaria</option>
					<option>Educació Secondaria</option>
					<option>Cicles Formatius Grau Mitjà</option>
					<option>Cicles Formatius Grau Superior</option>
					<option>Batxillerat</option>
					<option>Estudis Universitaris</option>
				</select><br/>
				
				<label>Situació Laboral</label>
					<input type="radio" name="situacio_laboral" value="Desempleat"/><label>Desempleat</label> 
					<input type="radio" name="situacio_laboral" value="Empleat"/><label>Empleat</label> 
				<br/>
				
				<label>¿Rep alguna prestació?</label>
				<input type="radio" name="prestacio" value="si"/><label>SÍ</label> 
				<input type="radio" name="prestacio" value="no"/><label>NO</label> 
					

				
				<label></label>
				<input type="submit" name="guardar" value="guardar"/>
				<input type="reset" name="reset" value="Esborrar"/><br/>
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>