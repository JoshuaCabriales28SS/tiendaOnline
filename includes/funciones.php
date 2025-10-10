<?php
    //constantes
    define('TEMPLATES_URL', __DIR__ .'/templates');
    define('FUNCIONES_URL', __DIR__ .'funciones.php');

    //funciones
    function incluirTemplate(string $nombre, bool $inicio=false){
        include TEMPLATES_URL."/${nombre}.php";
    }
    function debuguear($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }
    function estaAutenticado(){
        session_start();
        
        if(!$_SESSION['login']){
            header('Location: /tiendaOnline/index.php');
        }
    }