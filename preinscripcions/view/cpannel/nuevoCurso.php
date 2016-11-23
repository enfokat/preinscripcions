<!DOCTYPE html>
<html lang="ca">
	<head>
		<base href="<?php echo Config::get()->url_base;?>" />
		<meta charset="UTF-8">
		<title>Agregar nou Curs</title>
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
			<h2>Agregar Nou Curs</h2>
			<form method="post"  autocomplete="off">
			
				<label>Nom:</label>
				<input type="text" name="nom" required="required" onBlur="MaysPrimera(this);" /><br/>
				
				<label>Codi:</label>
				<input type="text" name="codi" required="required"/><br/>
				
				<label>Area Formativa:</label>
					<select name="id_area">
						<option></option>
						<option value="0">Altres</option>
						<option value="1">Soldadura</option>
						<option value="2">Mecànica Convencional</option>
						<option value="3">Disseny Mecànic</option>
						<option value="4">Electricitat</option>
						<option value="5">Logística</option>
						<option value="6">Comunicacions - microinformàtica</option>
						<option value="7">Programació i web</option>
						<option value="8">PLCs i automatismes</option>
						<option value="9">Pneumàtica i hidràulica</option>
						<option value="10">e-commerce</option>
						<option value="11">Fontanería, climatització i calefacció</option>
					</select><br/><br/>
				
				<label>Descripció:</label>
				<textarea name="descripcio"></textarea><br/>
				
				<label>Hores:</label>
				<input type="text" name="hores" required="required"/><br/>
				
				<label>Data Inici:</label>
				<input type="date" name="data_inici" required="required"/><br/>
				
				<label>Data Fi:</label>
				<input type="date" name="data_fi" /><br/>
				
				<label>Horari:</label>
				<input type="text" name="horari" required="required"/><br/>	
				
				<label>Torn</label>
				<select name="torn">
					<option></option>
					<option value="M">Mati</option>
					<option value="T">Tarda</option>
					<option value="N">Nit</option>
				</select><br/>
				
				<label>Tipus</label>
					<input type="text" name="tipus"/>  
				<br/>
				
				<label>Requisits</label>
				<textarea name="requisits"></textarea>  
					
<br/><br/><br/>
				
				<label></label>
				<input type="submit" name="guardar" value="guardar"/>
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>