<?php
/*
	Dado unos campos, los valida enviando la respuesta
*/
	if(!defined('_PS_VERSION_')){
		require_once '../../config/config.inc.php';
		require_once '../../init.php';
	}
	include 'Resources.php';
	if(isset($_POST['texto'])){
	$validate = new Resources();
	$array_datos = ["texto" => $_POST['texto'],"numerico" => $_POST['numerico'],"fecha" => $_POST['fecha']];
	$datos = $validate->validacion($array_datos);
	echo json_encode($datos);
}
?>



