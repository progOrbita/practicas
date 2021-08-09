	<?php
		if(!defined('_PS_VERSION_')){
			require_once '../../config/config.inc.php';
			require_once '../../init.php';
		}
		include "Resources.php";
		
		$database = Db::getInstance();
		$validados = new Resources();
		if(isset($_POST['texto'])){
				$name = $_POST['texto'];
				$number = $_POST['numerico'];
				$date = $_POST['fecha'];
				$array_datos = ["texto" => $_POST['texto'],"numerico" => $_POST['numerico'],"fecha" => $_POST['fecha']];
			$cadena = $validados->validacion($array_datos);		
			if(sizeof($cadena['error']) === 0){
				$query = $database->execute('INSERT INTO test.tableto(name,number,fecha,fecha_creacion) VALUES ("'.$name.'",'.$number.',"'.$date.'",NOW())');
			}			
		}
		
	?>