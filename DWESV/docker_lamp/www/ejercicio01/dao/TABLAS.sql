DROP TABLE IF EXISTS clientes;
DROP TABLE IF EXISTS viajes;
DROP TABLE IF EXISTS clientes_viajes;
CREATE TABLE clientes( id INTEGER AUTO_INCREMENT,
                       nif VARCHAR(9) NOT NULL,
                       nombre VARCHAR(20) NOT NULL,
                       apellido1 VARCHAR(20) NOT NULL,
                       apellido2 VARCHAR(20) NOT NULL,
                       email VARCHAR(100) NOT NULL,
                       foto VARCHAR(100) NOT NULL,
                       created_at DATETIME NOT NULL,
                       updated_at DATETIME NOT NULL,
                       PRIMARY KEY (id),
                       CONSTRAINT UQ_nif UNIQUE (nif),
                       CONSTRAINT UQ_email UNIQUE (email));

CREATE TABLE viajes( id INTEGER AUTO_INCREMENT,
                     codigo VARCHAR(20) NOT NULL,
                     descripcion VARCHAR(100) NOT NULL,
                     precio DOUBLE NOT NULL,
                     salida DATETIME,
                     llegada DATETIME,
                     foto VARCHAR(100) NOT NULL,
                     created_at DATETIME NOT NULL,
                     updated_at DATETIME NOT NULL,
                     PRIMARY KEY (id),
                     CONSTRAINT UQ_codigo UNIQUE (codigo));

CREATE TABLE clientes_viajes( id INTEGER AUTO_INCREMENT,
                     cliente_id INTEGER NOT NULL,
                     viaje_id INTEGER NOT NULL,
                     pagado DOUBLE NOT NULL,
                     created_at DATETIME NOT NULL,
                     updated_at DATETIME NOT NULL,
                     PRIMARY KEY (id),
                     CONSTRAINT FK_cliente_id FOREIGN KEY(cliente_id) REFERENCES clientes(id),
                     CONSTRAINT FK_viaje_id FOREIGN KEY(viaje_id) REFERENCES viajes(id));