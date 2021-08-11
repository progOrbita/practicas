<?php

/**
 * Crea la tabla formulario si no existe
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
        fecha_mod DATETIME
        )";
    $check = Db::getInstance()->execute($query);
    var_dump($check);
    echo "tabla generada";
?>