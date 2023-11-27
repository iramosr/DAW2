CREATE TABLE IF NOT EXISTS usuarios
(
    id
    INTEGER
    AUTO_INCREMENT
    PRIMARY
    KEY,
    username
    VARCHAR
(
    75
) NOT NULL,
    password VARCHAR
(
    60
) NOT NULL,
    email VARCHAR
(
    75
) NOT NULL,
    nombre VARCHAR
(
    20
) NOT NULL,
    apellido1 VARCHAR
(
    20
) NOT NULL,
    apellido2 VARCHAR
(
    20
),
    foto VARCHAR
(
    100
),
    activo BOOLEAN NOT NULL,
    bloqueado BOOLEAN NOT NULL,
    num_intentos INTEGER
(
    2
),
    ultimo_acceso DATE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    KEY
(
    username
),
    KEY
(
    email
),
    UNIQUE UQ_username
(
    username
),
    UNIQUE UQ_email
(
    email
)
    );

CREATE TABLE IF NOT EXISTS logs
(
    id
    INT
    AUTO_INCREMENT
    PRIMARY
    KEY,
    log_type
    VARCHAR
(
    50
) NOT NULL,
    log_date DATETIME NOT NULL,
    log_message TEXT NOT NULL
    );

CREATE TABLE IF NOT EXISTS roles
(
    id
    INT
    AUTO_INCREMENT
    PRIMARY
    KEY,
    rol
    VARCHAR
(
    15
) NOT NULL,
    descripcion VARCHAR
(
    25
),
    KEY
(
    rol
),
    UNIQUE UQ_rol
(
    rol
)
    );

CREATE TABLE IF NOT EXISTS usuarios_roles
(
    id
    INT
    AUTO_INCREMENT
    PRIMARY
    KEY,
    usuario_id
    INT
    NOT
    NULL,
    rol_id
    INT
    NOT
    NULL,
    UNIQUE
    UQ_usuario_roles
(
    usuario_id,
    rol_id
)
    );

CREATE TABLE IF NOT EXISTS viajes
(
    id
    INTEGER
    AUTO_INCREMENT
    PRIMARY
    KEY,
    codigo
    VARCHAR
(
    12
) NOT NULL,
    titulo VARCHAR
(
    50
) NOT NULL,
    descripcion TEXT,
    salida DATETIME NOT NULL,
    llegada DATETIME NOT NULL,
    plazas INTEGER,
    precio DOUBLE,
    foto VARCHAR
(
    100
),
    empleado_id INT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME,
    KEY
(
    codigo
)
    );

CREATE TABLE IF NOT EXISTS contrataciones
(
    id
    INTEGER
    AUTO_INCREMENT
    PRIMARY
    KEY,
    pagado
    DOUBLE,
    viaje_id
    INT
    NOT
    NULL,
    cliente_id
    INT
    NOT
    NULL,
    created_at
    DATETIME
    NOT
    NULL
    DEFAULT
    CURRENT_TIMESTAMP,
    updated_at
    DATETIME,
    KEY
(
    viaje_id,
    cliente_id
)
    );



ALTER TABLE viajes
    ADD CONSTRAINT fk_viajes_empleado FOREIGN KEY (empleado_id) REFERENCES usuarios (id) ON DELETE CASCADE;
ALTER TABLE contrataciones
    ADD CONSTRAINT fk_contrataciones_viajes FOREIGN KEY (viaje_id) REFERENCES viajes (id) ON DELETE CASCADE;
ALTER TABLE contrataciones
    ADD CONSTRAINT fk_contrataciones_usuarios FOREIGN KEY (cliente_id) REFERENCES usuarios (id) ON DELETE CASCADE;
ALTER TABLE usuarios_roles
    ADD CONSTRAINT fk_ur_roles FOREIGN KEY (rol_id) REFERENCES roles (id) ON DELETE CASCADE;
ALTER TABLE usuarios_roles
    ADD CONSTRAINT fk_ur_usuarios FOREIGN KEY (usuario_id) REFERENCES usuarios (id) ON DELETE CASCADE;



INSERT INTO roles (rol, descripcion)
VALUES ('ADMIN', 'Administrador');
INSERT INTO roles (rol, descripcion)
VALUES ('EMPLE', 'Empleado');
INSERT INTO roles (rol, descripcion)
VALUES ('CLIENTE', 'Cliente');

#Las contraseñas son "admin" y "emple" respectivamente
INSERT INTO `usuarios` (`username`, `password`, `email`, `nombre`, `apellido1`, `apellido2`, `foto`, `activo`, `bloqueado`, `num_intentos`, `ultimo_acceso`, `created_at`, `updated_at`) VALUES
    ('admin', '$2y$10$gdvtFgaDO7llOdMqenzWWeeHTXWLaM6fLEetBmWuodmwDLmvbgh2.', 'admin@admin.com', 'admin', 'admin', 'admin', NULL, 1, 0, 0, '2023-11-08', '2023-11-08 21:31:41', '2023-11-08 21:31:41'),
    ('emple', '$2y$10$nAMwskrdcrbFZSHFnq2L/eSIoueTZfu0dl2w1Xl9y2jtmN6mQfzgi', 'empleado@e.e', 'empleado', 'emple', '', '6564b78f4607b-emple.png', 1, 0, 0, '2023-11-27', '2023-11-27 15:36:47', '2023-11-27 15:36:47');
;

INSERT INTO usuarios_roles (usuario_id, rol_id)
VALUES ((SELECT id from usuarios where usuarios.username like "admin"),
        (SELECT id from roles where roles.rol like "ADMIN"));
