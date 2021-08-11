<?php

/**
 * Create the formulary table, already updated to the lastest versoin
 */
    if(!defined('_PS_VERSION_')){
        require_once '../../config/config.inc.php';
        require_once '../../init.php';
    }
    $query = "CREATE TABLE IF NOT EXISTS "._DB_PREFIX_."formulario(
        ID int AUTO_INCREMENT PRIMARY KEY,
        name varchar(255),
        number int,
        fecha DATE,
        fecha_creacion DATETIME,
        fecha_mod DATETIME,
        fecha_eliminacion DATETIME,
        eliminado BIT DEFAULT 0
        )";
    $check = Db::getInstance()->execute($query);
    if($check){
    echo "tabla generada<br/>";
    }
    else{
        echo "there is an error in the query<br/>";
    }
?>