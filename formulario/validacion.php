<?php
/*
	Dado unos campos, los valida enviando la respuesta
*/
	include 'Resources.php';
	if(isset($_POST['texto']) && isset($_POST['numerico']) && isset($_POST['fecha'])){
	$validate = new Resources();
	$array_datos = ["texto" => $_POST['texto'],"numerico" => $_POST['numerico'],"fecha" => $_POST['fecha']];
	$datos = $validate->validacion($array_datos);
	echo json_encode($datos);
}
?>



