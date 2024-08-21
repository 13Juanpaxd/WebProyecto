-- Crear la base de datos
CREATE DATABASE NegociosDB;

-- Usar la base de datos
USE NegociosDB;

-- Crear la tabla de usuarios
CREATE TABLE usuarios (
    username VARCHAR(50) PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    pais VARCHAR(100),
    fecha_nacimiento DATE,
    telefono VARCHAR(15),
    sexo ENUM('Masculino', 'Femenino', 'Otro'),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    foto_perfil VARCHAR(255),
    password VARCHAR(255) NOT NULL
);

-- Crear la tabla de mensajes
CREATE TABLE mensajes (
    id_mensaje INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario VARCHAR(50),
    hora_fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    mensaje TEXT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(username)
);

-- Crear la tabla de negocios
CREATE TABLE negocios (
    id_negocio INT AUTO_INCREMENT PRIMARY KEY,
    usuario_dueño VARCHAR(50),
    ruta_foto VARCHAR(255),
    nombre VARCHAR(100) NOT NULL,
    actividad VARCHAR(255),
    fecha_fundacion DATE,
    telefono VARCHAR(15),
    direccion VARCHAR(255),
    pagina_web VARCHAR(255),
    envios BOOLEAN,
    facebook VARCHAR(255),
    instagram VARCHAR(255),
    youtube VARCHAR(255),
    google_maps VARCHAR(255),
    FOREIGN KEY (usuario_dueño) REFERENCES usuarios(username)
);

-- Crear la tabla de productos
CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    cod_negocio INT,
    foto VARCHAR(255),
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    precio DECIMAL(10, 2),
    cant_megusta INT DEFAULT 0,
    FOREIGN KEY (cod_negocio) REFERENCES negocios(id_negocio)
);

-- Crear la tabla de me_gusta
CREATE TABLE me_gusta (
    id_megusta INT AUTO_INCREMENT PRIMARY KEY,
    cod_usuario VARCHAR(50),
    cod_producto INT,
    fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cod_usuario) REFERENCES usuarios(username),
    FOREIGN KEY (cod_producto) REFERENCES productos(id_producto)
);

-- Crear la tabla de recursos
CREATE TABLE recursos (
    id_recurso INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(100),
    contenido TEXT,
    foto_perfil VARCHAR(255),
    fecha_publicacion DATE
);
	