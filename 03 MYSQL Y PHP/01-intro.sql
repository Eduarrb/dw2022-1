-- mysql -u root --> INICIO EN CONSOLA
-- mysql -u root -p --> para ingresar con contraseña

-- ⚡⚡ COMANDOS INICIALES ⚡⚡
show databases
SHOW DATABASES

CREATE DATABASE dw2022_1

DROP DATABASE dw2022_1 -- ALERTA no hacerlo en producción 💥💥💥💥💥💥

USE dw2022_1

-- ⚡⚡ CREACION DE TABLAS
-- 'hc2021-1'
CREATE TABLE persona (
    per_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    per_nombres VARCHAR(50) NOT NULL,
    per_apellidos VARCHAR(50) NOT NULL,
    per_fecha_nac DATE,
    per_dni CHAR(8) UNIQUE NOT NULL
)

SHOW TABLES
DESC persona

ALTER TABLE persona ADD COLUMN per_genero VARCHAR(25)

ALTER TABLE persona CHANGE COLUMN per_genero per_genero CHAR(1) NOT NULL

ALTER TABLE persona ADD COLUMN per_fecha_registro DATETIME NOT NULL AFTER per_dni

ALTER TABLE persona DROP COLUMN per_fecha_registro

-- ⚡⚡ INSERTAR DATOS
INSERT INTO persona (per_nombres, per_apellidos, per_dni, per_genero) VALUES 
    ('Ricardo', 'Fuentes', '12345678', 'M')

SELECT * FROM persona

SELECT per_nombres, per_apellidos FROM persona

-- INSERT INTO persona (per_nombres, per_apellidos, per_fecha_nac, per_dni, per_genero) VALUES 
--     ('Sofia', 'Melendez', '1999-10-01', '12345678', 'F')

INSERT INTO persona (per_nombres, per_apellidos, per_fecha_nac, per_dni, per_genero) VALUES 
    ('Sofia', 'Melendez', '1999-10-01', '11111111', 'F'),
    ('Malena', 'Ruiz', '1970-01-01', '22222222', 'F'),
    ('Pedro', 'Casas', '1980-10-10', '33333333', 'M')

-- 💥💥💥💥😨😨😨 CON MUCHO CUIDADO
DELETE FROM persona WHERE per_id = 5

-- id
-- CONTIJAB001
-- CONTIJF0002 --> JUAN FEIJO
-- CONTIJF0002 --> JOSE FERNANDEZ

INSERT INTO persona (per_id,per_nombres,per_apellidoS,per_fecha_nac,per_dni,per_genero) VALUE (2,'Rocio','Flores','1999-10-01','12345333','F')

TRUNCATE persona;
------------------------------------------------------------------------------------------
CREATE TABLE peliculas (
    peli_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    peli_nombre VARCHAR(255) NOT NULL,
    peli_genero VARCHAR(100) NOT NULL,
    peli_estreno DATE NOT NULL,
    peli_restricciones VARCHAR(10)
)

INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones) VALUES
    ('Spiderman: No way home', 'Acción', '2021-12-24', 'PG-13'),
    ('Matrix', 'Ciencia Ficción', '1999-12-24', 'PG-13'),
    ('El Código Enigma', 'Bélica', '2017-08-29', 'PG-16'),
    ('Titanic', 'Drama romántico', '1997-07-07', 'PG-13'),
    ('Interestellar', 'Ciencia Ficción', '2014-10-10', 'PG-13'),
    ('Depredador', 'Ciencia Ficción', '1987-12-24', 'PG-16'),
    ('Avatar', 'Ciencia Ficción', '2009-10-18', 'PG'),
    ('El Resplandor', 'Terror', '1980-10-19', 'PG-13'),
    ('Alien: El octavo pasajero', 'Ciencia Ficción', '1980-01-12', 'PG-18')

-- ⚡⚡ WHERE
SELECT * FROM peliculas WHERE peli_id = 5

SELECT * FROM peliculas WHERE peli_nombre = 'interestellar'

SELECT * FROM peliculas WHERE peli_genero = 'ciencia ficcion'

SELECT * FROM peliculas WHERE peli_restricciones = 'pg-13'

SELECT * FROM peliculas WHERE peli_restricciones = 'pg-13' AND peli_genero = 'ciencia ficcion'

