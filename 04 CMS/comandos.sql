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