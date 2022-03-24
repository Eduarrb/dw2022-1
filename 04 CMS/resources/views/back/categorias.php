<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php mostrar_msj(); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="cat_nombre">Agregar Categoria</label>
                    <input type="text" class="form-control" name="cat_nombre" id="cat_nombre">
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" name="guardar" class="btn btn-primary">
                </div>
            </form>
            <?php 
                categoria_crear();
                
                if(isset($_GET['edit'])){
                    include(VIEW_BACK . DS . "categoria_edit.php");
                }
            ?>
        </div>
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    <?php show_categorias_admin(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>