<?php

class Resources{
    protected $table = _DB_PREFIX_.'formulary';
         /**
         * Creates the entire table. 
         * Beggining is table start and thead. 
         * Main data all the rows with the information 
         * end close tbody and table tags.
         * pages includes pagination at the bottom of the table
         * @param array $tableData data obtained from the query
         * @param int $removed 0 -> register tab, 1 -> removed tab.
         * @param array $totalRegistered array with two numbers counting all the registers and removed users.
         * @param int $num_limit integer with the users displayed per page
         * @return string $beggining+$mainData+$end containing the entire table in html
        */
    function createTable(array $tableData, int $removed, array $totalRegistered, int $num_limit){
        $mainData = "";
        $i = 0;
        $len = count($tableData);
        $cur_page = Tools::getValue('pageNumber');
        $pages = "";
        $beggining = '
            <table class="table table-sm table-dark table-striped table-hover table-bordered table-fixed">
        <caption style="padding-top 0px, padding-bottom: 0px" id="tableCaption"></caption>
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
            <td><input class="form-control text-light btn-secondary" value="" disabled></input></td>
            <td><input type="text" class="form-control .name" name="insName" id="insertName"></input></td>
            <td><input type="number" class="form-control .age" name="insAge" id="insertAge"></input></td>
            <td><input type="date" class="form-control .date" name="insDate" id="insertDate"></input></td>
            <td><input class="form-control text-light btn-secondary" value="" disabled></input></td>
            <td><input class="form-control text-light btn-secondary" value="" disabled></input></td>
            <td><i style="font-size: 2rem;" class="bi bi-pencil-square" type="button" data-toggle="tooltip" title="add new user" name="addNew" id="addNew"></i></td>
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
                            $mainData .= '<td><input class="form-control text-light btn-secondary '.$keyVal.'" value="'.$string.'" disabled></input></td>'; 
                            break;
                        case "del_date":
                                if($string != ""){
                                $mainData .= '<td><input class="form-control text-light btn-secondary '.$keyVal.'" value="'.$string.'" disabled></input></td>'; 
                            }
                        break;
                        case "removed":
                            if($string==0){
                                $mainData .=
                                '<td>
                                    <i style="font-size: 2rem;" class="bi bi-x-octagon-fill" type="button" data-toggle="tooltip" title="Remove user" name="delete" id="delete" value="'.$value["ID"].'"></i>
                                    <i style="font-size: 2rem;" class="bi bi-check-square text-success" type="button" data-toggle="tooltip" title="verify fields" name="verify" id="verify" value="'.$value["ID"].'"></i>
                                    <i style="font-size: 2rem;" class="bi bi-key-fill text-success" type="button" data-toggle="tooltip" title="update user" name="save" id="save" value="'.$value["ID"].'"></i></td>';
                            //Last row from registered users (removed == 0). To include an empty row with a specific button
                            if($i == $len - 1){
                               $mainData .= '</tr>
                                  <tr>
                                    <td><input class="form-control text-light btn-secondary" value="" disabled></input></td>
                                    <td><input type="text" class="form-control .name" name="insName" id="insertName"></input></td>
                                    <td><input type="number" class="form-control .age" name="insAge" id="insertAge"></input></td>
                                    <td><input type="date" class="form-control .date" name="insDate" id="insertDate"></input></td>
                                    <td><input class="form-control text-light btn-secondary" value="" disabled></input></td>
                                    <td><input class="form-control text-light btn-secondary" value="" disabled></input></td>
                                    <td><i style="font-size: 2rem;" class="bi bi-pencil-square" type="button" data-toggle="tooltip" title="add new user" name="addNew" id="addNew"></i></td>';
                                }
                                $i++;
                            }
                            if($string==1){
                                $mainData .='<td><i style="font-size: 2rem;" class="bi bi-eject" type="button" data-toggle="tooltip" title="undo" name="undo" id="undo" value="'.$value["ID"].'"></i>';
                            }
                        break;
                    }
                }
                $mainData .= '</tr>';
            }
        $end = '</tbody></table>';
            //pagination creation. 0 registered, 1 removed users
            if($removed == 0){
                $number = $totalRegistered[0];
            }
            else{
                $number = $totalRegistered[1];
            }
            //calculations for displaying text
            $pagesNumber = ceil($number/$num_limit);
            $current_number = (($cur_page-1)*$num_limit)+1;
            $current_limit = $cur_page*$num_limit;
            //If there's less than current limit
            if($number < $current_limit){
                $current_limit = $number;
            }
            $pages .= '<nav><ul class="pagination justify-content-center">';
                for ($i = 1; $i <= $pagesNumber; $i++) {
                    //Check the current page to add active
                    if( $i == $cur_page){
                        $pages .= '<li class="page-item active"><input class="btn btn-secondary page-link" type="button" id="pagination" value="'.$i.'"></input></li>';
                    }
                    else{
                    $pages .= '<li class="page-item"><input class="btn btn-secondary page-link" type="button" id="pagination" value="'.$i.'"></input></li>';
                    }
                }
                $pages .= '</ul></nav><span> Displaying '.$current_number.'-'.$current_limit.' of '.$number.' results</span>';
        return $beggining.$mainData.$end.$pages;
    }
