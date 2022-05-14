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
                    
                </tbody>
            </table>
            <?php 
                comentario_aprobar();
                elemento_delete('comentarios', 'com_id');
            ?>
        </div>
    </div>
</div>