<?php
    // ⚡⚡ functiones base - helpers
    function query($sql){
        global $conexion;
        return mysqli_query($conexion, $sql);
    }

    function confirmar($query){
        global $conexion;
        if(!$query){
            die("Fallo en la conexión " . mysqli_error($conexion));
        }
    }

    function fetch_array($query){
        return mysqli_fetch_array($query);
    }

    // ⚡⚡ funciones front
    function show_categorias(){
        // global $conexion;
        // $query = "SELECT * FROM categorias";
        // $query_res = mysqli_query($conexion, $query);
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        // print_r($query);
        while($fila = fetch_array($query)){
            // print_r($fila);
            $categoria = <<<DELIMITADOR
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {$fila['cat_nombre']}
                    </a>
                </li>
DELIMITADOR;
            echo $categoria;
        }
    }
    // ⚡⚡ functiones back

?>