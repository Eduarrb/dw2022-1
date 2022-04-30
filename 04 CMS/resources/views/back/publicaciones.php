<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Publicaciones</h1>
    </div>
    <div class="row">
        <a href="index.php?publicaciones_add" class="btn btn-primary">+ Agregar Publicación</a>
        <div class="col-md-12">
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
                </tbody>
            </table>
            <?php elemento_delete("publicaciones", "pub_id") ?>
        </div>
    </div>
</div>