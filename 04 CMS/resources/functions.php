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
    // require 'vendor/autoload.php';

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
    function publicacion_individual_mostrar(){
        if(isset($_GET['blog'])){
            $id = limpiar_string(trim($_GET['blog']));
            $query = query("UPDATE publicaciones SET pub_vistas = pub_vistas + 1 WHERE pub_id = {$id}");
            confirmar($query);
            $query = query("SELECT * FROM publicaciones a INNER JOIN usuarios b ON a.pub_user_id = b.user_id WHERE pub_id = {$id}");
            confirmar($query);
            return fetch_array($query);
        }
    }

    function publicaciones_mostrar_resto($id_excluyente){
        $query = query("SELECT pub_id, pub_img, pub_fecha, pub_titulo, pub_resumen FROM publicaciones WHERE pub_status = 'publicado' AND pub_id != {$id_excluyente} ORDER BY pub_id DESC");
        confirmar($query);
        while($fila = fetch_array($query)){
            $publicaciones = <<<DELIMITADOR
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="post.php?blog={$fila['pub_id']}"><img class="card-img-top" src="img/{$fila['pub_img']}" alt="{$fila['pub_titulo']}" /></a>
                        <div class="card-body">
                            <div class="small text-muted">{$fila['pub_fecha']}</div>
                            <h2 class="card-title h4">{$fila['pub_titulo']}</h2>
                            <p class="card-text">{$fila['pub_resumen']}</p>
                            <a class="btn btn-primary" href="post.php?blog={$fila['pub_id']}">Leer más →</a>
                        </div>
                    </div>
                </div>
DELIMITADOR;
            echo $publicaciones;
        }
    }
    function publicaciones_mostrar_ultimo(){
        global $ultimo_id;
        $query = query("SELECT pub_id, pub_img, pub_fecha, pub_titulo, pub_resumen FROM publicaciones WHERE pub_status = 'publicado' ORDER BY pub_id DESC LIMIT 1");
        confirmar($query);
        $fila = fetch_array($query);
        $ultimo_id = $fila['pub_id'];
        $publicacion = <<<DELIMITADOR
            <div class="card mb-4">
                <a href="post.php?blog={$fila['pub_id']}"><img class="card-img-top" src="img/{$fila['pub_img']}" alt="{$fila['pub_titulo']}" /></a>
                <div class="card-body">
                    <div class="small text-muted">{$fila['pub_fecha']}</div>
                    <h2 class="card-title">{$fila['pub_titulo']}</h2>
                    <p class="card-text">{$fila['pub_resumen']}</p>
                    <a class="btn btn-primary" href="post.php?blog={$fila['pub_id']}">Leer más →</a>
                </div>
            </div>
DELIMITADOR;
        echo $publicacion;
    }

    function password_reset(){
        if(isset($_COOKIE['temp_access_code'])){
            if(!isset($_GET['email']) || !isset($_GET['token'])){
                set_mensaje(display_danger_msj('Lo sentimos, no se pudo verificar correctamente los datos. Intentelo otra vez'));
                redirect('forgot-password.php');
            } else {
                if(isset($_POST['confirmar'])){
                    $user_pass = limpiar_string(trim($_POST['user_pass']));
                    $user_pass_confirmar = limpiar_string(trim($_POST['user_pass_confirmar']));
                    $user_email = limpiar_string(trim($_GET['email']));
                    // echo $user_pass;
                    // echo '<br>';
                    // echo $user_pass_confirmar;

                    if($user_pass != $user_pass_confirmar){
                        echo display_danger_msj('Las contraseñas deben ser iguales');
                        
                    } else {
                        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT, array('cost' => 12));
                        $query = query("UPDATE usuarios SET user_pass = '{$user_pass}', user_token = '' WHERE user_email = '{$user_email}'");
                        confirmar($query);
                        set_mensaje(display_success_msj('La constraseña se cambió correctamente, por favor inicie sesión'));
                        redirect('login.php');
                    }
                }
            }
        }
        else {
            set_mensaje(display_danger_msj('Lo sentimos, el tiempo de validación a caducado. Intentelo otra vez'));
            redirect('forgot-password.php');
        }
    }

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
    function comentarios_mostrar_admin(){
        $query = query("SELECT a.com_id, c.pub_id, c.pub_titulo, CONCAT(b.user_nombres, ' ', b.user_apellidos) AS usuario, a.com_mensaje, a.com_fecha, a.com_status, c.pub_user_id FROM comentarios a INNER JOIN usuarios b ON a.com_user_id = b.user_id INNER JOIN publicaciones c ON a.com_pub_id = c.pub_id WHERE a.com_status = 'pendiente' AND c.pub_user_id = {$_SESSION['user_id']}");
        confirmar($query);
        while($fila = fetch_array($query)){
            $comentario = <<<DELIMITADOR
                <tr>
                    <td>
                        <a href="../post.php?blog={$fila['pub_id']}" target="_blank">{$fila['pub_titulo']}</a>
                    </td>
                    <td>{$fila['usuario']}</td>
                    <td>{$fila['com_mensaje']}</td>
                    <td>{$fila['com_fecha']}</td>
                    <td>{$fila['com_status']}</td>
                    <td>
                        <a href="#" class="btn btn-small btn-success">aprobar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-small btn-danger">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $comentario;
        }
    }
    function comentario_crear($pub_id, $user_id){
        if(isset($_POST['enviar'])){
            $com_mensaje = limpiar_string(trim($_POST['com_mensaje']));
            $query = query("INSERT INTO comentarios (com_user_id, com_pub_id, com_mensaje, com_fecha, com_status) VALUES ({$user_id}, {$pub_id}, '{$com_mensaje}', NOW(), 'pendiente')");
            set_mensaje(display_success_msj("Tu comentario ha sido enviado satisfactoriamente. Espere a la aprobación del ADMIN"));
            redirect("post.php?blog={$pub_id}");
        }
    }
    function publicacion_editar($pub_id, $img_name){
        if(isset($_POST['editar'])){
            $pub_titulo = limpiar_string(trim($_POST['pub_titulo']));
            $pub_cat_id = limpiar_string(trim($_POST['pub_cat_id']));
            $pub_resumen = limpiar_string(trim($_POST['pub_resumen']));
            $pub_contenido = limpiar_string(trim($_POST['pub_contenido']));
            $pub_img = limpiar_string(trim($_FILES['pub_img']['name']));
            $pub_img_temp = $_FILES['pub_img']['tmp_name'];
            $pub_status = limpiar_string(trim($_POST['pub_status']));

            if(empty($pub_img)){
                $pub_img = $img_name;
            } else {
                $imgLocation = "../img/{$img_name}";
                unlink($imgLocation);
                $pub_img = md5(uniqid()) . "." . explode('.', $pub_img)[1];
                move_uploaded_file($pub_img_temp, "../img/{$pub_img}");
            }
            $query = query("UPDATE publicaciones SET pub_cat_id = {$pub_cat_id}, pub_titulo = '{$pub_titulo}', pub_resumen = '{$pub_resumen}', pub_contenido = '{$pub_contenido}', pub_img = '{$pub_img}', pub_status = '{$pub_status}' WHERE pub_id = {$pub_id}");
            confirmar($query);
            set_mensaje(display_success_msj('Publicación actualizada correctamente. 😊'));
            redirect('index.php?publicaciones');
        }
    }
    function mostrar_options_status_editar($status){
        if($status == 'publicado'){
            ?>
                <option value="pendiente">Pendiente</option>
        <?php }
        else {
            ?>
                <option value="publicado">Publicado</option>
        <?php }
    }
    function mostrar_options_cat_editar($id){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $cat_id = $fila['cat_id'];
            $cat_nombre = $fila['cat_nombre'];

            if($cat_id == $id){
                ?>
                    <option value="<?php echo $fila['cat_id']?>" selected><?php echo $fila['cat_nombre']; ?></option>
            <?php }
            else {
                ?>
                    <option value="<?php echo $fila['cat_id']?>"><?php echo $fila['cat_nombre']; ?></option>
            <?php }
        }
    }

    function mostrar_publicacion_editar(){
        if(isset($_GET['publicaciones_edit'])){
            $id = limpiar_string(trim($_GET['publicaciones_edit']));
            $query = query("SELECT * FROM publicaciones WHERE pub_id = {$id}");
            confirmar($query);
            return fetch_array($query);
        }
    }

    function publicacion_agregar(){
        if(isset($_POST['guardar'])){
            $pub_titulo = limpiar_string(trim($_POST['pub_titulo']));
            $pub_cat_id = limpiar_string(trim($_POST['pub_cat_id']));
            $pub_resumen = limpiar_string(trim($_POST['pub_resumen']));
            $pub_contenido = limpiar_string(trim($_POST['pub_contenido']));
            $pub_img = limpiar_string(trim($_FILES['pub_img']['name']));
            $pub_img_temp = $_FILES['pub_img']['tmp_name'];
            $pub_status = limpiar_string(trim($_POST['pub_status']));
            
            // print_r($pub_img);
            $pub_img = md5(uniqid()) . "." . explode('.', $pub_img)[1];
            // gatito.bonito.lindos.png
            // 2165435156435.png
            // echo $pub_img;
            move_uploaded_file($pub_img_temp, "../img/{$pub_img}");

            $query = query("INSERT INTO publicaciones (pub_titulo, pub_cat_id, pub_user_id, pub_resumen, pub_contenido, pub_img, pub_fecha, pub_status) VALUES ('{$pub_titulo}', {$pub_cat_id}, {$_SESSION['user_id']}, '{$pub_resumen}', '{$pub_contenido}', '{$pub_img}', NOW(), '{$pub_status}')");
            confirmar($query);
            set_mensaje(display_success_msj('La publicacion fue guardada exitosamente 😊😊'));
            redirect('index.php?publicaciones');
        }
    }
    function categorias_mostrar_options(){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $categoria = <<<DELIMITADOR
                <option value="{$fila['cat_id']}">{$fila['cat_nombre']}</option>
DELIMITADOR;
            echo $categoria;
        }
    }
    function publicaciones_mostrar_admin(){
        if($_SESSION['user_rol'] == 'god'){
            $query = query("SELECT * FROM publicaciones a INNER JOIN categorias b ON a.pub_cat_id = b.cat_id INNER JOIN usuarios c ON a.pub_user_id = c.user_id ORDER BY a.pub_id DESC");
            confirmar($query);
        } else {
            $query = query("SELECT * FROM publicaciones a INNER JOIN categorias b ON a.pub_cat_id = b.cat_id INNER JOIN usuarios c ON a.pub_user_id = c.user_id WHERE c.user_id = {$_SESSION['user_id']} ORDER BY a.pub_id DESC");
            confirmar($query);
        }
        while($fila = fetch_array($query)){
            $publicacion = <<<DELIMITADOR
                <tr>
                    <td>{$fila['cat_nombre']}</td>
                    <td><a href="../post.php?blog={$fila['pub_id']}" target="_blank">{$fila['pub_titulo']}</a></td>
                    <td>{$fila['user_nombres']} {$fila['user_apellidos']}</td>
                    <td>{$fila['pub_resumen']}</td>
                    <td><img src="../img/{$fila['pub_img']}" alt="" width="150"></td>
                    <td>{$fila['pub_fecha']}</td>
                    <td>{$fila['pub_status']}</td>
                    <td>{$fila['pub_vistas']}</td>
                    <td>
                        <a href="index.php?publicaciones_edit={$fila['pub_id']}" class="btn btn-small btn-success">editar</a>
                        <a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['pub_id']}" table="publicaciones">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $publicacion;
        }
    }
    function show_user_desactivado(){
        $query = query("SELECT * FROM usuarios WHERE user_status = 0");
        confirmar($query);
        while($fila = fetch_array($query)){
            $usuarios = <<<DELIMITADOR
                <tr>
                    <td>{$fila['user_nombres']}</td>
                    <td>{$fila['user_apellidos']}</td>
                    <td>{$fila['user_email']}</td>
                    <td>{$fila['user_rol']}</td>
                    <td>
                        <a href="index.php?desactivados&enable={$fila['user_id']}" class="btn btn-small btn-success">Activar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $usuarios;
        }
    }

    function usuarios_desactivar(){
        if(isset($_GET['deni'])){
            $id = limpiar_string(trim($_GET['deni']));
            $query = query("UPDATE usuarios SET user_status = 0 WHERE user_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("Usuario desactivadao correctamente"));
            redirect('index.php?desactivados');
        }
    }
    
    function usuarios_cambiar_rol($rol, $parametro_vista){
        if(isset($_GET['admin'])){
            $id = limpiar_string(trim($_GET['admin']));
            $query = query("UPDATE usuarios SET user_rol = '{$rol}' WHERE user_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj('El cambio de rol se hizo satisfactoriamente'));
            redirect("index.php?{$parametro_vista}");
        }
    }

    function show_user_rol($rol, $estado, $parametro){
        $query = query("SELECT * FROM usuarios WHERE user_rol = '{$rol}' AND user_status = {$estado}");
        confirmar($query);
        while($fila = fetch_array($query)){
            $usuarios = <<<DELIMITADOR
                <tr>
                    <td>{$fila['user_nombres']}</td>
                    <td>{$fila['user_apellidos']}</td>
                    <td>{$fila['user_email']}</td>
                    <td>
                        <a href="index.php?{$parametro}&admin={$fila['user_id']}" class="btn btn-small btn-success">Cambiar</a>
                    </td>
                    <td>
                        <a href="index.php?{$parametro}&deni={$fila['user_id']}" class="btn btn-small btn-danger">Desactivar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $usuarios;
        }
    }


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