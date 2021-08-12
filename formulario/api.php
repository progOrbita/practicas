<?php
    /**
     * Api that validate/add and remove data from a formulary
     * Steps to follow:
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
            $array_datos = ["formText" => Tools::getValue('formText',""),"formNumber" => Tools::getValue('formNumber',0),"formDate" => Tools::getValue('formDate',0)];             
            $result = $api_functions->validate($array_datos);
            break;
        //store the formulary data sent in the table. Checking before that the data obtained is fine
        case "save":	
		    $array_datos = ["formText" => Tools::getValue('formText',""),"formNumber" => Tools::getValue('formNumber',0),"formDate" => Tools::getValue('formDate',0)];
		    $result =  $api_functions->save($array_datos);
            break;
        //remove the row given a name.
        case "delete":	
		    $name = Tools::getValue('name',"");
		    $result = $api_functions->delete($name);
            break;
            case "find":
                $data_array = ["name" => Tools::getValue('findText'), "dateBeg" => Tools::getValue('begDate'), "dateEnd" => Tools::getValue('endingDate'), "removed" => Tools::getValue('formSlider',false)];
                if($data_array["removed"]=="on"){
                    $data_array["removed"]=0;
                }
                else{
                    $data_array["removed"]=1;
                }
                $result = $api_functions->find($data_array);
                break;
        //if there's an error with the action sent or isnt written
        default:
            $result = "There was an unexpected error with the server connection";
        break;      
    }  
    echo json_encode($result);
?>