<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Publicacion</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="pub_titulo">Título</label>
                    <input type="text" class="form-control" name="pub_titulo" id="pub_titulo">
                </div>
                <div class="form-group">
                    <label for="pub_cat_id">Categoria</label>
                    <select name="pub_cat_id" id="pub_cat_id" class="form-control">
                        <!-- <option value="">PHP</option>
                        <option value="">Javascript</option>
                        <option value="">otros</option> -->
                        <?php categorias_mostrar_options(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pub_resumen">Resumen</label>
                    <textarea name="pub_resumen" id="pub_resumen" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="pub_contenido">Contenido</label>
                    <textarea name="pub_contenido" id="pub_contenido" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="pub_img">Subir Imagen</label>
                    <input type="file" name="pub_img" id="pub_img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pub_status">Estado</label>
                    <select name="pub_status" id="pub_status" class="form-control">
                        <option value="publicado">Publicado</option>
                        <option value="pendiente">Pendiente</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary btn-lg" name="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>