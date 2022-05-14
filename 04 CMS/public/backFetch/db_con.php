<?php
    session_start();

    $conexion = mysqli_connect($_SESSION['db_host'], $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name']);
    mysqli_set_charset($conexion, "utf8");

    function query($sql){
        global $conexion;
        return mysqli_query($conexion, $sql);
    }
?>