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
    
    function token_generator(){
        return $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    }

    // ⚡⚡ funciones front
    function validar_codigo(){
        if(isset($_COOKIE['temp_access_code'])){
            if(!isset($_GET['email']) || !isset($_GET['code'])){
                set_mensaje(display_danger_msj('Lo sentimos, no se pudo verificar correctamente los datos. Intentelo otra vez'));
                redirect('forgot-password.php');
            } else if(empty($_GET['email']) || empty($_GET['code'])){
                set_mensaje(display_danger_msj('Lo sentimos, no se pudo verificar correctamente los datos. Intentelo otra vez'));
                redirect('forgot-password.php');
            } else {
                if(isset($_POST['reset'])){
                    $user_email = limpiar_string(trim($_GET['email']));
                    $user_token = limpiar_string(trim($_POST['user_token']));
                    $query = query("SELECT * FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
                    confirmar($query);
                    if(contar_filas($query) == 1){
                        setcookie('temp_access_code', $user_token, time() + 1000);
                        redirect("reset.php?email={$user_email}&token={$user_token}");
                    } else {
                        set_mensaje(display_danger_msj('Lo sentimos, datos invalidos'));
                        redirect('forgot-password.php');
                    }
                }
            }
        } else {
            set_mensaje(display_danger_msj('Lo sentimos, el tiempo de validación ha caducado. Intentelo otra vez'));
            redirect('forgot-password.php');
        }
    }

    function recover_password(){
        if(isset($_POST['recover'])){
            if(isset($_SESSION['token']) && $_POST['user_token'] == $_SESSION['token']){
                $user_email = limpiar_string(trim($_POST['user_email']));
                if(email_existe($user_email)){
                    $codigo_validacion = md5($user_email . microtime());
                    setcookie("temp_access_code", $codigo_validacion, time() + 600);
                    $query = query("UPDATE usuarios SET user_token = '{$codigo_validacion}' WHERE user_email = '{$user_email}'");
                    confirmar($query);
                    $asunto = 'Por favor cambie su contraseña';
                    $mensaje = "Por favor ingrese el siguiente codigo <strong>{$codigo_validacion}</strong> en el siguiente enlace<br><a href='http://localhost/dw2022-1/04%20CMS/public/code.php?email={$user_email}&code={$codigo_validacion}' target='_blank'>Cambiar contraseña</a>";
                    if(!send_email($user_email, $asunto, $mensaje)){
                        set_mensaje(display_danger_msj('El correo no se pudo enviar, intente más tarde'));
                        redirect('forgot-password.php');
                    }
                    set_mensaje(display_success_msj('Tu codigo de validacion fue enviado a tu correo. Por favor revisa tu bandeja o spam. Esto puede tardar unos minutos'));
                    redirect('forgot-password.php');
                } else {
                    set_mensaje(display_danger_msj("El correo ingresado no existe"));
                    redirect("forgot-password.php");
                }
            } else{
                set_mensaje(display_danger_msj('datos no validos'));
                redirect("forgot-password.php");
            }
        }
    }
    
    function login_user($email, $pass, $recordarme){
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}' AND user_status = 1");
        confirmar($query);
        if(contar_filas($query) == 1){
            $fila = fetch_array($query);
            $user_id = $fila['user_id'];
            $user_pass = $fila['user_pass'];
            $user_rol = $fila['user_rol'];
            $user_nombres = $fila['user_nombres'];
            $user_apellidos = $fila['user_apellidos'];

            // VALIDAR EL PASSWORD
            if(password_verify($pass, $user_pass)){
                // CREAR VARAIBLES DE SESION
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_nombres'] = $user_nombres;
                $_SESSION['user_apellidos'] = $user_apellidos;
                $_SESSION['user_rol'] = $user_rol;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function validar_user_login(){
        if(isset($_POST['login'])){
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_recordarme = isset($_POST['user_recordarme']);
            
            if(login_user($user_email, $user_pass, $user_recordarme)){
                redirect('./');
            } else {
                set_mensaje(display_danger_msj('Tu correo o password son incorrectos 😢😢'));
                redirect('login.php');
            }
        }
    }

    function activar_usuario(){
        $user_email = limpiar_string(trim($_GET['email']));
        $user_token = limpiar_string(trim($_GET['token']));
        $query = query("SELECT user_id FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
        confirmar($query);
        if(contar_filas($query) == 1){
            $fila = fetch_array($query);
            $user_id = $fila['user_id'];
            $query = query("UPDATE usuarios SET user_status = 1, user_token = '' WHERE user_id = {$user_id}");
            confirmar($query);
            set_mensaje(display_success_msj("Su cuenta a sido verificada y activada, por favor inicie sesión"));
            redirect('login.php');  
        } else {
            set_mensaje(display_danger_msj("Los datos son erroneos. Vuelva a verificar 🤷‍♀️"));
            redirect("register.php");
        }
    }

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