<?php
    function conectarDB(){
        $db = new mysqli('localhost', 'root', 'root', 'db_tiendaOnline_crud');

        if(!$db){
            echo "Error, no se conectó";
            exit;
        }

        return $db;
    }