<?php 
    require_once("../resources/config.php");
    include(VIEW_FRONT . DS . "head.php");
?>
        <!-- Responsive navbar-->
        <?php include(VIEW_FRONT . DS . "nav.php"); ?>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Bienvenido a mi Blog</h1>
                    <p class="lead mb-0">Este blog va dirigido a cursos de programación</p>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <?php
                            publicaciones_cat_mostrar()
                        ?>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <?php include(VIEW_FRONT . DS . "sidebar.php"); ?>
            </div>
        </div>
        <!-- Footer-->
        <?php include(VIEW_FRONT . DS . "footer.php"); ?>