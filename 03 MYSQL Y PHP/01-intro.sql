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