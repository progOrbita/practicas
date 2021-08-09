	<?php
		if(!defined('_PS_VERSION_')){
			require_once '../../config/config.inc.php';
			require_once '../../init.php';
		}
		include "Resources.php";

		if(isset($_POST['texto']) && isset($_POST['numerico']) && isset($_POST['fecha'])){
		$validados = new Resources();	
		$array_datos = ["texto" => $_POST['texto'],"numerico" => $_POST['numerico'],"fecha" => $_POST['fecha']];
		echo json_encode($validados->save($array_datos));
		}
		
	?>