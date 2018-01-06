CREATE SCHEMA IF NOT EXISTS `Biblioteca` ;

CREATE TABLE IF NOT EXISTS `Biblioteca`.`TipoRecursos` (
  `idTipoRecursos` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(400) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`idTipoRecursos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `Biblioteca`.`Recursos` (
  `idRecursos` INT(11) NOT NULL AUTO_INCREMENT,
  `idTipoRecursos` INT(11) NOT NULL,
  `descripcion` VARCHAR(400) CHARACTER SET 'utf8' NOT NULL,
  `titulo` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `imagen` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `adjunto` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`idRecursos`),
  INDEX `r_1` (`idTipoRecursos` ASC),
  CONSTRAINT `r_1`
    FOREIGN KEY (`idTipoRecursos`)
    REFERENCES `Biblioteca`.`TipoRecursos` (`idTipoRecursos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `Biblioteca`.`Usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `documentoIdentificacion` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `nombre` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `genero` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `fechaNacimiento` DATE NOT NULL,
  `carrera` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  `nivel` VARCHAR(50) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE IF NOT EXISTS `Biblioteca`.`Cuenta` (
  `idCuenta` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NOT NULL,
  `contraseña` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`idCuenta`),
  INDEX `r_4` (`idUsuario` ASC),
  CONSTRAINT `r_4`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `Biblioteca`.`Usuario` (`idUsuario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `Biblioteca`.`SolicitudRecursos` (
  `idSolicitudRecursos` INT(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(11) NOT NULL,
  `idRecursos` INT(11) NOT NULL,
  `fechaSolicitud` DATE NOT NULL,
  `fechaConcesion` DATE NOT NULL,
  `fechaEntrega` DATE NOT NULL,
  PRIMARY KEY (`idSolicitudRecursos`),
  INDEX `r_2` (`idRecursos` ASC),
  INDEX `r_3` (`idUsuario` ASC),
  CONSTRAINT `r_3`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `Biblioteca`.`Usuario` (`idUsuario`),
  CONSTRAINT `r_2`
    FOREIGN KEY (`idRecursos`)
    REFERENCES `Biblioteca`.`Recursos` (`idRecursos`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


