SELECT 
    a.peli_nombre,
    a.peli_estreno,
    CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director,
    a.peli_restricciones
    FROM peliculas a
        INNER JOIN directores b ON a.peli_dire_id = b.dire_id
        