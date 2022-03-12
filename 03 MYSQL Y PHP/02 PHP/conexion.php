<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'dw2022_1');
    
    // true
    // if($conexion){
    //     echo 'conexion exitosa';
    // }
    if(!$conexion){
        die('Fallo en la conexion ' . mysqli_error($conexion));
    }
?>