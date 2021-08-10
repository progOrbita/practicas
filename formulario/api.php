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
    $api_functions = new Resources();
    
    switch($accion){
        //to validate the formulary
        case "validate":
            $array_datos = ["texto" => Tools::getValue('texto',""),"numerico" => Tools::getValue('numerico',0),"fecha" => Tools::getValue('fecha',0)];             
            $resultado = $api_functions->validate($array_datos);
            break;
        //store the formulary data sent in the table. Checking before that the data obtained is fine
        case "save":	
		    $array_datos = ["texto" => Tools::getValue('texto',""),"numerico" => Tools::getValue('numerico',0),"fecha" => Tools::getValue('fecha',0)];
		    $resultado =  $api_functions->save($array_datos);
            break;
        //remove the row given a name.
        case "delete":	
		    $name = Tools::getValue('texto',"");	
		    $resultado = $api_functions->delete($name);
            break;
        //if there's an error with the action that is going to be executed
        case 'default':
            $resultado = "function dont found";
        break;      
    }  
    echo json_encode($resultado);
?>