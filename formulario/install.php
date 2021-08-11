<?php

/**
 * Create the formulary table, already updated to the lastest versoin
 */
    if(!defined('_PS_VERSION_')){
        require_once '../../config/config.inc.php';
        require_once '../../init.php';
    }
    $query = "CREATE TABLE IF NOT EXISTS "._DB_PREFIX_."formulary(
        ID int AUTO_INCREMENT PRIMARY KEY,
        name varchar(255),
        age int,
        date DATE,
        creation_date DATETIME,
        mod_date DATETIME,
        del_date DATETIME,
        removed BIT DEFAULT 0
        )";
    $check = Db::getInstance()->execute($query);
    if($check){
    echo "table generated<br/>";
    }
    else{
        echo "there is an error in the query<br/>";
    }
?>