SELECT * FROM peliculas WHERE peli_restricciones = 'pg-13' OR peli_genero = 'ciencia ficcion'

-- ⚡⚡ ORDER BY
SELECT * FROM peliculas

SELECT * FROM peliculas ORDER BY peli_id ASC

SELECT * FROM peliculas ORDER BY peli_id DESC

SELECT * FROM peliculas ORDER BY peli_nombre DESC

SELECT * FROM peliculas WHERE peli_restricciones = 'pg-13' ORDER BY peli_estreno

SELECT * FROM peliculas WHERE peli_restricciones = 'pg-16' ORDER BY peli_genero DESC

---------------------------------------------------------------------------------

CREATE TABLE actores (
    act_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    act_nombres VARCHAR(100) NOT NULL,
    act_apellidos VARCHAR(100) NOT NULL
)

INSERT INTO actores (act_nombres, act_apellidos) VALUES
    ('Tom', 'Holland'),
    ('Zendaya', 'Colleman'),
    ('Keanu', 'Reeves'),
    ('Carrie-Anne', 'Moss'),
    ('Kate', 'Winslet'),
    ('Leonardo', 'DiCaprio'),
    ('Matthew', 'McConaughy'),
    ('Anne', 'Hathaway'),
    ('Sam', 'Worthington'),
    ('Zoe', 'Saldana'),
    ('Jack', 'Nicholson'),
    ('Shelley', 'Duvall')

SELECT * FROM actores

SELECT act_nombres FROM actores

SELECT act_nombres, act_apellidos FROM actores

-- HACER UNA QUERY DONDE LOS NOMBRES Y APELLIDOS ESTEN EN UNA SOLA COLUMNA
SELECT CONCAT(act_nombres, act_apellidos) FROM actores

SELECT CONCAT(act_nombres, ' ', act_apellidos) FROM actores

-- 💡💡 ALIAS DE CAMPO
SELECT CONCAT(act_nombres, ' ', act_apellidos) AS actor FROM actores

SELECT CONCAT(act_nombres, ' ', act_apellidos) AS 'actor principal' FROM actores

-- HACER UNA QUERY DONDE LOS NOMBRES Y APELLIDOS ESTEN EN UNA SOLA COLUMNA Y ORDENADO POR APELLIDOS
SELECT CONCAT(act_nombres, ' ', act_apellidos) AS actor FROM actores ORDER BY act_apellidos

-- MOSTRAR EL RESULTADO DE SU POSIBLE CORREO COORPORATIVO DE TODOS LOS ACTORES
-- Eduardo Arroyo -> earroyo@continental.edu.pe
-- NOMBRES Y APELLIDOS EN UN SOLO CAMPO | EL CORREO COORPORATIVO EN OTRO
SELECT SUBSTRING(act_nombres, 1, 1) FROM actores

SELECT SUBSTRING(act_nombres, 1, 3) FROM actores

SELECT LOWER(act_apellidos) FROM actores;

SELECT 
    CONCAT(act_nombres, ' ', act_apellidos) AS actor,
    LOWER(CONCAT(SUBSTRING(act_nombres, 1, 1), act_apellidos, "@continental.edu.pe")) AS correo
        FROM actores ORDER BY act_apellidos

-- ⚡⚡ GROUP BY
SELECT COUNT(*) AS cantidad, peli_genero FROM peliculas GROUP BY peli_genero

-- QUE TE MUESTRE LA CANTIDAD DE LAS PELICULAS DE CIENCIA FICCION
-- CANTIDAD, NOMBRE DE GENERO
SELECT COUNT(peli_genero) AS cantidad, peli_genero FROM peliculas WHERE peli_genero = 'ciencia ficcion' GROUP BY peli_genero

-- QUE TE MUESTRE LA CANTIDAD DE LAS PELICULAS QUE TENGAN LA RESTRICCION PG-13
SELECT 
    COUNT(peli_restricciones) AS canti, 
    peli_restricciones 
        FROM peliculas 
            WHERE peli_restricciones = 'pg-13'
            GROUP BY peli_restricciones

-- ⚡⚡ COMODINES
SELECT * FROM peliculas WHERE peli_nombre LIKE 'a%'

SELECT * FROM peliculas WHERE peli_nombre LIKE "a%"

SELECT * FROM peliculas WHERE peli_nombre LIKE '%r'

SELECT * FROM peliculas WHERE peli_nombre LIKE '%ma%'




