CREATE DATABASE wkbiblioteca DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE wkbiblioteca;

CREATE TABLE usuario(
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nombre_usuario VARCHAR(255) NULL unique,
    clave BLOB NULL,
    PRIMARY KEY (id_usuario)
);

CREATE TABLE Libro(
	id_libro INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NULL,
    nombre_libro VARCHAR(255)  NULL,
    categoria_libro INT NULL,
    PRIMARY KEY (id_libro)
);

CREATE TABLE audio(
	id_audio INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NULL,
    nombre_audio VARCHAR(255) NULL,
    categoria_audio INT NULL,
    PRIMARY KEY (id_audio)
);

CREATE TABLE documento(
	id_documento INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NULL,
    nombre_documento VARCHAR(255) NULL,
    categoria_documento INT NULL,
    PRIMARY KEY (id_documento)
);

CREATE TABLE pdfs(
	id_pdfs INT NOT NULL AUTO_INCREMENT,
	id_usuario INT NULL,
    nombre_pdfs VARCHAR(255) NULL,
    categoria_pdfs INT NULL,
    PRIMARY KEY (id_pdfs)
);

ALTER TABLE libro ADD CONSTRAINT R_1 FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE audio ADD CONSTRAINT R_2 FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE documento ADD CONSTRAINT R_3 FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario);
ALTER TABLE pdfs ADD CONSTRAINT R_4 FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario);

