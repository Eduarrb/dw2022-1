<?php 
    include "conexion.php";
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
                Ingresa los datos de la pelicula
            </h4>
            <form action="" class="col-md-6 mt-3 pb-5">
                <div class="form-group">
                    <label for="peli_nombre">Nombre de peliculas</label>
                    <input type="text" class="form-control" id="peli_nombre" name="peli_nombre">
                </div>
                <div class="form-group">
                    <label for="peli_genero">Género</label>
                    <input type="text" class="form-control" id="peli_genero" name="peli_genero">
                </div>
                <div class="form-group">
                    <label for="peli_estreno">Fecha de estreno</label>
                    <input type="date" class="form-control" id="peli_estreno" name="peli_estreno">
                </div>
                <div class="form-group">
                    <label for="peli_restricciones">Restricciones</label>
                    <input type="text" class="form-control" id="peli_restricciones" name="peli_restricciones">
                </div>
                <div class="form-group">
                    <label for="peli_img">Imagen URL</label>
                    <input type="text" class="form-control" id="peli_img" name="peli_img">
                </div>
                <div class="form-group">
                    <label for="peli_dire_id">Director</label>
                    <select name="peli_dire_id" id="peli_dire_id" class="form-control">
                        <option value="1">Jon Wants</option>
                        <option value="2">Steven Spilber</option>
                        <option value="5">Lana Wachosky</option>
                    </select>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">
                </div>
            </form>
        </div>
    </section>
</body>
</html>