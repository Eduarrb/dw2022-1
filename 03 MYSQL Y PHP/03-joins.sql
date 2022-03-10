--  ⚡⚡ JOINS ⚡⚡

SELECT *
    FROM actores a, personajes b
        WHERE a.act_id = b.per_act_id
--------------------------------------------------
SELECT *
    FROM actores a
        INNER JOIN personajes b 
            ON a.act_id = b.per_act_id

-- PELICULAS - DIRECTORES
SELECT *
    FROM directores t
        INNER JOIN peliculas z
            ON t.dire_id = z.peli_dire_id

-- PELICULAS - PERSONAJES
SELECT *
    FROM peliculas a
        INNER JOIN personajes b
            ON a.peli_id = b.per_peli_id

-- ⚡⚡ LEFT - RIGHT JOIN

SELECT * 
    FROM peliculas a
        LEFT JOIN directores b
            ON a.peli_dire_id = b.dire_id

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ('Batman', 'ciencia ficción', '2022-03-05', 'PG-16')

INSERT INTO directores (dire_nombres, dire_apellidos) VALUES
    ('Ron', 'Howard'),
    ('Steven', 'Spilberg'),
    ('Quentin', 'Tarantino'),
    ('Night', 'Shamalan')

SELECT *
    FROM directores a
        LEFT JOIN peliculas b
            ON a.dire_id = b.peli_dire_id

SELECT *
    FROM directores t
        RIGHT JOIN peliculas sad
            ON t.dire_id = sad.peli_dire_id

SELECT *
    FROM actores a
        LEFT JOIN personajes b
            ON a.act_id = b.per_act_id

SELECT *
    FROM actores a
        RIGHT JOIN personajes b
            ON a.act_id = b.per_act_id

-- ⚡⚡ 3 TABLAS
-- PELICULAS - PERSONAJES - ACTORES
SELECT *
    FROM peliculas a
        INNER JOIN personajes b ON a.peli_id = b.per_peli_id
        INNER JOIN actores c ON b.per_act_id = c.act_id

SELECT *
    FROM peliculas a
        INNER JOIN personajes b ON a.peli_id = b.per_peli_id
        RIGHT JOIN actores c ON b.per_act_id = c.act_id