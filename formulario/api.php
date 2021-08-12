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

use Symfony\Component\Validator\Constraints\Length;

if(!defined('_PS_VERSION_')){
		require_once '../../config/config.inc.php';
		require_once '../../init.php';
	}
    include "Resources.php";
    function createTable(array $tableData){
        /**
             * This is the entire table. 
             * Beggining is table start and thead. 
             * Main data all the rows with the information 
             * end close tbody and table tags.
             */
            $mainData = "";
            $beggining = '<table class="table table-dark table-striped table-hover">
            <caption id="tableCaption"></caption>            
            <thead>
                <tr class="bg-info">
                   <th>#</th>
                   <th>Name</th>
                   <th>Age</th>
                   <th>Date</th>
                   <th>Creation date</th>
                   <th>Modification date</th>
                   <th>Deletion date</th> 
                   <th>Actions</th>
                </tr>
                </thead>
            <tbody>';
        //Key is the result number. Value is array containing the data
            foreach ($tableData as $key => $value) {
                $mainData .= '<tr>';
                //array have keyVal (ID, name...) and the string which is keyVal value (12,user).
                foreach ($value as $keyVal => $string) {
                    if($keyVal=="removed" && $string==0){
                        $mainData .='<td><i class="bi bi-x-octagon-fill" type="button" name="delete" id="delete" value="'.$value["ID"].'"></i></td>'; 
                    }
                    if($keyVal=="removed"){
                        continue;
                    }
                    $mainData .= '<td>'.$string.'</td>';
                }
                $mainData .= '</tr>';
            }
        $end = '</tbody></table>';
        return $beggining.$mainData.$end;
    }
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
		    $id = Tools::getValue('id',"");
		    $result = $api_functions->delete($id);
            break;
        case "find":
            $post = file_get_contents('php://input');
            //decode jsonstring into an array of json objects
            $jsonData = json_decode($post);
             
            $data_array = ["name" => $jsonData[0]->value, "dateBeg" => $jsonData[1]->value, "dateEnd" => $jsonData[2]->value, "dateType" => $jsonData[3]->value, "removed" => $jsonData[4]->value];  
            if($data_array["removed"]=="on"){
                $data_array["removed"]=0;
            }
            else{
                $data_array["removed"]=1;
            }
            $resultQuery = $api_functions->find($data_array);
            $result = createTable($resultQuery);
            break;
        //if there's an error with the action sent or isnt written
        default:
            $result = "There was an unexpected error with the server connection";
        break;      
    }  
    echo json_encode($result);
?>