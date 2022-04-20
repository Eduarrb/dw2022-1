<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Publicaciones</h1>
    </div>
    <div class="row">
        <a href="index.php?publicaciones_add" class="btn btn-primary">+ Agregar Publicación</a>
        <div class="col-md-6">
            <?php mostrar_msj(); ?>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Resumen</th>
                        <th>Imagen</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Vistas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php publicaciones_mostrar_admin(); ?>
                    <!-- <tr>
                        <td>PHP</td>
                        <td><a href="../post.php?blog=9" target="_blank">Curso PHP</a></td>
                        <td>Pedro Salas</td>
                        <td>Resumen</td>
                        <td><img src="../img/01.png" alt="" width="150"></td>
                        <td>2022-01-01</td>
                        <td>Publicado</td>
                        <td>1246845</td>
                        <td>
                            <a href="#" class="btn btn-small btn-success">editar</a>
                            <a href="#" class="btn btn-small btn-danger">borrar</a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>