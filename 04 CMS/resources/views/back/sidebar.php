        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="./">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link" href="index.php?categorias">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Categorias</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?publicaciones">
                    <i class="fas fa-vote-yea"></i>
                    <span>Publicaciones</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?comentarios">
                    <i class="fas fa-comments"></i>
                    <span>Comentarios</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <?php
                if(isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 'god'){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#usuarios"
                                aria-expanded="true" aria-controls="collapseTwo">
                                <i class="fas fa-users"></i>
                                <span>Usuarios</span>
                            </a>
                            <div id="usuarios" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <a class="collapse-item" href="index.php?suscriptores">Suscriptores</a>
                                    <a class="collapse-item" href="index.php?administradores">Administradores</a>
                                    <a class="collapse-item" href="index.php?desactivados">Desactivados</a>
                                </div>
                            </div>
                        </li>

                <?php }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>