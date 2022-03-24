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
    // 💡💡 SQL INJECTIONS
    function limpiar_string($str){
        global $conexion;
        return mysqli_real_escape_string($conexion, $str);
    }

    function set_mensaje($msj){
        if(!empty($msj)){
            $_SESSION['mensaje'] = $msj;
        } else {
            $msj = '';
        }
    }

    function mostrar_msj(){
        if(isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
    }

    function redirect($location){
        header("Location: $location");
    }

    function display_success_msj($msj){
        $mensaje = <<<DELIMITADOR
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {$msj}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
DELIMITADOR;
        return $mensaje;
    }

    // ⚡⚡ funciones front
    function show_categorias(){
        // global $conexion;
        //$query = "SELECT * FROM categorias";
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
    // ⚡⚡ funciones back
    function categoria_crear(){
        if(isset($_POST['guardar'])){
            $cat_nombre = limpiar_string(trim($_POST['cat_nombre']));
            $query = query("INSERT INTO categorias (cat_nombre) VALUES ('{$cat_nombre}')");
            confirmar($query);
            set_mensaje(display_success_msj('Categoria creada correctamente'));
            header("Location: index.php?categorias");
        }
    }

    function show_categorias_admin(){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $categorias = <<<DELIMITADOR
            <tr>
                <td>{$fila['cat_id']}</td>
                <td>{$fila['cat_nombre']}</td>
                <td>
                    <a href="index.php?categorias&edit={$fila['cat_id']}" class="btn btn-small btn-warning">editar</a>
                    <a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['cat_id']}">borrar</a>
                </td>
            </tr>
DELIMITADOR;
            echo $categorias;
        }
    }

    function categoria_edit($id){
        if(isset($_POST['actualizar'])){
            $cat_nombre = limpiar_string(trim($_POST['cat_nombre']));
            $query = query("UPDATE categorias SET cat_nombre = '{$cat_nombre}' WHERE cat_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("Categoria actualizada correctamente 😁😁"));
            redirect("index.php?categorias");
        }
    }
?>