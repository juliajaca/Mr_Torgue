DROP DATABASE IF EXISTS mrtorgue;

CREATE DATABASE mrtorgue;
USE mrtorgue;


CREATE TABLE IF NOT EXISTS tipo_documento (
    id_tipo_documento INT(1) UNSIGNED AUTO_INCREMENT NOT NULL,
    tipo_documento VARCHAR(255) NOT NULL,
    PRIMARY KEY  (id_tipo_documento)  
);


--TABLA DE SOCIOS
CREATE TABLE IF NOT EXISTS socio (
    id_socio INT(4) UNSIGNED AUTO_INCREMENT NOT NULL ,
    nombre VARCHAR(255) NOT NULL,
	apellido VARCHAR(255) NOT NULL,
    apellido2 VARCHAR(255) NOT NULL,
    id_tipo_documento INT(1) UNSIGNED NOT NULL,
	numero_documento VARCHAR(255) NOT NULL,
    activo TINYINT(1) DEFAULT 1 NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    fecha_alta TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    fecha_baja TIMESTAMP NULL,
    FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento(id_tipo_documento),
    PRIMARY KEY (id_socio)
);


CREATE TABLE IF NOT EXISTS pago (
    id_pago INT(5) UNSIGNED AUTO_INCREMENT NOT NULL,
    id_socio INT(4) UNSIGNED NOT NULL,
    fecha_pago TIMESTAMP NULL,
    pagado TINYINT(1) DEFAULT 0 NOT NULL,
    fecha_confirmacion_pago TIMESTAMP NULL,
    PRIMARY KEY  (id_pago),
    FOREIGN KEY (id_socio) REFERENCES socio(id_socio)
);

INSERT INTO tipo_documento (tipo_documento)  
VALUES ('DNI'), ('NIE'), ('Carne_biblioteca'), ('Pasaporte');
       


INSERT INTO `socio` (`id_socio`, `nombre`, `apellido`, `apellido2`,`id_tipo_documento`, `numero_documento`, `activo`, `fecha_nacimiento`, `fecha_alta`, `fecha_baja`) VALUES (NULL, 'Clotilde', 'Briones', 'Briones','1', '1234', '1', '1800-09-24', current_timestamp(), NULL);

INSERT INTO `socio` (`id_socio`, `nombre`, `apellido`, `apellido2`,`id_tipo_documento`, `numero_documento`, `activo`, `fecha_nacimiento`, `fecha_alta`, `fecha_baja`) VALUES (NULL, 'Ramon', 'Briones', 'Margalef','1', '1234', '1', '1800-09-24', current_timestamp(), NULL);

INSERT INTO `socio` (`id_socio`, `nombre`, `apellido`, `apellido2`,`id_tipo_documento`, `numero_documento`, `activo`, `fecha_nacimiento`, `fecha_alta`, `fecha_baja`) VALUES (NULL, 'Ana', 'Lazaro', 'Briones','1', '1234', '1', '1800-09-24', current_timestamp(), NULL);

INSERT INTO `pago` (`id_pago`, `id_socio`, `fecha_pago`, `pagado`, `fecha_confirmacion_pago`) VALUES (NULL, '1', '2019-08-09 00:00:00', '0', NULL);