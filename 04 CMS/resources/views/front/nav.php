        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                            show_categorias();
                        ?>
                        <?php
                            if(isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'admin'){
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin">
                                            ADMIN
                                        </a>
                                    </li>
                            <?php } else if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'god'){
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="admin">
                                            ADMIN
                                        </a>
                                    </li>
                            <?php }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>