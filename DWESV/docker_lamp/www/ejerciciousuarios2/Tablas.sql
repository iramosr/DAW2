CREATE TABLE IF NOT EXISTS usuarios(
                         id INTEGER AUTO_INCREMENT PRIMARY KEY,
                         username VARCHAR(75) NOT NULL,
                         password VARCHAR(60),
                         email VARCHAR(75) NOT NULL,
                         nombre VARCHAR(20) NOT NULL,
                         apellido1 VARCHAR(20) NOT NULL,
                         apellido2 VARCHAR(20),
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
                         UNIQUE UQ_email (email)
);

CREATE TABLE IF NOT EXISTS logs (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      log_type VARCHAR(50) NOT NULL,
                      log_date DATETIME NOT NULL,
                      log_message TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS roles (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                      rol VARCHAR(15) NOT NULL,
                      descripcion VARCHAR(25),
                      KEY (rol),
                      UNIQUE UQ_rol (rol)
);

CREATE TABLE IF NOT EXISTS usuarios_roles (
                               id INT AUTO_INCREMENT PRIMARY KEY,
                               usuario_id INT NOT NULL,
                               rol_id INT NOT NULL,
                               UNIQUE UQ_usuario_roles (usuario_id, rol_id)
);

ALTER TABLE usuarios_roles ADD CONSTRAINT fk_ur_roles FOREIGN KEY (rol_id) REFERENCES roles(id);
ALTER TABLE usuarios_roles ADD CONSTRAINT fk_ur_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
INSERT INTO roles (rol, descripcion) VALUES ('ADMIN', 'Administrador');
INSERT INTO roles (rol, descripcion) VALUES ('EMPLE', 'Empleado');
INSERT INTO roles (rol, descripcion) VALUES ('CLIENTE', 'Cliente');

#La contraseña es "admin"
INSERT INTO `usuarios` (`username`, `password`, `email`, `nombre`, `apellido1`, `apellido2`, `foto`, `activo`, `bloqueado`, `num_intentos`, `ultimo_acceso`, `created_at`, `updated_at`) VALUES
    ('admin', '$2y$10$gdvtFgaDO7llOdMqenzWWeeHTXWLaM6fLEetBmWuodmwDLmvbgh2.', 'admin@admin.com', 'admin', 'admin', 'admin', NULL, 1, 0, 0, '2023-11-08', '2023-11-08 21:31:41', '2023-11-08 21:31:41');

INSERT INTO usuarios_roles (usuario_id, rol_id) VALUES ((SELECT id from usuarios where usuarios.username like "admin"),
                                                        (SELECT id from roles where roles.rol like "ADMIN"));