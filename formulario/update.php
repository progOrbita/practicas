<?php
    /**
     * Update the formulary table to ver 1.01
     */
    if(!defined('_PS_VERSION_')){
        require_once '../../config/config.inc.php';
        require_once '../../init.php';
    }
    $query = "ALTER TABLE "._DB_PREFIX_."formulario ADD COLUMN del_date DATETIME, ADD COLUMN removed BIT DEFAULT 0";
    $check = Db::getInstance()->execute($query);
    if($check){
        echo "table updated to version 1.01";
    }
    else{
        echo "Update couldn't be done";
    }
?>

