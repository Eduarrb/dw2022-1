-- 💡💡 RELACIONAR TABLAS SIN EL USO DE LLAVES PRIMARIAS Y FORANEAS 💡💡

CREATE TABLE personajes (
    per_act_id INT NOT NULL,
    per_peli_id INT NOT NULL,
    per_nombre VARCHAR(100) NOT NULL
)

INSERT INTO personajes (per_act_id, per_peli_id, per_nombre) VALUES
    (1, 1, 'Spiderman'),
    (2, 1, 'MJ'),
    (3, 2, 'Neo'),
    (4, 2, 'Trinity'),
    (5, 4, 'Rose'),
    (6, 4, 'Jack'),
    (7, 5, 'Joseph Cooper'),
    (8, 5, 'Amalia Brand'),
    (9, 7, 'Jake Zully')

-- ⚡⚡ RELACIONES
-- NOTA 2 TABLAS
-- PELICULAS - PERSONAJES | PERSONAJES - ACTORES

SELECT * 
    FROM peliculas, personajes
    WHERE peliculas.peli_id = personajes.per_peli_id

SELECT *
    FROM personajes, actores
    WHERE personajes.per_act_id = actores.act_id

-- NOMBRE DE LA PELICULA, NOMBRE DEL PERSONAJE, FECHA DE ESTRENO, LA RESTRICION SEA SOLO DE PG-13

SELECT 
    peli_nombre,
    per_nombre,
    peli_estreno,
    peli_restricciones
    FROM peliculas, personajes
    WHERE peliculas.peli_id = personajes.per_peli_id 
        AND peli_restricciones = 'pg-13'

-- UN SOLA COLUMNA (NOMBRES Y APELLIDOS) DEL ACTOR, SU PERSONAJE

SELECT 
    CONCAT(act_nombres, ' ', act_apellidos) AS actor,
    per_nombre
    FROM personajes, actores
    WHERE personajes.per_act_id = actores.act_id

-- NOTA 3 TABLAS
SELECT *
    FROM peliculas, personajes, actores
        WHERE peliculas.peli_id = personajes.per_peli_id
            AND personajes.per_act_id = actores.act_id

-- (NOMBRES Y APELLIDOS DEL ACTOR), PERSONAJE, PELICULA, FECHA DE ESTRENO, LIMITE LA CONSULTA ESTE ORDENANDA DE MANERA DESCENDENTE POR LA FECHA DE ESTRENO
SELECT 
    CONCAT(act_nombres, ' ', act_apellidos) AS actor,
    per_nombre,
    peli_nombre,
    peli_estreno
    FROM peliculas, personajes, actores
        WHERE peliculas.peli_id = personajes.per_peli_id
            AND personajes.per_act_id = actores.act_id
        ORDER BY peli_estreno DESC

CREATE TABLE directores (
    dire_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    dire_nombres VARCHAR(50) NOT NULL,
    dire_apellidos VARCHAR(50) NOT NULL
)

INSERT INTO directores (dire_nombres, dire_apellidos) VALUES
    ('Jon', 'Watts'),
    ('Lana', 'Wachowski'),
    ('James', 'Cameron'),
    ('Christopher', 'Nolan'),
    ('John', 'McTiernan'),
    ('Stanley', 'Kubrick'),
    ('Ridley', 'Scott')

ALTER TABLE peliculas ADD COLUMN peli_dire_id INT

UPDATE peliculas SET peli_dire_id = 1 WHERE peli_id = 1
UPDATE peliculas SET peli_dire_id = 2 WHERE peli_id = 2
UPDATE peliculas SET peli_dire_id = 3 WHERE peli_id = 4
UPDATE peliculas SET peli_dire_id = 3 WHERE peli_id = 7
UPDATE peliculas SET peli_dire_id = 4 WHERE peli_id = 5
UPDATE peliculas SET peli_dire_id = 5 WHERE peli_id = 6
UPDATE peliculas SET peli_dire_id = 6 WHERE peli_id = 8
UPDATE peliculas SET peli_dire_id = 7 WHERE peli_id = 9

-- PELICULAS - DIRECTORES
SELECT *
    FROM peliculas, directores
        WHERE peliculas.peli_dire_id = directores.dire_id

SELECT *
    FROM peliculas, directores
        WHERE peli_dire_id = dire_id

-- SELECT *
--     FROM peliculas, directores
--         WHERE peliculas.id = directores.id

-- ⚡⚡ ALIAS PARA LAS TABLAS

SELECT *
    FROM peliculas a, directores b
        WHERE a.peli_dire_id = b.dire_id

-- NOMBRE DE LA PELICULA | (NOMBRES Y APELLIDOS DEL DIRECTOR) | (NOMBRES Y APELLIDOS DE LOS ACTORES) | PERSONAJES | LIMITE -> PELICULAS ESTEN EN ORDEN ALFABETICO ASCENDENTE

SELECT 
    a.peli_nombre,
    CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director,
    CONCAT(c.act_nombres, ' ', c.act_apellidos) AS actor,
    d.per_nombre
    FROM peliculas a, directores b, actores c, personajes d
        WHERE a.peli_dire_id = b.dire_id
            AND a.peli_id = d.per_peli_id
            AND c.act_id = d.per_act_id
        ORDER BY a.peli_nombre ASC