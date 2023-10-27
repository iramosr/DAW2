CREATE TABLE usuarios(
                         id INTEGER AUTO_INCREMENT PRIMARY KEY,
                         username VARCHAR(75) NOT NULL,
                         password VARCHAR(60) ,
                         email VARCHAR(75) NOT NULL,
                         nombre VARCHAR(20) NOT NULL,
                         apellido1 VARCHAR(20) NOT NULL,
                         apellido2 VARCHAR(20) NOT NULL,
                         foto VARCHAR(100),
                         activo BOOLEAN NOT NULL,
                         bloqueado BOOLEAN NOT NULL,
                         num_intentos INTEGER(2),
                         ultimo_acceso DATE,
                         created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         updated_at DATETIME,
                         KEY (username),
                         KEY(email),
                         UNIQUE UQ_username (username),
                         UNIQUE UQ_email (email));