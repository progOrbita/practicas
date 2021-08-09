<?php

class Resources{

    function validacion(array $array_data){
        $arr = [];
        foreach ($array_data as $key => $value) {
            $cadenaVacia = trim($value);
            if(empty($cadenaVacia)){
                array_push($arr, $key);
            }
            else{
                array_push($arr,$value);
            }
        }
        return $arr;
    }
}
?>