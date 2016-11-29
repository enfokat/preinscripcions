<?php
	class Template{	
		
		//PONE EL HEADER DE LA PAGINA 
		public static function header(){	?>
			<header>
				<figure>
					<a href="index.php">
						<img class="banner" alt="Cifo Vallès logo" src="images/logos/cursos.jpg" />
					</a>
				</figure>
				<hgroup>
					<h1>Pre-Inscripcions</h1>
					<h2>Preinscriu-te'n als cursos que mes t'agradin</h2>
				</hgroup>
			</header>
		<?php }
		
		
		//PONE EL FORMULARIO DE LOGIN  
		public static function login(){?>
			<form method="post" id="login" autocomplete="off">
				<label>DNI:</label><input type="text" name="dni" required="required" onBlur="MaysPrimera(this);"/>
				<label>Data Naixement:</label><input type="date" name="data_naixement" required="required" placeholder="aaaa-mm-dd"/>
				<input type="submit" name="login" value="Entrar" />
			</form>
		<?php }
		
		
		//PONE LA INFO DEL USUARIO IDENTIFICADO Y EL FORMULARIOD E LOGOUT
		public static function logout($usuario){	?>
			<div id="logout">
				<span>
					Hola 
					<a href="index.php?controlador=Usuario&operacion=modificacion" title="modificar datos">
						<?php echo $usuario->nom;?></a>
					<span class="mini">
						<?php echo ' ('.$usuario->email.')';?>
					</span>
					<?php if($usuario->admin) echo ', ets administrador';?>
				</span>
								
				<form method="post">
					<input type="submit" name="logout" value="Sortir" />
				</form>
				
				<div class="clear"></div>
			</div>
		<?php }
		
		public static function menu($usuario){ ?> 
					<nav>
						<ul class="menu">
							<li><a href="index.php?controlador=Welcome&operacion=index">Inici</a></li>
							<li><a href="index.php?controlador=Curso&operacion=listar">Ver Cursos</a></li>
							<li><a href="index.php?controlador=Area&operacion=listado">Arees Formatives</a></li>
						<?php if(!$usuario){?>
							<li><a href="index.php?controlador=Usuario&operacion=registro">Registre</a></li>	
						<?php } ?>	
						<?php if($usuario){?>
							<li><a href="index.php?controlador=Preinscripcio&operacion=listarPreinscripcio">Les Meves preinscripcions</a></li>
							<li><a href="index.php?controlador=Usuario&operacion=modificacion&parametro=<?php echo $usuario->id; ?>">Mis Dades</a></li>
						<?php } ?>	
						</ul>
						<?php 
						//pone el menú del administrador
						if($usuario && $usuario->admin){	?>
						<ul class="menu">
							<li><a href="index.php?controlador=Cpannel&operacion=menu">Taulell de Control</a></li>
						</ul>
									
						<?php }	?>
					</nav>
				<?php }
				
	
		//PONE EL PIE DE PAGINA
		public static function footer(){	?>
			<footer>
				<p>  
					<a href="index.php?controlador=Welcome&operacion=about">Acerca de...</a>   ||   <a href="index.php?controlador=Welcome&operacion=privacitat">Privacitat</a>
					<a class="center" href="index.php">Pre-Inscripcions - CIFO del Vallès</a>
					<a class="right" href="">Robs Micro Framework</a> 
         		</p>
			</footer>
		<?php }
	}
?>