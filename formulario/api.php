<?php
    /**
     * Api that validate/add and remove data from a formulary
     * Pasos:
     * 1. Cargar PS_Version
     * 2. Cargar la clase resource
     * 3. cargar $accion = tools::getvalue('accion','default)
     * 4. hacer el switch (accion).
     *  case validate:
     *  case add:
     *  case delete:
     *  case default: (Que da error)
     * 5. hacer el return en cada caso del valor recibido
     * 6. terminar (porque siempre se va a llamar y va a tener un valor) con echo json_encode($resultado)
     * Cosas a añadir posteriormente.
     * El check de isset de los campos del formulario.
     * el array de los datos
     */
    if(!defined('_PS_VERSION_')){
		require_once '../../config/config.inc.php';
		require_once '../../init.php';
	}
    include "Resources.php";
    $resultado = "";
    
    $accion = (string) Tools::getValue('action','default');
    
    switch($accion){
        case "validate":
                $validate = new Resources();
                $array_datos = ["texto" => Tools::getValue('texto',""),"numerico" => Tools::getValue('numerico',0),"fecha" => Tools::getValue('fecha',0)];             
                $resultado = $validate->validacion($array_datos);
                break;
        case "save":
            $validados = new Resources();	
		    $array_datos = ["texto" => Tools::getValue('texto',""),"numerico" => Tools::getValue('numerico',0),"fecha" => Tools::getValue('fecha',0)];
		    $resultado =  $validados->save($array_datos);
            break;
        case 'default':
            $resultado = "function dont found";
        break;
        
    }  
    echo json_encode($resultado);
?>