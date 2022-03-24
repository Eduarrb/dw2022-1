<?php
    // 🔥🔥 RETO DE CONVERTIR ESTE CODIGO A UNA FUNCION
    $id = limpiar_string(trim($_GET['edit']));
    $query = query("SELECT * FROM categorias WHERE cat_id = {$id}");
    confirmar($query);
    $fila = fetch_array($query);
?>
<hr>
<form action="" method="post">
    <div class="form-group">
        <label for="cat_nombre">Editar Categoria</label>
        <input type="text" class="form-control" name="cat_nombre" id="cat_nombre" value="<?php echo $fila['cat_nombre']; ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="Actualizar" name="actualizar" class="btn btn-success">
    </div>
</form>
<?php categoria_edit($id); ?>