INSERT INTO usuarios_roles (usuario_id, rol_id)
VALUES ((SELECT id from usuarios where usuarios.username like "admin"),
        (SELECT id from roles where roles.rol like "EMPLE"));
INSERT INTO usuarios_roles (usuario_id, rol_id)
VALUES ((SELECT id from usuarios where usuarios.username like "emple"),
        (SELECT id from roles where roles.rol like "EMPLE"));


#Ejemplos de viajes

INSERT INTO `viajes` (`codigo`, `titulo`, `descripcion`, `salida`, `llegada`, `plazas`, `precio`, `foto`, `empleado_id`, `created_at`, `updated_at`) VALUES
   ('123', 'Viaje a asfafe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam molestie lorem vel augue commodo suscipit. Ut est urna, gravida et dui eu, mollis commodo odio. Nulla pretium egestas efficitur. Aenean tincidunt in elit id commodo. Nunc semper tortor non arcu venenatis, vitae tristique magna consequat. Duis et nibh odio. Curabitur sit amet massa sit amet diam placerat pretium. Phasellus pretium dapibus ligula a posuere. Vivamus justo ante, dignissim ut fringilla ac, vehicula ac nunc. Donec eros felis, cursus sed dictum pulvinar, tempor ut felis. In eget tristique nisi. Praesent feugiat eget diam ac ultricies. In laoreet ipsum sem. Donec ullamcorper porttitor arcu fermentum faucibus.\r\n\r\nMaecenas dapibus nunc auctor justo euismod faucibus. Mauris et imperdiet orci. Morbi eget nibh vel ligula accumsan suscipit sit amet sit amet lectus. Suspendisse mattis, augue molestie blandit laoreet, nunc est dignissim est, et lobortis ex augue vitae augue. Maecenas a justo vestibulum, efficitur felis at, fermentum eros. Praesent dui ante, aliquam eu nunc in, tempus tincidunt justo. Aenean at lectus euismod, auctor turpis eu, auctor nunc.\r\n\r\nCurabitur efficitur eget leo non tristique. Maecenas facilisis magna est, at faucibus massa posuere et. Maecenas faucibus eleifend blandit. Maecenas vel quam magna. Curabitur luctus nulla sed commodo pellentesque. Vivamus sollicitudin varius nibh. Integer lorem elit, semper vitae dui in, tempor ultricies magna. Sed ullamcorper massa et pellentesque convallis. Nam dignissim nibh elit, vitae blandit orci egestas sed. Integer fringilla quam in ligula efficitur ultricies. Aenean placerat semper magna nec pretium. Suspendisse vitae suscipit risus, non tincidunt purus. Nam volutpat ultrices dui, nec vulputate tellus convallis et. In lacinia risus at dui bibendum scelerisque. Integer sollicitudin a massa et vestibulum. Suspendisse justo ante, porttitor non dignissim sit amet, faucibus nec tellus.\r\n\r\nQuisque efficitur tempor interdum. Aenean at augue tortor. Vestibulum fermentum libero pulvinar rhoncus bibendum. Quisque sollicitudin nisi in ex sagittis bibendum. Sed eleifend, lacus vel tincidunt vulputate, urna sem imperdiet leo, ac facilisis nisl leo eu ipsum. Morbi iaculis id libero id auctor. Aenean vitae luctus nisl, sodales interdum neque. Nunc eget fermentum nisi. Morbi a felis sed diam iaculis dignissim. Curabitur bibendum ligula quis ipsum accumsan hendrerit. Nam et maximus nisl. Etiam cursus pretium turpis, vel auctor dolor. Aenean finibus rutrum nibh in tempus. Praesent mauris enim, malesuada non maximus non, venenatis eu libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nInteger scelerisque erat eu dolor ultricies, vitae facilisis ante molestie. Phasellus a libero volutpat tellus tempor consequat. Donec vitae molestie lacus. Ut magna ante, porttitor ut metus condimentum, dignissim tincidunt purus. Proin ac nisi eu nulla lobortis sagittis. Curabitur lorem diam, pretium nec imperdiet vel, euismod a metus. Aliquam sed elementum ligula. Donec a risus egestas, gravida odio eu, sagittis nunc. Nam quis orci suscipit, placerat turpis ac, viverra ex. Integer fermentum accumsan turpis. Donec luctus tristique efficitur. Nam laoreet dignissim eros, rutrum feugiat lacus venenatis a. Aliquam vel metus sagittis urna commodo aliquet non nec erat. Quisque bibendum dolor et orci varius vulputate.', '2023-12-01 09:00:00', '2023-12-01 21:00:00', 123, 1234, '6564b9045876b-123.jpg', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
   ('321', '4321', 'ewwrqrqrw', '2023-11-29 20:50:00', '2023-12-02 00:00:00', 122, 131, '6563cbdd0f3e5-321.jpg', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
   ('53214', '532415', '56y4356y', '2023-11-28 13:30:00', '2023-11-29 13:20:00', 12, 123, '6563cc1bc4213-53214.jpg', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
   ('53634', '564u3563', '3756234tew', '2023-12-20 10:00:00', '2023-12-21 11:45:00', 412435, 142, '6563cda605b16-53634.jpg', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
   ('52463153', 'aerstdyd', 'dtyuyfuy', '2023-11-29 00:15:00', '2023-11-30 04:00:00', 532, 325, '6563ce8f6d769-52463153.jpg', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
   ('ghf', '253', 'tew5312ew', '2024-01-20 00:00:00', '2024-01-22 09:00:00', 442, 123, '6563ceb845c04-ghf.jpg', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)
;