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
<!-- 
    C -> CREATE
    R -> READ
    U -> UPDATE
    D -> DELETE
 -->

    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos a Pelicomic</h1>
    <section class="container">
        <div class="row p-4">
            <a href="subir.php" class="btn btn-success">Cargar Pelicula</a>
            <a href="#" class="btn btn-info ml-2">Directores</a>
        </div>
        <div class="row">
            <?php
                $query = "SELECT a.peli_id, a.peli_nombre, a.peli_estreno, CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director, a.peli_restricciones, a.peli_img FROM peliculas a INNER JOIN directores b ON a.peli_dire_id = b.dire_id";

                $query_resultado = mysqli_query($conexion, $query);

                // echo $query_resultado;
                // print_r($query_resultado);
                echo '<br>';
                $array1 = [1, 24, 'casa', 'joshi', true];
                // echo $array1;
                // print_r($array1);
                // echo $array1[2];
                // ⚡⚡ ARRAYS ASOSIATIVOS ⚡⚡
                // 💡💡 key - value pair
                $array2 = ["nombre" => "Juan", "apellido" => "Casas"];
                // print_r($array2);
                // echo $array2["nombre"];

                while($fila = mysqli_fetch_array($query_resultado)){
                    // echo $fila;
                    // print_r($fila);
                    // echo $fila['director'];
                    // echo '<br>';
                    ?>
                        <div class="col-md-3 mb-4">
                            <img 
                                src="<?php echo $fila['peli_img']; ?>" 
                                alt="" 
                                style="width: 100%; display: block;"
                            >
                            <h4 class="text-info">
                                <?php echo $fila['peli_nombre']; ?>  
                            </h4>
                            <div>
                                <strong>Fecha: </strong> <?php echo $fila['peli_estreno']; ?>
                            </div>
                            <div>
                                <strong>Director: </strong> <?php echo $fila['director']; ?>
                            </div>
                            <div>
                                <strong>Rating: </strong> <?php echo $fila['peli_restricciones']; ?>
                            </div>
                            <div class="mt-2">
                                <a href="update.php?id=<?php echo $fila['peli_id']; ?>" class="btn btn-small btn-warning">editar</a>
                                <a href="#" class="btn btn-small btn-danger">borrar</a>
                            </div>
                        </div>
                <?php }
                
            ?>
            <!-- <div class="col-md-3 mb-4">
                <img 
                    src="https://cloudfront-us-east-1.images.arcpublishing.com/elcomercio/D4IRKEAH7NDKPOMYJ5DMYVMLGA.jpg" 
                    alt="" 
                    style="width: 100%; display: block;"
                >
                <h4 class="text-info">Spiderman: No way home</h4>
                <div>
                    <strong>Fecha: </strong> 2021-12-25
                </div>
                <div>
                    <strong>Director: </strong> Sam raimi
                </div>
                <div>
                    <strong>Rating: </strong> PG-13
                </div>
                <div class="mt-2">
                    <a href="#" class="btn btn-small btn-warning">editar</a>
                    <a href="#" class="btn btn-small btn-danger">borrar</a>
                </div>
            </div> -->
            <!-- PLANTILLA -->
            <!-- CIERRE DE PLANTILLA -->
        </div>
    </section>
</body>
</html>