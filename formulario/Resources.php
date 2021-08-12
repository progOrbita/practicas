<?php

class Resources{
    protected $table = _DB_PREFIX_.'formulary';
/**
 * validate an array of elements, used for the form
 * @param array $array_data array to be checked. Insert in error if values are wrong otherwise in good if values are fine
 * @return array $arr array with the verified elements divided in error and good
 */
    function validate(array $array_data): array{       
        $arr = ['error' => [], 'good' => []];
        foreach ($array_data as $key => $value) {
            $cadenaVacia = trim($value);
            if(empty($cadenaVacia)){
                array_push($arr['error'], $key);
            }
            else{
                array_push($arr['good'],$key);
            }
        }
        return $arr;
    }
    /**
     * Insert the array into the database
     * @param array $array_data array with the elements that are going to be added to the database
     * @return $query if the validation is successfully or $array_save which gives two arrays with the errors and right inputs
     */
    function save(array $array_data){
    $array_save = $this->validate($array_data);
    // Only attempt to execute the query when there's no errors.
		if(count($array_save['error']) === 0){
            $query = Db::getInstance()->execute('INSERT INTO '.$this->table.'(name,age,date,creation_date,mod_date) VALUES ("'.$array_data['formText'].'",'.$array_data['formNumber'].',"'.$array_data['formDate'].'",NOW(),NOW())');
            return $query;
        }
        else{
            return $array_save;
        }
    } 
    /**
     * Check and remove a name from the table 
     * @param string $name name to be deleted from the table
     * @return $query result of the query, or the array with the query if doesn't exist
     */
    function delete(string $name){
        //First check if name it's on the table, if isn't found doesn't try to execute the delete query.
       $check_name = Db::getInstance()->executeS('SELECT * FROM '.$this->table.' WHERE name="'.$name.'"');
        if(count($check_name)===0){
            return $check_name;
        }
        else{
            $query = Db::getInstance()->execute('UPDATE '.$this->table.' SET removed=1, mod_date=NOW(), del_date=NOW() WHERE name="'.$name.'"');
            return $query;
        }
    } 
    function find(array $array_data){
        $queryString = 'SELECT * FROM '.$this->table.' WHERE ';
        $whereArr = [];
        foreach ($array_data as $column => $value) {   
            //Removed is 0, so is needed to check it. 
            if(empty($value) && $column !="removed"){
                continue;
            }        
            if($column=="name"){
                $whereArr[] = $column.' = "'.$value.'"';
            }
            if($column=="dateBeg"){
                $whereArr[] = ' date >= "'.$value.'"';
            }
            if($column=="dateEnd"){
                $whereArr[] = ' date <= "'.$value.'"';
            }
            if($column=="removed"){
                $whereArr[] = $column.' = '.$value;
            }
            $whereStr = implode(' AND ',$whereArr);
        }
        $queryRequest = $queryString.$whereStr;        
        $query = Db::getInstance()->executeS($queryRequest);
        return $query;
    }
}
?>