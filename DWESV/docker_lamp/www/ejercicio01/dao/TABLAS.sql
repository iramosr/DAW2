DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS viajes;
CREATE TABLE clientes( id INTEGER AUTO_INCREMENT,
                       nif VARCHAR(9) NOT NULL,
                       nombre VARCHAR(20) NOT NULL,
                       apellido1 VARCHAR(20) NOT NULL,
                       apellido2 VARCHAR(20) NOT NULL,
                       email VARCHAR(50) NOT NULL,
                       created_at DATETIME NOT NULL,
                       updated_at DATETIME NOT NULL,
                       PRIMARY KEY (id),
                       CONSTRAINT UQ_nif UNIQUE (nif),
                       CONSTRAINT UQ_email UNIQUE (email));

CREATE TABLE viajes( id INTEGER AUTO_INCREMENT,
                     codigo VARCHAR(12) NOT NULL,
                     descripcion VARCHAR(50) NOT NULL,
                     precio DOUBLE NOT NULL,
                     salida DATETIME NOT NULL,
                     llegada DATETIME NOT NULL,
                     created_at DATETIME NOT NULL,
                     updated_at DATETIME NOT NULL,
                     PRIMARY KEY (id),
                     CONSTRAINT UQ_nif UNIQUE (codigo));