/**
 * validate an array of elements, used for the form
 * @param array $array_data array to be checked. Insert in error if values are wrong otherwise in good if values are fine
 * @return array $arr array with the verified elements divided in error and good
 */
    function validate (array $array_verify){
        $arr = ['error' => [], 'good' => []];
            foreach ($array_verify as $keyVal => $value) {
                $cadenaVacia = trim($value);
                if(empty($cadenaVacia)){
                    array_push($arr['error'], $keyVal);
                }
                else{
                    array_push($arr['good'],$keyVal);
                    }
                }
                return $arr;
            }
    /**
     * Insert the array into the database
     * @param array $array_data array with the elements that are going to be added to the database
     * @return $query if the validation is successfully or $array_save which gives two arrays with the errors and right inputs
     */
    function save(array $array_save){
        $array_error = $this->validate($array_save);
        if(count($array_error['error']) === 0){
            $query = Db::getInstance()->execute('UPDATE '.$this->table.' SET name="'.$array_save['name'].'", age='.$array_save['age'].', date="'.$array_save['date'].'",creation_date=NOW(),mod_date=NOW() WHERE ID = '.$array_save['id']);
            return $query;
        }
        else{
            return $array_error;
        }
    }
    /**
     * Add a new user into the database
     * @param array $array_data array containing the data of the user
     * @return mixed $query (bool) if data don't contains errors. $array_error (array) with the errors and good values otherwise.
     */
    function add(array $array_data){
        $array_error = $this->validate($array_data);
        if(count($array_error['error']) === 0){
            $query = Db::getInstance()->execute('INSERT INTO '.$this->table.'(name,age,date,creation_date,mod_date) VALUES ("'.$array_data['name'].'",'.$array_data['age'].',"'.$array_data['date'].'",NOW(),NOW())');
            return $query;
        }
        else{
            return $array_error;
        }
    }
    /**
     * Check and remove a name from the table 
     * @param int $id user id to be deleted from the table
     * @return $query result of the query, or the array with the query if doesn't exist
     */
    function delete(int $id){
            $query = Db::getInstance()->execute('UPDATE '.$this->table.' SET removed=1, mod_date=NOW(), del_date=NOW() WHERE id="'.$id.'"');
            return $query;
    } 
    /**
     * Check and remove all the names from the table 
     * @param string $name name to be deleted from the table
     * @return $query result of the query, or the array with the query if doesn't exist
     */
    function remove(string $name){
        $query = Db::getInstance()->execute('UPDATE '.$this->table.' SET removed=1, mod_date=NOW(), del_date=NOW() WHERE name="'.$name.'"');
        return $query;
    }
    /**
     * Find users either registered or removed from the database within a limit
     * @param array $array_data the inputs to filter the query if any
     * @param int $pagination number of page to show
     * @param int $result_limit Limit the registers per page
     * Return $query which either shows results or return false if there's no data for the filters selected
     */
    function find(array $array_data, int $pagination, int $result_limit){
        //number of result per page
        /**
         * What results are returned 
         * page 1 = 0, page 2 (2-1*5) = 5 (3-1*5) = 10. 
         * Limit first number is start, second how many of them are returned
         */
        $calc_page = ($pagination-1) * $result_limit;
        $queryString = 'SELECT * FROM '.$this->table.' WHERE ';
        $whereArr = [];
        $dateQuery = $array_data['dateType'];
        foreach ($array_data as $column => $value) {   
            //Removed is 0, so is needed to check it. 
            if(empty($value) && $column !="removed"){
                continue;
            }        
            if($column=="name"){
                $whereArr[] = $column.' LIKE "%'.$value.'%"';
            }
            if($column=="dateBeg"){
                $whereArr[] = $dateQuery.' >= "'.$value.'"';
            }
            if($column=="dateEnd"){
                $whereArr[] = $dateQuery.' <= "'.$value.'"';
            }
            if($column=="removed"){
                $whereArr[] = $column.' = '.$value;
            }
            $whereStr = implode(' AND ',$whereArr);
        }
        //For pagination
        $limit = ' LIMIT '.$calc_page.','.$result_limit;
        $queryRequest = $queryString.$whereStr.$limit;        
        $query = Db::getInstance()->executeS($queryRequest);
        return $query;
    }
    /**
     * Count the registered and removed users from the table
     * @return array $counters two ints with the register/removed 
     */
    function countRegisters(){
        $queryRegister = "SELECT COUNT(*) FROM ".$this->table." WHERE removed=0";
        $countReg = Db::getInstance()->executeS($queryRegister);
        $queryRemoved = "SELECT COUNT(*) FROM ".$this->table." WHERE removed=1";
        $countRem = Db::getInstance()->executeS($queryRemoved);
        $counters = [];
        foreach ($countReg as $key => $value){
            foreach ($value as $keyVal => $string){
                $counters[] = $string;
            }
        }
        foreach ($countRem as $key => $value){
            foreach ($value as $keyVal => $string){
                $counters[] = $string;
            }
        }
        return $counters;
    }
    /**
     * Restore an user removed
     * @param int $id id of the user to be restored
     * @return bool $query true if was done, false otherwise.
     */
    function undo(int $id){
        $query = Db::getInstance()->execute('UPDATE '.$this->table.' SET removed=0, mod_date=NOW(), del_date=NULL WHERE id="'.$id.'"');
        return $query;
    }
}
?>