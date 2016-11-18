<?php
//si no llegan los datos del formulario
if(empty($_POST['inscribir-me'])){
	//poner el formulario
	include 'vista/detalles.php';

}else{
	//si llegan los datos del formulario
	//inscribir-me
	require_once 'model/PrescripcioModel.php';

	$preinscripcio = new preinscripcio();
	$preinscripcio->id_usuari = $_POST['id_usuari'];
	$preinscripcio->id_curs = $_POST['id_curs'];
	$preinscripcio->data = $_POST['data'];	


	if(!$preinscripcio->inscribir())
		throw new Exception("No ha pogut inscribir-se");

		//cargar la vista de éxito
		$mensaje = "L'usuari $usuari->nom $usuari->cognom1 s'ha inscrit correctament.";
		include 'view/exito.php';

		//OPCIONAL: no cargar la vista de éxito sino ir al listado
		//include 'controller/listar.php';
}

?>