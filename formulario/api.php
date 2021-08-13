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
        /**
         * This is the entire table. 
         * Beggining is table start and thead. 
         * Main data all the rows with the information 
         * end close tbody and table tags.
         * @param array $tableData data obtained from the query
         * @return string $beggining+$mainData+$end containing the entire table in html
        */
    function createTable(array $tableData){
            $mainData = "";
            $beggining = '
                <table class="table table-dark table-striped table-hover table-bordered">
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
                    switch($keyVal){
                        case "name":
                        case "age":
                        case "date":
                            $mainData .= '<td><input class="form-control '.$keyVal.'" value="'.$string.'"></input></td>'; 
                        break;
                        case "ID":
                        case "creation_date":
                        case "mod_date":
                        case "del_date":
                            $mainData .= '<td class="'.$keyVal.'" ><input class="form-control text-info" value="'.$string.'" disabled></input></td>';  
                        break;
                        case "removed":
                            if($string==0){
                                $mainData .='<td><i class="bi bi-x-octagon-fill" type="button" name="delete" id="delete" value="'.$value["ID"].'"></i>
                                <i class="bi bi-check-square text-success" type="button" name="verify" id="verify" value="'.$value["ID"].'"></i>
                                <i class="bi bi-key-fill type="button" name="save" id="save" value="'.$value["ID"].'"></i></td>';
                            }
                        break;
                    }
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
        case "verify":
            //temp, until table turned into inputs
            $array_verify = ["name" => Tools::getValue('name',""),"age" => Tools::getValue('age',0),"date" => Tools::getValue('date',0)];
            $result = $api_functions->validate($array_verify);
            break;
        //store the formulary data sent in the table. Checking before that the data obtained is fine
        //Same as above, until table turn into inputs does nothing currently.
        case "save":	
		    $id = Tools::getValue('id');
		    $result =  $api_functions->save($id);
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