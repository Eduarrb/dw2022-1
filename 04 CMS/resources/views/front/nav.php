        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                            // show_categorias();
                            $query = "SELECT * FROM categorias";
                            $query_res = mysqli_query($conexion, $query);
                            while($fila = mysqli_fetch_array($query_res)){
                                // print_r($fila);
                                ?>
                                    <li class="nav-item"><a class="nav-link" href="#"><?php echo $fila['cat_nombre']; ?></a></li>
                            <?php }
                        ?>
                        <!-- <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>