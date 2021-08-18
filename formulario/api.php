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
        /**
         * This is the entire table. 
         * Beggining is table start and thead. 
         * Main data all the rows with the information 
         * end close tbody and table tags.
         * @param array $tableData data obtained from the query
         * @param int $removed 0 -> register tab, 1 -> removed tab.
         * @return string $beggining+$mainData+$end containing the entire table in html
        */
    function createTable(array $tableData, int $removed){
            $mainData = "";
            $i = 0;
            $len = count($tableData);
            $beggining = '
                <table class="table table-dark table-striped table-hover table-bordered table-fixed">
            <caption id="tableCaption"></caption>            
            <thead>
                <tr class="bg-info">
                   <th>ID</th>
                   <th>Name</th>
                   <th>Age</th>
                   <th>Date</th>
                   <th>Creation date</th>
                   <th>Modification date</th>';
                   //if there's no users added in the table
                   if($len == 0 && $removed == 0){
                       $beggining .= '<th class="col-2">actions</th>';
                   }
                   //For removed users, key is to insert th only once
                   foreach ($tableData as $key => $value) {
                        foreach ($value as $keyVal => $string) {
                            if($key == 0 && $keyVal=="removed" && $string==1){
                                $beggining .= '<th>Deletion date</th>
                                                <th>Actions</th>';
                            }
                            //for non-removed users
                            if($key == 0 && $keyVal=="removed" && $string==0){
                                $beggining .= '<th class="col-2">Actions</th>';
                            }
                        }
                    } 
    $beggining .=  '</tr>
                </thead>
            <tbody>';
            //If there's no users added in the table
            if($len == 0 && $removed == 0){
    $mainData .='<tr>
                <td><input class="form-control text-info" value="" disabled></input></td>
                <td><input type="text" class="form-control .name" name="insName" id="insertName"></input></td>
                <td><input type="number" class="form-control .age" name="insAge" id="insertAge"></input></td>
                <td><input type="date" class="form-control .date" name="insDate" id="insertDate"></input></td>
                <td><input class="form-control text-info" value="" disabled></input></td>
                <td><input class="form-control text-info" value="" disabled></input></td>
                <td><i class="bi bi-pencil-square" type="button" data-toggle="tooltip" title="add new user" name="addNew" id="addNew"></i></td>
                </tr>';          
            }
        //Key is the result number. Value is array containing the data
            foreach ($tableData as $key => $value) {
                $mainData .= '<tr>';
                //array have keyVal (ID, name...) and the string which is keyVal value (12,user).
                foreach ($value as $keyVal => $string) {
                    switch($keyVal){
                        case "name":
                            $mainData .= '<td><input type="text" class="form-control '.$keyVal.'" value="'.$string.'"></input></td>'; 
                        break;
                        case "age":
                            $mainData .= '<td><input type="number" class="form-control '.$keyVal.'" value="'.$string.'"></input></td>';
                            break; 
                        case "date":
                            $mainData .= '<td><input type="date" class="form-control '.$keyVal.'" value="'.$string.'"></input></td>'; 
                            break;
                        case "ID":
                        case "creation_date":
                        case "mod_date":
                            $mainData .= '<td><input class="form-control text-info '.$keyVal.'" value="'.$string.'" disabled></input></td>'; 
                            break;
                        case "del_date":
                                if($string != ""){
                                $mainData .= '<td><input class="form-control text-info '.$keyVal.'" value="'.$string.'" disabled></input></td>'; 
                            }
                        break;
                        case "removed":
                            if($string==0){
                                $mainData .=
                                '<td><i class="bi bi-x-octagon-fill" type="button" data-toggle="tooltip" title="Remove user" name="delete" id="delete" value="'.$value["ID"].'"></i>
                                    <i class="bi bi-check-square text-success" type="button" data-toggle="tooltip" title="verify fields" name="verify" id="verify" value="'.$value["ID"].'"></i>
                                    <i class="bi bi-key-fill text-success" type="button" data-toggle="tooltip" title="update user" name="save" id="save" value="'.$value["ID"].'"></i></td>';
                            //Last row from registered users (removed == 0). To include an empty row with a specific button
                            if($i == $len - 1){
                               $mainData .= '</tr>
                                  <tr>
                                    <td><input class="form-control text-info" value="" disabled></input></td>
                                    <td><input type="text" class="form-control .name" name="insName" id="insertName"></input></td>
                                    <td><input type="number" class="form-control .age" name="insAge" id="insertAge"></input></td>
                                    <td><input type="date" class="form-control .date" name="insDate" id="insertDate"></input></td>
                                    <td><input class="form-control text-info" value="" disabled></input></td>
                                    <td><input class="form-control text-info" value="" disabled></input></td>
                                    <td><i class="bi bi-pencil-square" type="button" data-toggle="tooltip" title="add new user" name="addNew" id="addNew"></i></td>';
                                }
                                $i++;
                            }
                            if($string==1){
                                $mainData .='<td><i class="bi bi-eject" type="button" data-toggle="tooltip" title="undo" name="undo" id="undo" value="'.$value["ID"].'"></i>';
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
            $post = file_get_contents('php://input');
            //decode jsonstring into an array of json objects
            $jsonData = json_decode($post);
            $array_verify = ["name" => $jsonData[0],"age" => $jsonData[1],"date" => $jsonData[2]];
            $result = $api_functions->validate($array_verify);
            break;
        //store the formulary data sent in the table. Checking before that the data obtained is fine
        case "save":
            $post = file_get_contents('php://input');
            //decode jsonstring into an array of json objects
            $jsonData = json_decode($post);
		    $array_save = ["id"=> $jsonData[0], "name" =>$jsonData[1],"age" =>$jsonData[2],"date" =>$jsonData[3]];
            $result =  $api_functions->save($array_save);
            break;
        //remove the row given a name.
        case "delete":
		    $id = Tools::getValue('id',"");
		    $result = $api_functions->delete($id);
            break;
            //Find all the users from the filters given
        case "find":
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
            $resultQuery = $api_functions->find($data_array,$number);
            $remove = $data_array["removed"];
            $result = createTable($resultQuery, $remove);
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
        //Count users, after find call
        case "countUsers":
            $result = $api_functions->countRegisters();
            break;
        //if there's an error with the action sent or isnt written
        default:
            $result = "There was an unexpected error with the server connection";
        break;      
    }  
    echo json_encode($result);
?>