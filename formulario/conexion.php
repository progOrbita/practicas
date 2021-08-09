<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if(!defined('_PS_VERSION_')){
			require_once '../../config/config.inc.php';
			require_once '../../init.php';
		}
		$database = Db::getInstance();
		if(isset($_POST['texto'])){
			$name = $_POST['texto'];
			$number = $_POST['numerico'];
			$date = $_POST['fecha'];
			$query = $database->execute('INSERT INTO test.tableto(name,number,fecha,fecha_creacion) VALUES ("'.$name.'",'.$number.',"'.$date.'",NOW())');
			
		}		
		
	?>

</body>
</html>