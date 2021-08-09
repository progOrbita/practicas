<?php

class Resources{
/**
 * valida el formulario
 * @param array $array_data el array enviado
 * @return array $arr el array con los datos ya verificados
 */
    function validacion(array $array_data): array{
        //$arr = [];
        $arr = ['error' => [], 'bien' => []];
        foreach ($array_data as $key => $value) {
            $cadenaVacia = trim($value);
            if(empty($cadenaVacia)){
                array_push($arr['error'], $key);
            }
            else{
                array_push($arr['bien'],$value);
            }
        }
        return $arr;
    }
    
}
?>