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
                    
                    if(isset($_GET['usuarios'])){
                        echo 'estas en usuarios';
                    }
                
                ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(VIEW_BACK . DS . "footer.php"); ?>