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

    function display_danger_msj($msj){
        $mensaje = <<<DELIMITADOR
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> {$msj}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
DELIMITADOR;
        return $mensaje;
    }

    function contar_filas($query){
        return mysqli_num_rows($query);
    }

    function email_existe($email){
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}'");
        confirmar($query);
        // if(mysqli_num_rows($query) >= 1){
        //     return true;
        // }
        if(contar_filas($query) >= 1){
            return true;
        }
        return false;
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function send_email($email, $asunto, $mensaje){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '2ccf0a987cd073';
        $mail->Password = '79f9188e5323b3';
        $mail->Port = 465;
        $mail->SMTPSecure = 'tls';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('noreply@tudominio.com', 'Mailer');
        $mail->addAddress($email);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        if($mail->send()){
            $emailSent = true;
        }
    }



    // ⚡⚡ funciones front
    function registro_usuario($nombres, $apellidos, $correo, $pass){
        $user_nombres = limpiar_string(trim($nombres));
        $user_apellidos = limpiar_string(trim($apellidos));
        $user_email = limpiar_string(trim($correo));
        $user_pass = limpiar_string(trim($pass));

        $user_token = md5($user_email);
        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT, array('cost' => 12));
        $query = query("INSERT INTO usuarios (user_nombres, user_apellidos, user_email, user_pass, user_token, user_rol) VALUES ('{$user_nombres}', '{$user_apellidos}', '{$user_email}', '{$user_pass}', '{$user_token}', 'suscriptor')");
        confirmar($query);
        $mensaje = "Por favor pulsa o has click en el enlace para activar tu cuenta. <br><a href='http://localhost/dw2022-1/04%20CMS/public/activate.php?email={$user_email}&token={$user_token}' target='_blank'>Activar cuenta</a>";
        send_email($user_email, 'Activacion de cuenta', $mensaje);
        return true;
    }


    function validar_user_reg(){
        $min = 3;
        $max = 10;

        $errores = [];

        if(isset($_POST['registrar'])){
            $user_nombres = limpiar_string(trim($_POST['user_nombres']));
            $user_apellidos = limpiar_string(trim($_POST['user_apellidos']));
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_pass_confirmar = limpiar_string(trim($_POST['user_pass_confirmar']));

            if(strlen($user_nombres) < $min){
                $errores[] = "Tus nombres no deben tener menos de {$min} caracteres";
            }
            if(strlen($user_nombres) > $max){
                $errores[] = "Tus nombres no deben tener mas de {$max} caracteres";
            }
            if(strlen($user_apellidos) < $min){
                $errores[] = "Tus apellidos no deben tener menos de {$min} caracteres";
            }
            if(strlen($user_apellidos) > $max){
                $errores[] = "Tus apellidos no deben tener mas de {$max} caracteres";
            }
            if(email_existe($user_email)){
                $errores[] = "El correo ingresado ya existe, intente otra vez 😢";
            }
            if($user_pass != $user_pass_confirmar){
                $errores[] = "Las contraseñas ingresadas deben ser iguales";
            }

            if(!empty($errores)){
                foreach($errores as $error){
                    echo display_danger_msj($error);
                }
            } else {
                if(registro_usuario($user_nombres, $user_apellidos, $user_email, $user_pass)){
                    // EL REGISTRO ES SATISFACTORIO
                    set_mensaje(display_success_msj("Registro satisfactorio, por favor revisa tu bandeja o spam para activar tu cuenta. 😁"));
                    redirect("register.php");

                } else{
                    // HUBO UN ERROR
                    set_mensaje(display_danger_msj("Lo sentimos, no se pudo efectuar la operación. Intente mas tarde 🔥🔥"));
                    redirect("register.php");
                }
            }
        }
    }


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
    // ⚡⚡🔥🔥 function global para eliminar cualquier data de cualquier tabla
    function elemento_delete($tabla, $nomCol){
        if(isset($_GET['delete'])){
            $id = limpiar_string(trim($_GET['delete']));
            $query = query("DELETE FROM {$tabla} WHERE {$nomCol} = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj('Elemento eliminado correctamente'));
            redirect("index.php?{$tabla}");
        }
    }
    
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