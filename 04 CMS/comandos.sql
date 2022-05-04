CREATE DATABASE cms_2022_1;

USE cms_2022_1

CREATE TABLE categorias(
    cat_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    cat_nombre VARCHAR(25) NOT NULL
)

INSERT INTO categorias (cat_nombre) VALUES
    ('PHP'),
    ('HTML5'),
    ('PYTHON'),
    ('MYSQL')

CREATE TABLE usuarios (
    user_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_nombres VARCHAR(255) NOT NULL,
    user_apellidos VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL,
    user_img TEXT,
    user_pass VARCHAR(255) NOT NULL,
    user_token TEXT,
    user_status TINYINT DEFAULT 0,
    user_rol VARCHAR(100) NOT NULL
)

INSERT INTO usuarios (user_nombres, user_apellidos, user_email, user_pass, user_rol) VALUES
    ('Eduardo', 'Arroyo', 'eduardo@gmail.com', '123', 'god')

CREATE TABLE publicaciones (
    pub_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pub_cat_id INT NOT NULL,
    pub_user_id INT NOT NULL,
    pub_titulo VARCHAR(255) NOT NULL,
    pub_resumen TEXT NOT NULL,
    pub_contenido TEXT NOT NULL,
    pub_fecha DATE NOT NULL,
    pub_img TEXT NOT NULL,
    pub_vistas INT DEFAULT 0,
    pub_status VARCHAR(20) NOT NULL
)

INSERT INTO publicaciones(pub_cat_id, pub_user_id, pub_titulo, pub_resumen, pub_contenido, pub_fecha, pub_img, pub_status)VALUES 
    (15, 5, 'Curso de Javascript', 'resumen', 'contenido', '2022-01-01', '02.png', 'publicado'),
    (1, 6, 'Curso de PHP', 'resumen', 'contenido', '2022-04-12', '01.png', 'publicado')

SELECT * FROM publicaciones WHERE pub_status = 'publicado' ORDER BY pub_id DESC LIMIT 1
SELECT * FROM publicaciones WHERE pub_status = 'publicado' AND pub_id != 6 ORDER BY pub_id DESC

CREATE TABLE comentarios (
    com_id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    com_user_id INT NOT NULL,
    com_pub_id INT NOT NULL,
    com_mensaje TEXT NOT NULL,
    com_fecha DATETIME,
    com_status VARCHAR(50) NOT NULL
)

SELECT 
    a.com_id,
    c.pub_id,
    c.pub_titulo,
    CONCAT(b.user_nombres, ' ', b.user_apellidos) AS usuario,
    a.com_mensaje,
    a.com_fecha,
    a.com_status,
    c.pub_user_id
    FROM comentarios a
        INNER JOIN usuarios b ON a.com_user_id = b.user_id
        INNER JOIN publicaciones c ON a.com_pub_id = c.pub_id
    WHERE a.com_status = 'pendiente' AND c.pub_user_id = 6


SELECT 
    CONCAT(b.user_nombres, ' ', b.user_apellidos) AS usuario,
    a.com_mensaje,
    b.user_img
    FROM comentarios a 
        INNER JOIN usuarios b ON a.com_user_id = b.user_id
    WHERE a.com_status = 'aprobado' AND com_pub_id = 