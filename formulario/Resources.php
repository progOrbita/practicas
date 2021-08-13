<?php

class Resources{
    protected $table = _DB_PREFIX_.'formulary';
/**
 * validate an array of elements, used for the form
 * @param array $array_data array to be checked. Insert in error if values are wrong otherwise in good if values are fine
 * @return array $arr array with the verified elements divided in error and good
 */
    //Doesn't work properly because inputs aren't sent right now. (Just checks from databse if fields aren't empty which is always true)
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
    function delete(int $id){
        //First check if name it's on the table, if isn't found doesn't try to execute the delete query.
            $query = Db::getInstance()->execute('UPDATE '.$this->table.' SET removed=1, mod_date=NOW(), del_date=NOW() WHERE id="'.$id.'"');
            return $query;
    } 
    /**
     * Find users either registered or removed from the database
     * @param $array_data the inputs to filter the query if any
     * Return $query which either shows results or return false if there's no data for the filters selected
     */
    function find(array $array_data){
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
        $queryRequest = $queryString.$whereStr;        
        $query = Db::getInstance()->executeS($queryRequest);
        return $query;
    }
}
?>