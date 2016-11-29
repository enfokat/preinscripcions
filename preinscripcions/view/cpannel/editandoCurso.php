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
		
		<section id="content">
			<h2 class="titul">Editar Curs</h2>
			<form method="post"  autocomplete="off">
			
				<label>Nom:</label>
				<input type="text" name="nom" required="required" onBlur="MaysPrimera(this);" value="<?php echo $curso->nom;?>" /><br/>
				
				<label>Codi:</label>
				<input type="text" name="codi" required="required" value="<?php echo $curso->codi;?>"/><br/>
				
				<label>Àrea Formativa:</label>
					<select name="id_area">
					<?php 
					switch ($curso->id_area) {
						case 0:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 1:
							echo "<option selected value='0'>Altres</option>";
							echo "<option selected value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 2:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option selected value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 3:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option selected value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 4:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option selected value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 5:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option selected value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 6:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option selected value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 7:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option selected value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 8:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option selected value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 9:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option selected value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 10:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option selected value='10'>e-commerce</option>";
							echo "<option value='11'>Fontanería, climatització i calefacció</option>";
							break;
						case 11:
							echo "<option selected value='0'>Altres</option>";
							echo "<option value='1'>Soldadura</option>";
							echo "<option value='2'>Mecànica Convencional</option>";
							echo "<option value='3'>Disseny Mecànic</option>";
							echo "<option value='4'>Electricitat</option>";
							echo "<option value='5'>Logística</option>";
							echo "<option value='6'>Comunicacions - microinformàtica</option>";
							echo "<option value='7'>Programació i web</option>";
							echo "<option value='8'>PLCs i automatismes</option>";
							echo "<option value='9'>Pneumàtica i hidràulica</option>";
							echo "<option value='10'>e-commerce</option>";
							echo "<option selected value='11'>Fontanería, climatització i calefacció</option>";
							break;
					}
					?>
						
						
						
						
					</select><br/><br/>
				
				<label>Descripció:</label>
				<textarea name="descripcio" value="<?php echo $curso->descripcio; ?>"><?php echo $curso->descripcio; ?></textarea><br/>
				
				<label>Hores:</label>
				<input type="text" name="hores" required="required" value="<?php echo $curso->hores;?>"/><br/>
				
				<label>Data Inici:</label>
				<input type="date" name="data_inici" required="required" value="<?php echo $curso->data_inici;?>"/><br/>
				
				<label>Data Fi:</label>
				<input type="date" name="data_fi" value="<?php echo $curso->data_fi;?>"/><br/>
				
				<label>Horari:</label>
				<input type="text" name="horari" required="required" value="<?php echo $curso->horari;?>"/><br/>	
				
				<label>Torn</label>
				<select name="torn">
					<?php 
					switch ($curso->torn) {
						case M:
							echo "<option selected value='M'>Matí</option>";
							echo "<option value='T'>Tarda</option>";
							echo "<option value='N'>Nit</option>";
							break;
						case T:
							echo "<option value='M'>Matí</option>";
							echo "<option selected value='T'>Tarda</option>";
							echo "<option value='N'>Nit</option>";
							break;
						case N:
							echo "<option value='M'>Matí</option>";
							echo "<option value='T'>Tarda</option>";
							echo "<option selected value='N'>Nit</option>";
							break;
					}		
					?>
				</select><br/>
				
				<label>Tipus</label>
					<input type="text" name="tipus" value="<?php echo $curso->tipus;?>"/>  
				<br/>
				
				<label>Requisits</label>
				<textarea name="requisits" value="<?php echo $curso->requisits;?>"><?php echo $curso->requisits;?></textarea>  
					
<br/><br/><br/>
				
				<input type="submit" name="modificar" value="guardar"/>
				<input type="reset" name="reset" value="Reset"/>
			</form>
		</section>
		
		<?php Template::footer();?>
    </body>
</html>
