<?php require_once("../../resources/config.php"); ?>
<?php include(VIEW_BACK . DS . "head.php"); ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include(VIEW_BACK . DS . "sidebar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(VIEW_BACK . DS . "topnav.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php
                    
                    /*
                        depenediendo del menu (METODO GET), en esta seccion debe cargar el contenido
                    */
                    if(isset($_GET['categorias'])){
                        // echo 'estas en categorias';
                        include(VIEW_BACK . DS . "categorias.php");
                    }
                    if(isset($_GET['publicaciones'])){
                        include(VIEW_BACK . DS . "publicaciones.php");
                    }
                    if(isset($_GET['publicaciones_add'])){
                        include(VIEW_BACK . DS . "publicaciones_add.php");
                    }
                    if(isset($_GET['publicaciones_edit'])){
                        include(VIEW_BACK . DS . "publicaciones_edit.php");
                    }
                    if(isset($_GET['suscriptores'])){
                        include(VIEW_BACK . DS . 'user_suscriptores.php');
                    }
                    if(isset($_GET['administradores'])){
                        include(VIEW_BACK . DS . 'user_administradores.php');
                    }
                    if(isset($_GET['desactivados'])){
                        include(VIEW_BACK . DS . 'user_desactivados.php');
                    }
                
                ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(VIEW_BACK . DS . "footer.php"); ?>