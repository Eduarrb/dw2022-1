<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agregar Publicacion</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php 
                $fila = mostrar_publicacion_editar(); 
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pub_titulo">Título</label>
                    <input type="text" class="form-control" name="pub_titulo" id="pub_titulo" value="<?php echo $fila['pub_titulo']; ?>">
                </div>
                <div class="form-group">
                    <label for="pub_cat_id">Categoria</label>
                    <select name="pub_cat_id" id="pub_cat_id" class="form-control">
                        <?php mostrar_options_cat_editar($fila['pub_cat_id']); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pub_resumen">Resumen</label>
                    <textarea name="pub_resumen" id="pub_resumen" cols="30" rows="5" class="form-control"><?php echo $fila['pub_resumen']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="pub_contenido">Contenido</label>
                    <textarea name="pub_contenido" id="pub_contenido" cols="30" rows="5" class="form-control"><?php echo $fila['pub_contenido']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="pub_img">Subir Imagen</label>
                    <br>
                    <img src="../img/<?php echo $fila['pub_img']; ?>" alt="" width="350">
                    <input type="file" name="pub_img" id="pub_img" class="form-control mt-2">
                </div>
                <div class="form-group">
                    <label for="pub_status">Estado</label>
                    <select name="pub_status" id="pub_status" class="form-control">
                        <option value="<?php echo $fila['pub_status']; ?>"><?php echo $fila['pub_status']; ?></option>
                        <?php mostrar_options_status_editar($fila['pub_status']); ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary btn-lg" name="guardar">
                </div>
            </form>
            <?php ?>
        </div>
    </div>
</div>