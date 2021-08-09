<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Conexion con la base de datos, si esta bien saldra un mensaje</p>
	<?php
		if(!defined('_PS_VERSION_')){
			require_once '../../config/config.inc.php';
			require_once '../../init.php';
		}

		var_dump(Db::getInstance()->executeS('select * from ps_product'));
		
		
		
	?>

</body>
</html>