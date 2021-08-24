<?php
    /**
     * Api that create a table and find,verify,add and remove data from a table in a database
     * 
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
        case "verify":
            $post = file_get_contents('php://input');
            //decode jsonstring into an array of json objects
            $jsonData = json_decode($post);
            $array_verify = ["name" => $jsonData["name"],"age" => $jsonData["age"],"date" => $jsonData["date"]];
            $result = $api_functions->validate($array_verify);
            break;
        //store the formulary data sent in the table. Checking before that the data obtained is fine
        case "save":
            $post = file_get_contents('php://input');
            //decode jsonstring into an array of json objects
            $jsonData = json_decode($post,true);
		    $array_save = ["id"=> $jsonData["id"], "name" =>$jsonData["name"],"age" =>$jsonData["age"],"date" =>$jsonData["date"]];
            $result =  $api_functions->save($array_save);
            break;
        //remove the user given a id
        case "delete":
		    $id = Tools::getValue('id',"");
		    $result = $api_functions->delete($id);
            break;
        //Remove the user given a name
        case "remove":
            $name = Tools::getValue('name');
            $result = $api_functions->remove($name);
            break;
            //Find all the users from the filters given
        case "find":
            $num_limit = 10;
            $post = file_get_contents('php://input');
            //decode jsonstring into an array of json objects
            $jsonData = json_decode($post);
            $number = Tools::getValue('pageNumber');
            $data_array = ["name" => $jsonData[0]->value, "dateBeg" => $jsonData[1]->value, "dateEnd" => $jsonData[2]->value, "dateType" => $jsonData[3]->value, "removed" => $jsonData[4]->value];  
            // 0 -> finds non-removed users
            // 1 -> finds removed users
            if($data_array["removed"]=="on"){
                $data_array["removed"]=0;
            }
            else{
                $data_array["removed"]=1;
            }
            $resultQuery = $api_functions->find($data_array,$number,$num_limit);
            $countUsers = $resultQuery[0];
            $remove = $data_array["removed"];
            $result = $api_functions->createTable($resultQuery[1], $remove,$countUsers, $number,$num_limit);
            break;
        // User return to registered status
        case "undo":
            $id = Tools::getValue('id',"");
		    $result = $api_functions->undo($id);
            break;
        //Add a new user to the table
        case "add":
            $post = file_get_contents('php://input');
            $jsonData = json_decode($post);
            $array_add = ["name" => $jsonData[0],"age" => $jsonData[1],"date" => $jsonData[2]];
            $result = $api_functions->add($array_add);
            break;
        //if there's an error with the action sent or isnt written
        default:
            $result = "There was an unexpected error with the server connection";
        break;      
    }  
    echo json_encode($result);
?>