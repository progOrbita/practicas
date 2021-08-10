<?php
	if(!defined('_PS_VERSION_')){
		require_once '../../config/config.inc.php';
		require_once '../../init.php';
	}
	include "Resources.php";
    if(isset($_POST['texto'])){
		$validados = new Resources();	
		$name = $_POST['texto'];		
		echo json_encode($validados->delete($name));
	}
?>