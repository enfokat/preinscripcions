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
		
		<section class="centrado" id="content">
			<h2 class="titul">Modificar les dades del usuari</h2>
			
				<form method="post"  autocomplete="off">
			
				<label>Nom:</label>
				<input type="text" name="nom" required="required"  onBlur="MaysPrimera(this);" value="<?php echo $selec->nom;?>"/><br/>
				
				<label>Cognom1:</label>
				<input type="text" name="cognom1" required="required"  onBlur="MaysPrimera(this);"  value="<?php echo $selec->cognom1;?>" /><br/>
				
				<label>Cognom 2:</label>
				<input type="text" name="cognom2"  onBlur="MaysPrimera(this);"  value="<?php echo $selec->cognom2;?>"/><br/>
				
				<label>Data Naixement:</label>
				<input type="date" name="data_naixement" required="required" placeholder="AAAA-MM-DD"   value="<?php echo $selec->data_naixement;?>"/><br/>
				
				<label>DNI:</label>
				<input type="text" name="dni" required="required"  onBlur="Mayus(this);"   value="<?php echo $selec->dni;?>" /><br/>
				
				<label>Telefon Movil:</label>
				<input type="text" name="telefon_mobil" required="required"   value="<?php echo $selec->telefon_mobil;?>" /><br/>
				
				<label>Telefon Fix:</label>
				<input type="text" name="telefon_fix"  value="<?php echo $selec->telefon_fix;?>"/><br/>
				
				<label>E-mail:</label>
				<input type="email" name="email" required="required"    value="<?php echo $selec->email;?>"/><br/>	
				
				<label> Nivell d'estudis</label>
				<select name="estudis"   >
				<?php 
						switch ($selec->estudis) {
							case 0:
								echo "<option selected value='0'>Sense Estudis</option>";
								echo "<option value='1'>Educació Primaria</option>";
								echo "<option value='2'>Educació Secondaria</option>";
								echo "<option value='3'>Cicles Formatius Grau MitjÃ </option>";
								echo "<option value='4'>Cicles Formatius Grau Superior</option>";
								echo "<option value='5'>Batxillerat</option>";
								echo "<option value='6'>Estudis Universitaris</option>";					
								break;
							case 1:
								echo "<option  value='0'>Sense Estudis</option>";
								echo "<option selected value='1'>Educació Primaria</option>";
								echo "<option value='2'>Educació Secondaria</option>";
								echo "<option value='3'>Cicles Formatius Grau MitjÃ </option>";
								echo "<option value='4'>Cicles Formatius Grau Superior</option>";
								echo "<option value='5'>Batxillerat</option>";
								echo "<option value='6'>Estudis Universitaris</option>";		
								break;
							case 2:
								echo "<option  value='0'>Sense Estudis</option>";
								echo "<option  value='1'>Educació Primaria</option>";
								echo "<option  selected value='2'>Educació Secondaria</option>";
								echo "<option value='3'>Cicles Formatius Grau MitjÃ </option>";
								echo "<option value='4'>Cicles Formatius Grau Superior</option>";
								echo "<option value='5'>Batxillerat</option>";
								echo "<option value='6'>Estudis Universitaris</option>";	
								break;
							case 3:
								echo "<option  value='0'>Sense Estudis</option>";
								echo "<option  value='1'>Educació Primaria</option>";
								echo "<option  value='2'>Educació Secondaria</option>";
								echo "<option selected value='3'>Cicles Formatius Grau MitjÃ </option>";
								echo "<option value='4'>Cicles Formatius Grau Superior</option>";
								echo "<option value='5'>Batxillerat</option>";
								echo "<option value='6'>Estudis Universitaris</option>";
								break;
							case 4:
								echo "<option  value='0'>Sense Estudis</option>";
								echo "<option  value='1'>Educació Primaria</option>";
								echo "<option value='2'>Educació Secondaria</option>";
								echo "<option value='3'>Cicles Formatius Grau MitjÃ </option>";
								echo "<option selected value='4'>Cicles Formatius Grau Superior</option>";
								echo "<option value='5'>Batxillerat</option>";
								echo "<option value='6'>Estudis Universitaris</option>";
								break;
							case 5:
								echo "<option  value='0'>Sense Estudis</option>";
								echo "<option  value='1'>Educació Primaria</option>";
								echo "<option   value='2'>Educació Secondaria</option>";
								echo "<option value='3'>Cicles Formatius Grau MitjÃ </option>";
								echo "<option value='4'>Cicles Formatius Grau Superior</option>";
								echo "<option selected value='5'>Batxillerat</option>";
								echo "<option value='6'>Estudis Universitaris</option>";
								break;
							case 6:
								echo "<option  value='0'>Sense Estudis</option>";
								echo "<option  value='1'>Educació Primaria</option>";
								echo "<option  value='2'>Educació³ Secondaria</option>";
								echo "<option  value='3'>Cicles Formatius Grau MitjÃ </option>";
								echo "<option value='4'>Cicles Formatius Grau Superior</option>";
								echo "<option value='5'>Batxillerat</option>";
								echo "<option selected value='6'>Estudis Universitaris</option>";
								break;
						}
				?>
				</select><br/><br/><br/>
				
				<label>Situació Laboral</label>
				<select name="situacio_laboral">
					<?php 
						if($selec->situacio_laboral == 0){
							echo "<option  selected value='0'>Desempleat</option>";
							echo "<option value='1'>Empleat</option>";	
						}elseif($selec->situacio_laboral == 1){
							echo "<option value='0'>Desempleat</option>";
							echo "<option selected value='1'>Empleat</option>";
						}				
					?>
				</select>
				<br/><br/><br/>
				

				<label>¿Rep alguna prestació?</label>
				<select name="prestacio">
					<?php 
						if($selec->prestacio == 0){
							echo "<option  selected value='0'>NO</option>";
							echo "<option value='1'>SI</option>";	
						}elseif($selec->prestacio == 1){
							echo "<option value='0'>NO</option>";
							echo "<option selected value='1'>SI</option>";
						}				
					?>
				</select>
				<br/><br/><br/>
				
				<label>Privilegis</label>
					<select name="admin">
					<?php 
						if($selec->admin == 0){
							echo "<option  selected value='0'>Usuari</option>";
							echo "<option value='1'>Admin</option>";	
						}elseif($selec->admin == 1){
							echo "<option value='0'>Usuari</option>";
							echo "<option selected value='1'>Admin</option>";
						}				
					?>
					</select>
				<br/><br/><br/>
						
				
				<input type="submit" name="modificar" value="Salvar canvis"/>
				<input type="reset" name="reset" value="Cancelar"/>
			</form>
				<br/><br/><br/>	

			

		</section>
		
		<?php Template::footer();?>
    </body> 
</html>