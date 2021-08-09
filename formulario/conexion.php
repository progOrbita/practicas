	<?php
		if(!defined('_PS_VERSION_')){
			require_once '../../config/config.inc.php';
			require_once '../../init.php';
		}
		include "Resources.php";
		
		if(isset($_POST['texto'])){
		
		$validados = new Resources();	
		$array_datos = ["texto" => $_POST['texto'],"numerico" => $_POST['numerico'],"fecha" => $_POST['fecha']];
			if($validados->save($array_datos)==true){
				//$query = Db::getInstance()->execute('INSERT INTO test.tableto(name,number,fecha,fecha_creacion) VALUES ("'.$name.'",'.$number.',"'.$date.'",NOW())');
				echo "Todo correcto";
			}
			else{
				json_encode($validados->save($array_datos));
			}
		}
		
	?>