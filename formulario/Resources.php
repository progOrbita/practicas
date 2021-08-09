<?php

class Resources{
/**
 * validate an array of elements, used for the form
 * @param array $array_data array to be checked. Insert either error of bien if values are right or wrong
 * @return array $arr array with the verified elements divided in error and good
 */
    function validacion(array $array_data): array{        
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

    function save(array $array_data){
    $array_save = $this->validacion($array_data);    
		if(count($array_save['error']) === 0){
            return true;
        }
        else{
            return $array_save;
        }
    }  
}
?>