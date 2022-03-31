<?php
    ob_start();
    session_start();
    // session_destroy();

    // if(a>b){

    // }

    // a>b ? echo 'a es mayor que b' : 'b es mayor';
    // $DS = 'VALOR';
    defined("DS") ? NULL : define("DS", DIRECTORY_SEPARATOR);
    // "\" - "/"
    // echo DIRECTORY_SEPARATOR;
    // echo DS;
    # c:/www/public/admin
    # c:\www\public/admin

    // ⚡⚡ RUTAS RELATIVAS
    // echo __DIR__;
    defined("VIEW_FRONT") ? NULL : define("VIEW_FRONT", __DIR__ . DS . "views/front");
    defined("VIEW_BACK") ? NULL : define("VIEW_BACK", __DIR__ . DS . "views/back");

    // echo VIEW_FRONT;
    
    // ⚡⚡ CONSTANTES DE CONEXION
    defined("DB_HOST") ? NULL : define("DB_HOST", "localhost");
    defined("DB_USER") ? NULL : define("DB_USER", "root");
    defined("DB_PASS") ? NULL : define("DB_PASS", "");
    defined("DB_NAME") ? NULL : define("DB_NAME", "cms_2022_1");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // if($conexion){
    //     echo 'Felicidades estas conectado 😁😁';
    // }
    require_once("functions.php");
?>