<?php
    /**
     * -comprobar si existen las columnas fecha_eliminacion y eliminado
     * -crearlas (alter) si no lo estan
     * -añadir esto a install.php (include)
     */
    function updateTable(){
        $query = "ALTER TABLE ps_formulario ADD COLUMN fecha_eliminacion DATETIME, ADD COLUMN eliminado BIT DEFAULT 0";
        Db::getInstance()->execute($query);
    }
?>

