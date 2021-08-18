<?php

class Resources{
    protected $table = _DB_PREFIX_.'formulary';
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
     * @param int $id name to be deleted from the table
     * @return $query result of the query, or the array with the query if doesn't exist
     */
    function delete(int $id){
            $query = Db::getInstance()->execute('UPDATE '.$this->table.' SET removed=1, mod_date=NOW(), del_date=NOW() WHERE id="'.$id.'"');
            return $query;
    } 
    /**
     * Find users either registered or removed from the database within a limit
     * @param array $array_data the inputs to filter the query if any
     * @param int $pagination number of page to show
     * Return $query which either shows results or return false if there's no data for the filters selected
     */
    function find(array $array_data, int $pagination){
        //number of result per page
        $num_results = 10;
        /**
         * What results are returned 
         * page 1 = 0, page 2 (2-1*5) = 5 (3-1*5) = 10. 
         * Limit first number is start, second how many of them are returned
         */
        $calc_page = ($pagination-1) * $num_results;
        $queryString = 'SELECT * FROM '.$this->table.' WHERE ';
        $whereArr = [];
        $dateQuery = $array_data['dateType'];
        foreach ($array_data as $column => $value) {   
            //Removed is 0, so is needed to check it. 
            if(empty($value) && $column !="removed"){
                continue;
            }        
            if($column=="name"){
                $whereArr[] = $column.' = "'.$value.'"';
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
        $limit = ' LIMIT '.$calc_page.','.$num_results;
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