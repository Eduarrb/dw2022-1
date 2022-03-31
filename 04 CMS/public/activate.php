<?php
    require_once("../resources/config.php");
    if(isset($_GET['email']) && isset($_GET['token'])){

        activar_usuario();

    } else {
        set_mensaje(display_danger_msj("Datos de verificación incorrectos o faltantes 💥💥"));
        redirect("register.php");
    }
?>