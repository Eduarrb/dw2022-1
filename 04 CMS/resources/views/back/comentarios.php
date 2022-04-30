<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Comentarios</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php mostrar_msj(); ?>
        </div>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Publicación</th>
                        <th>Usuario</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php comentarios_mostrar_admin(); ?>
                    <!-- <tr>
                        <td>
                            <a href="../post.php?blog=10" target="_blank">Curso de PHP</a>
                        </td>
                        <td>Ana Jimenez</td>
                        <td>este es el mensaje</td>
                        <td>2022-04-10 10:00:00</td>
                        <td>pendiente</td>
                        <td>
                            <a href="#" class="btn btn-small btn-success">aprobar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-small btn-danger">borrar</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>