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