-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS cifralis;

-- Usar la base de datos recién creada
USE cifralis;

-- Eliminar las tablas si ya existen (para reemplazarlas)
DROP TABLE IF EXISTS passwords;
DROP TABLE IF EXISTS usuarios;

-- Crear tabla de usuarios
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  correo VARCHAR(255) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL
);

-- Crear tabla de contraseñas
CREATE TABLE passwords (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  nombre_sitio VARCHAR(255) NOT NULL,
  url_sitio VARCHAR(255),
  nombre_usuario VARCHAR(255),
  password VARCHAR(255), 
  notas TEXT,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);