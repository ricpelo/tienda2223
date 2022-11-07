DROP TABLE IF EXISTS articulos CASCADE;

CREATE TABLE articulos (
    id          bigserial     PRIMARY KEY,
    codigo      varchar(13)   NOT NULL UNIQUE,
    descripcion varchar(255)  NOT NULL,
    precio      numeric(7, 2) NOT NULL
);

-- Carga inicial de datos de prueba:

INSERT INTO articulos (codigo, descripcion, precio)
    VALUES ('18273892389', 'Yogur piña', 200.50),
           ('83745828273', 'Tigretón', 50.10),
           ('51786128495', 'Disco duro SSD 500 GB', 150.30);
