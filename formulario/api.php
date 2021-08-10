<?php
    /**
     * Api that validate/add and remove data from a formulary
     * Pasos a seguir:
     * 1. Load PS_Version
     * 2. Load la clase resource
     * 3. Usetools::getvalue('$POST/$GET','default)
     * 4. switch for all the cases: validate, save and delete with a default in case of error
     * all of them have the functionality from validate/save/delete.php files
     * 
     * Small additions: 
     * a resultado var which always return a value so json_encode is used once
     * creating a resources object/class once and not in each case
     */
    if(!defined('_PS_VERSION_')){
		require_once '../../config/config.inc.php';
		require_once '../../init.php';
	}
    include "Resources.php";
    
    $accion = (string) Tools::getValue('action','default');
    $api_functions = new Resources();
    switch($accion){
        //to validate the formulary
        case "validate":
            $array_datos = ["texto" => Tools::getValue('texto',""),"numerico" => Tools::getValue('numerico',0),"fecha" => Tools::getValue('fecha',0)];             
            $resultado = $api_functions->validate($array_datos);
            break;
        //store the formulary data sent in the table. Checking before that the data obtained is fine
        case "save":	
		    $array_datos = ["texto" => Tools::getValue('texto',""),"numerico" => Tools::getValue('numerico',0),"fecha" => Tools::getValue('fecha',0)];
		    $resultado =  $api_functions->save($array_datos);
            break;
        //remove the row given a name.
        case "delete":	
		    $name = Tools::getValue('texto',"");	
		    $resultado = $api_functions->delete($name);
            break;
        //if there's an error with the action sent or isnt written
        case "default":
        default:
            $resultado = "function dont found";
        break;      
    }  
    echo json_encode($resultado);
?>