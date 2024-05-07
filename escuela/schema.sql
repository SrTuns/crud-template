-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS Escuela;

-- Usar la base de datos creada
USE Escuela;

-- Crear la tabla de profesores
CREATE TABLE IF NOT EXISTS profesores (
    id_profesor INT AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    especialidad VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_profesor)
);

-- Crear la tabla de clases
CREATE TABLE IF NOT EXISTS clases (
    id_clase INT AUTO_INCREMENT,
    nombre_clase VARCHAR(255) NOT NULL,
    id_profesor INT,
    PRIMARY KEY (id_clase),
    FOREIGN KEY (id_profesor) REFERENCES profesores(id_profesor)
);

-- Crear la tabla de estudiantes
CREATE TABLE IF NOT EXISTS estudiantes (
    id_estudiante INT AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    edad INT NOT NULL,
    id_clase INT,
    PRIMARY KEY (id_estudiante),
    FOREIGN KEY (id_clase) REFERENCES clases(id_clase)
);
