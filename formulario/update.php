<?php
    /**
     * Update the formulary table to ver 1.01
     */
    if(!defined('_PS_VERSION_')){
        require_once '../../config/config.inc.php';
        require_once '../../init.php';
    }
        $query = "ALTER TABLE "._DB_PREFIX_."formulario ADD COLUMN fecha_eliminacion DATETIME, ADD COLUMN eliminado BIT DEFAULT 0";
        Db::getInstance()->execute($query);
    
?>

