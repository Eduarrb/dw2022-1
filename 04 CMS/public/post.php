<?php 
    require_once("../resources/config.php");
    include(VIEW_FRONT . DS . "head.php");
?>
        <!-- Responsive navbar-->
        <?php include(VIEW_FRONT . DS . "nav.php"); ?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <?php 
                        $fila = publicacion_individual_mostrar();  
                    ?>
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?php echo $fila['pub_titulo']; ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">
                                Publicado el <?php echo $fila['pub_fecha']; ?>, Por <?php echo $fila['user_nombres'] . ' ' . $fila['user_apellidos']; ?>
                            </div>
                            <!-- Post categories-->
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                                </div>
                                <div>
                                    <i class="fa-solid fa-eye"></i> <?php echo $fila['pub_vistas']; ?> vistas
                                </div>
                            </div>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="img/<?php echo $fila['pub_img']; ?>" alt="<?php echo $fila['pub_titulo']; ?>" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">
                                <?php echo $fila['pub_contenido']; ?>
                            </p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <div>
                        <?php mostrar_msj(); ?>
                    </div>
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <?php 
                                    if(isset($_SESSION['user_rol'])){
                                        ?>
                                            <form class="mb-4" method="post">
                                                <textarea class="form-control" rows="3" name="com_mensaje" placeholder="Deja tu mensaje"></textarea>
                                                <div class="form_group mt-3">
                                                    <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
                                                </div>
                                            </form>
                                    <?php } else {
                                        ?>
                                            <div class="alert alert-warning" role="alert">
                                                Debes estar registrado o iniciar sesión para poder dejar un comentario 💥💥
                                            </div>
                                    <?php }

                                    if(isset($_SESSION['user_id'])){
                                        comentario_crear($fila['pub_id'], $_SESSION['user_id']);
                                    }
                                ?>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <?php include(VIEW_FRONT . DS . "sidebar.php"); ?>
            </div>
        </div>
        <!-- Footer-->
        <?php include(VIEW_FRONT . DS . "footer.php"); ?>