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
    
    $action = (string) Tools::getValue('action','default');
    $api_functions = new Resources();
    switch($action){
        //to validate the formulary
        case "validate":
            $data_array = ["formText" => Tools::getValue('formText',""),"formNumber" => Tools::getValue('formNumber',0),"formDate" => Tools::getValue('formDate',0)];             
            $result = $api_functions->validate($data_array);
            break;
        //store the formulary data sent in the table. Checking before that the data obtained is fine
        case "save":	
		    $data_array = ["formText" => Tools::getValue('formText',""),"formNumber" => Tools::getValue('formNumber',0),"formDate" => Tools::getValue('formDate',0)];
		    $result =  $api_functions->save($data_array);
            break;
        //remove the row given a name.
        case "delete":	
		    $name = Tools::getValue('name',"");
		    $result = $api_functions->delete($name);
            break;
        case "find":
            $data_array = ["findValue" => Tools::getValue('findText'), "dateBeggining" => Tools::getValue('begDate'), "dateEnd" => Tools::getValue('endingDate'), "listType" => Tools::getValue('formSlider',false)];
            if($data_array["listType"]=="on"){
                $data_array["listType"]=0;
            }
            else{
                $data_array["listType"]=1;
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