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
			Template::header(); //pone el header.

			if(!$usuario) Template::login(); //pone el formulario de login
			else Template::logout($usuario); //pone el formulario de logout
			
			Template::menu($usuario); //pone el menú
		?>
		
		<section id="content">
			<h2>Formulario de registro</h2>
			<form method="post"  autocomplete="off">
			
				<label>Nom:</label>
				<input type="text" name="nom" required="required"  onBlur="MaysPrimera(this);" value="<?php echo $usuario->nom;?>"/><br/>
				
				<label>Cognom1:</label>
				<input type="text" name="cognom1" required="required"  onBlur="MaysPrimera(this);"  value="<?php echo $usuario->cognom1;?>" /><br/>
				
				<label>Cognom 2:</label>
				<input type="text" name="cognom2"  onBlur="MaysPrimera(this);"  value="<?php echo $usuario->cognom2;?>"/><br/>
				
				<label>Data Naixement:</label>
				<input type="date" name="data_naixement" required="required" placeholder="AAAA-MM-DD"   value="<?php echo $usuario->data_naixement;?>"/><br/>
				
				<label>DNI:</label>
				<input type="text" name="dni" required="required"  onBlur="Mayus(this);"   value="<?php echo $usuario->dni;?>" /><br/>
				
				<label>Telefon Movil:</label>
				<input type="text" name="telefon_mobil" required="required"   value="<?php echo $usuario->telefon_mobil;?>" /><br/>
				
				<label>Telefon Fix:</label>
				<input type="text" name="telefon_fix"  value="<?php echo $usuario->telefon_fix;?>"/><br/>
				
				<label>E-mail:</label>
				<input type="email" name="email" required="required"    value="<?php echo $usuario->email;?>"/><br/>	
				
				<label> Nivell d'estudis</label>
				<select name="estudis"   >
					<option><?php echo $usuario->estudis;?></option>
					<option value="0">Sense Estudis</option>
					<option value="1">Educació Primaria</option>
					<option value="2">Educació Secondaria</option>
					<option value="3">Cicles Formatius Grau Mitjà</option>
					<option value="4">Cicles Formatius Grau Superior</option>
					<option value="5">Batxillerat</option>
					<option value="6">Estudis Universitaris</option>
				</select><br/><br/><br/>
				
				<label>Situació Laboral</label>
					<p>La situació registrada es: <?php echo $usuario->situacio_laboral;?></p>
					<input type="radio" name="situacio_laboral" value="0"/><label>Desempleat</label> 
					<input type="radio" name="situacio_laboral" value="1"/><label>Empleat</label> 
				<br/><br/><br/>
				
				<label>¿Rep alguna prestació?</label>
				<p>La situació registrada es: <?php echo $usuario->prestacio;?></p>
				<input type="radio" name="prestacio" value="1"/><label>SÍ</label> 
				<input type="radio" name="prestacio" value="0"/><label>NO</label> 
				<br/><br/><br/>		

				
				<input type="submit" name="modificar" value="Salvar camvis"/>
				<input type="reset" name="reset" value="Cancelar"/>
				<input type="submit" name="baja" value="Baixa del Servei"/>
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>
