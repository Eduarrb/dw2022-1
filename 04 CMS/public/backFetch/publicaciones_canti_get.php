<?php
    try{
        include('db_con.php');
        $query = query("SELECT COUNT(*) AS cantidad, MONTH(pub_fecha) AS mes FROM publicaciones GROUP BY MONTH(pub_fecha)");
        $res = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $jsonResp = json_encode(['resultado' => $res, 'modulo' => 'publicaciones']);
        echo $jsonResp;
    } catch(Exception $e){
        error_log($e->getMessage());
        echo json_encode($e->getMessage());
    }
?>