<?php

/**
 * Create formulario table if not exist, automatically update to latest version
 */
    if(!defined('_PS_VERSION_')){
        require_once '../../config/config.inc.php';
        require_once '../../init.php';
    }
    include "update.php";
    $query = "CREATE TABLE IF NOT EXISTS "._DB_PREFIX_."formulario(
        ID int AUTO_INCREMENT PRIMARY KEY,
        name varchar(255),
        number int,
        fecha DATE,
        fecha_creacion DATETIME,
        fecha_mod DATETIME
        )";
    Db::getInstance()->execute($query);
    updateTable();
    echo "tabla generada<br/>";
?>