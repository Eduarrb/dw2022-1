<?php 
    include "conexion.php";
    ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Peliculas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
</head>
<body>
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos a Pelicomic</h1>
    <section class="container">
        <div class="row p-4">
            <a href="./" class="btn btn-info">Regresar</a>
        </div>
        <div class="row justify-content-center">
            <h4 class="text-center col-12">
                Actualiza los datos de la pelicula
            </h4>
            <?php
                if(isset($_GET['id'])){
                    // echo ' si esta establecido';
                    $peli_id = $_GET['id'];
                    // echo $peli_id;
                    $query = "SELECT * FROM peliculas WHERE peli_id = {$peli_id}";
                    $query_res = mysqli_query($conexion, $query);
                    $fila = mysqli_fetch_array($query_res);
                    // print_r($fila);
                }
            ?>
            <form action="" method="post" class="col-md-6 mt-3 pb-5">
                <div class="form-group">
                    <label for="peli_nombre">Nombre de peliculas</label>
                    <input type="text" class="form-control" id="peli_nombre" name="peli_nombre" value="<?php echo $fila['peli_nombre']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_genero">Género</label>
                    <input type="text" class="form-control" id="peli_genero" name="peli_genero" value="<?php echo $fila['peli_genero']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_estreno">Fecha de estreno</label>
                    <input type="date" class="form-control" id="peli_estreno" name="peli_estreno" value="<?php echo $fila['peli_estreno']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_restricciones">Restricciones</label>
                    <input type="text" class="form-control" id="peli_restricciones" name="peli_restricciones" value="<?php echo $fila['peli_restricciones']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_img">Imagen URL</label>
                    <input type="text" class="form-control" id="peli_img" name="peli_img" value="<?php echo $fila['peli_img']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_dire_id">Director</label>
                    <select name="peli_dire_id" id="peli_dire_id" class="form-control">
                        <?php
                            $query_dire = "SELECT * FROM directores";
                            $query_res_dire = mysqli_query($conexion, $query_dire);

                            while($fila_dire = mysqli_fetch_array($query_res_dire)){
                                $dire_id = $fila_dire['dire_id']; // 2
                                $director = $fila_dire['dire_nombres'] . " " . $fila_dire['dire_apellidos'];
                                // 2        1
                                if($dire_id == $fila['peli_dire_id']){
                                    ?>
                                    <option selected value="<?php echo $dire_id; ?>"><?php echo $director; ?></option>
                                <?php } else {
                                    ?>
                                    <option value="<?php echo $dire_id; ?>"><?php echo $director; ?></option>
                                <?php }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" name="guardar" value="Actualizar">
                </div>
            </form>
        </div>
    </section>
</body>
</html>
<?php
    if(isset($_POST['guardar'])){
        $peli_genero = $_POST['peli_genero'];
        $peli_estreno = $_POST['peli_estreno'];
        $peli_restricciones = $_POST['peli_restricciones'];
        $peli_img = $_POST['peli_img'];
        $peli_dire_id = $_POST['peli_dire_id'];
        $peli_nombre = $_POST['peli_nombre'];

        $query_update = "UPDATE peliculas SET peli_nombre = '{$peli_nombre}', peli_genero = '{$peli_genero}', peli_estreno = '{$peli_estreno}', peli_restricciones = '{$peli_restricciones}', peli_dire_id = {$peli_dire_id}, peli_img = '{$peli_img}' WHERE peli_id = {$peli_id}";
        mysqli_query($conexion, $query_update);
        header("Location: ./");
    }

?>