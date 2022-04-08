<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios - Administradores</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php mostrar_msj(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Convertir a Admin</th>
                        <th>Desactivar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        show_user_rol('admin', 1, 'administradores');
                    ?>
                </tbody>
            </table>
            <?php
                usuarios_cambiar_rol('suscriptor','suscriptores');
                usuarios_desactivar();
            ?>
        </div>
    </div>
</div>