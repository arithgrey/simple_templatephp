SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema enidserv_eniddbbbb3
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `enidserv_eniddbbbb3` ;
CREATE SCHEMA IF NOT EXISTS `enidserv_eniddbbbb3` DEFAULT CHARACTER SET utf8 ;
USE `enidserv_eniddbbbb3` ;

-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`countries`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`countries` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`countries` (
  `idCountry` INT(5) NOT NULL AUTO_INCREMENT,
  `countryCode` CHAR(2) NOT NULL,
  `countryName` VARCHAR(45) NOT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idCountry`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plan` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plan` (
  `idplan` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `Especificacionesplan` TEXT NULL,
  `numerousuarios` INT NULL,
  PRIMARY KEY (`idplan`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`empresa` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT,
  `nombreempresa` VARCHAR(200) NOT NULL,
  `idCountry` INT(5) NOT NULL DEFAULT 1,
  `fecha_registro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(45) NOT NULL DEFAULT '1',
  `idplan` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idempresa`),
  INDEX `fk_empresa_countries1_idx` (`idCountry` ASC),
  INDEX `fk_empresa_plan1_idx` (`idplan` ASC),
  CONSTRAINT `fk_empresa_countries1`
    FOREIGN KEY (`idCountry`)
    REFERENCES `enidserv_eniddbbbb3`.`countries` (`idCountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_plan1`
    FOREIGN KEY (`idplan`)
    REFERENCES `enidserv_eniddbbbb3`.`plan` (`idplan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`usuario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `email` VARCHAR(75) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idempresa` INT NOT NULL,
  `descripcion` TEXT NULL,
  `puesto` VARCHAR(200) NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_empresa1_idx` (`idempresa` ASC),
  CONSTRAINT `fk_usuario_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`perfil` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`perfil` (
  `idperfil` INT NOT NULL AUTO_INCREMENT,
  `nombreperfil` VARCHAR(45) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` TEXT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idperfil`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`recurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`recurso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`recurso` (
  `idrecurso` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcionrecurso` TEXT NULL,
  `urlpaginaweb` VARCHAR(500) NOT NULL,
  `iconorecurso` VARCHAR(500) NULL,
  PRIMARY KEY (`idrecurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`usuario_perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`usuario_perfil` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`usuario_perfil` (
  `idusuario` INT NOT NULL,
  `idperfil` INT NOT NULL,
  INDEX `fk_usuario_has_perfil_perfil1_idx` (`idperfil` ASC),
  INDEX `fk_usuario_has_perfil_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_usuario_has_perfil_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_perfil_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`perfil_recurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`perfil_recurso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`perfil_recurso` (
  `idperfil` INT NOT NULL,
  `idrecurso` INT NOT NULL,
  INDEX `fk_perfil_has_recurso_recurso1_idx` (`idrecurso` ASC),
  INDEX `fk_perfil_has_recurso_perfil1_idx` (`idperfil` ASC),
  CONSTRAINT `fk_perfil_has_recurso_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_recurso_recurso1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `enidserv_eniddbbbb3`.`recurso` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`usuario_roll`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`usuario_roll` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`usuario_roll` (
  `idusuario` INT NOT NULL,
  `idrecurso` INT NOT NULL,
  INDEX `fk_usuario_has_recurso_recurso1_idx` (`idrecurso` ASC),
  INDEX `fk_usuario_has_recurso_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_usuario_has_recurso_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_recurso_recurso1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `enidserv_eniddbbbb3`.`recurso` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`permiso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`permiso` (
  `idpermiso` INT NOT NULL AUTO_INCREMENT,
  `nombrepermiso` VARCHAR(250) NOT NULL,
  `descripcionpermiso` TEXT NULL,
  `idrecurso` INT NOT NULL,
  `urlpaginaweb` VARCHAR(500) NULL,
  `iconpermiso` VARCHAR(500) NULL,
  INDEX `fk_permiso_recurso1_idx` (`idrecurso` ASC),
  PRIMARY KEY (`idpermiso`),
  CONSTRAINT `fk_permiso_recurso1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `enidserv_eniddbbbb3`.`recurso` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`perfil_permiso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`perfil_permiso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`perfil_permiso` (
  `idperfil` INT NOT NULL,
  `idpermiso` INT NOT NULL,
  INDEX `fk_perfil_has_permiso_permiso1_idx` (`idpermiso` ASC),
  INDEX `fk_perfil_has_permiso_perfil1_idx` (`idperfil` ASC),
  CONSTRAINT `fk_perfil_has_permiso_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_has_permiso_permiso1`
    FOREIGN KEY (`idpermiso`)
    REFERENCES `enidserv_eniddbbbb3`.`permiso` (`idpermiso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`pregunta_respuesta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`pregunta_respuesta` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`pregunta_respuesta` (
  `idpregunta` INT NOT NULL,
  `idrespuesta` INT NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`registrocliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`registrocliente` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`registrocliente` (
  `idusuario` INT NOT NULL,
  `idclienteorg` INT NOT NULL,
  INDEX `fk_usuario_has_clienteorg_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_usuario_has_clienteorg_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plan_perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plan_perfil` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plan_perfil` (
  `idplan` INT NOT NULL,
  `idperfil` INT NOT NULL,
  INDEX `fk_plan_has_perfil_perfil1_idx` (`idperfil` ASC),
  INDEX `fk_plan_has_perfil_plan1_idx` (`idplan` ASC),
  CONSTRAINT `fk_plan_has_perfil_plan1`
    FOREIGN KEY (`idplan`)
    REFERENCES `enidserv_eniddbbbb3`.`plan` (`idplan`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plan_has_perfil_perfil1`
    FOREIGN KEY (`idperfil`)
    REFERENCES `enidserv_eniddbbbb3`.`perfil` (`idperfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`newsletters`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`newsletters` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`newsletters` (
  `idnewsletters` INT NOT NULL AUTO_INCREMENT,
  `mail` VARCHAR(50) NOT NULL,
  `seccion` VARCHAR(70) NOT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '0',
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`idnewsletters`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`reportesystema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`reportesystema` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`reportesystema` (
  `idreportesystema` INT NOT NULL AUTO_INCREMENT,
  `reporte` VARCHAR(70) NOT NULL,
  `descripcionreporte` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tiporeporte` VARCHAR(70) NOT NULL,
  `status_repo` ENUM('Atendido','Rechazado','Pendiente','En proceso') NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`idreportesystema`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`ci_sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`ci_sessions` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`ci_sessions` (
  `session_id` VARCHAR(40) NOT NULL DEFAULT '0',
  `ip_address` VARCHAR(45) NOT NULL DEFAULT '0',
  `user_agent` VARCHAR(120) NOT NULL,
  `last_activity` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` TEXT NOT NULL,
  PRIMARY KEY (`session_id`),
  INDEX `last_activity_idx` (`last_activity` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`comentario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`comentario` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `comentario` TEXT NULL,
  `status` VARCHAR(1) NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` VARCHAR(150) NULL,
  PRIMARY KEY (`idcomentario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento` (
  `idevento` INT NOT NULL AUTO_INCREMENT,
  `nombre_evento` VARCHAR(400) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edicion` VARCHAR(100) NULL,
  `idempresa` INT NOT NULL,
  `idusuario` INT NOT NULL,
  `fecha_inicio` VARCHAR(10) NULL,
  `fecha_termino` VARCHAR(10) NULL,
  `descripcion_evento` TEXT NULL,
  `portada` VARCHAR(300) NULL,
  `ubicacion` TEXT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '0',
  `url_social` TEXT NULL,
  `url_social_youtube` TEXT NULL,
  `politicas` TEXT NULL,
  `restricciones` TEXT NULL,
  `permitido` TEXT NULL,
  `breve_descripcion` VARCHAR(200) NULL,
  `eslogan` VARCHAR(80) NULL,
  PRIMARY KEY (`idevento`),
  INDEX `fk_evento_empresa1_idx` (`idempresa` ASC),
  INDEX `fk_evento_usuario1_idx` (`idusuario` ASC),
  CONSTRAINT `fk_evento_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`escenario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`escenario` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`escenario` (
  `idescenario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NULL,
  `descripcion` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idevento` INT NULL,
  `tipoescenario` VARCHAR(200) NOT NULL DEFAULT 'General',
  `portada_escenario` VARCHAR(45) NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `fecha_presentacion_inicio` VARCHAR(20) NULL,
  `fecha_presentacion_termino` VARCHAR(20) NULL,
  PRIMARY KEY (`idescenario`),
  INDEX `fk_esenario_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_esenario_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`artista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`artista` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`artista` (
  `idartista` INT NOT NULL AUTO_INCREMENT,
  `nombre_artista` VARCHAR(250) NOT NULL,
  `idsound` VARCHAR(5) NULL,
  `genre` VARCHAR(50) NULL,
  `uri` TEXT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idartista`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`escenario_artista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`escenario_artista` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`escenario_artista` (
  `idescenario` INT NOT NULL,
  `idartista` INT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hora_inicio` VARCHAR(20) NULL,
  `hora_termino` VARCHAR(20) NULL,
  INDEX `fk_escenario_has_artista_artista1_idx` (`idartista` ASC),
  INDEX `fk_escenario_has_artista_escenario1_idx` (`idescenario` ASC),
  CONSTRAINT `fk_escenario_has_artista_escenario1`
    FOREIGN KEY (`idescenario`)
    REFERENCES `enidserv_eniddbbbb3`.`escenario` (`idescenario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_escenario_has_artista_artista1`
    FOREIGN KEY (`idartista`)
    REFERENCES `enidserv_eniddbbbb3`.`artista` (`idartista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`tipo_acceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`tipo_acceso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`tipo_acceso` (
  `idtipo_acceso` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `status` VARCHAR(1) NULL,
  PRIMARY KEY (`idtipo_acceso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`acceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`acceso` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`acceso` (
  `idacceso` INT NOT NULL AUTO_INCREMENT,
  `descripcion` TEXT NULL,
  `precio` VARCHAR(45) NULL,
  `inicio_acceso` VARCHAR(20) NULL,
  `termino_acceso` VARCHAR(20) NULL,
  `status` VARCHAR(1) NULL,
  `idevento` INT NOT NULL,
  `idtipo_acceso` INT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idacceso`),
  INDEX `fk_acceso_evento1_idx` (`idevento` ASC),
  INDEX `fk_acceso_tipo_acceso1_idx` (`idtipo_acceso` ASC),
  CONSTRAINT `fk_acceso_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_acceso_tipo_acceso1`
    FOREIGN KEY (`idtipo_acceso`)
    REFERENCES `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`servicio` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`servicio` (
  `idservicio` INT NOT NULL AUTO_INCREMENT,
  `servicio` VARCHAR(200) NOT NULL,
  `status` VARCHAR(1) NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`idservicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_servicio` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_servicio` (
  `idevento` INT NOT NULL,
  `idservicio` INT NOT NULL,
  INDEX `fk_evento_has_servicio_servicio1_idx` (`idservicio` ASC),
  INDEX `fk_evento_has_servicio_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_servicio_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_servicio_servicio1`
    FOREIGN KEY (`idservicio`)
    REFERENCES `enidserv_eniddbbbb3`.`servicio` (`idservicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`objetopermitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`objetopermitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`objetopermitido` (
  `idobjetopermitido` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `descripcion` TEXT NULL,
  `status` VARCHAR(1) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idobjetopermitido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_objetopermitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_objetopermitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_objetopermitido` (
  `idevento` INT NOT NULL,
  `idobjetopermitido` INT NOT NULL,
  INDEX `fk_evento_has_objetopermitido_objetopermitido1_idx` (`idobjetopermitido` ASC),
  INDEX `fk_evento_has_objetopermitido_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_objetopermitido_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_objetopermitido_objetopermitido1`
    FOREIGN KEY (`idobjetopermitido`)
    REFERENCES `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`genero_musical`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`genero_musical` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`genero_musical` (
  `idgenero_musical` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(250) NOT NULL,
  `status` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idgenero_musical`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_genero_musical`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_genero_musical` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_genero_musical` (
  `idevento` INT NOT NULL,
  `idgenero_musical` INT NOT NULL,
  INDEX `fk_evento_has_genero_musical_genero_musical1_idx` (`idgenero_musical` ASC),
  INDEX `fk_evento_has_genero_musical_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_genero_musical_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_genero_musical_genero_musical1`
    FOREIGN KEY (`idgenero_musical`)
    REFERENCES `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`tematica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`tematica` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`tematica` (
  `idtematica` INT NOT NULL AUTO_INCREMENT,
  `tematica_evento` VARCHAR(200) NOT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `descripcion` TEXT NULL,
  PRIMARY KEY (`idtematica`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_tematica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_tematica` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_tematica` (
  `idevento` INT NOT NULL,
  `idtematica` INT NOT NULL,
  INDEX `fk_evento_has_tematica_tematica1_idx` (`idtematica` ASC),
  INDEX `fk_evento_has_tematica_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_tematica_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_tematica_tematica1`
    FOREIGN KEY (`idtematica`)
    REFERENCES `enidserv_eniddbbbb3`.`tematica` (`idtematica`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`proveedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`proveedor` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`proveedor` (
  `idproveedor` INT NOT NULL AUTO_INCREMENT,
  `empresa_contacto` VARCHAR(200) NULL,
  `persona_contacto` VARCHAR(200) NOT NULL,
  `tel_contacto` VARCHAR(10) NULL,
  `movil_contact` VARCHAR(15) NULL,
  `email_contact` VARCHAR(45) NULL,
  `nota_contact` TEXT NULL,
  `idempresa` INT NOT NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_proveedor` VARCHAR(17) NOT NULL,
  PRIMARY KEY (`idproveedor`),
  INDEX `fk_proveedor_empresa1_idx` (`idempresa` ASC),
  CONSTRAINT `fk_proveedor_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`log_evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`log_evento` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`log_evento` (
  `idlog_evento` INT NOT NULL AUTO_INCREMENT,
  `actividad` VARCHAR(55) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idevento` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  PRIMARY KEY (`idlog_evento`),
  INDEX `fk_log_evento_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_log_evento_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`tipo_plantilla`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`tipo_plantilla` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`tipo_plantilla` (
  `idtipo_plantilla` INT NOT NULL AUTO_INCREMENT,
  `tipo_plantilla` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NULL,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtipo_plantilla`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plantilla`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plantilla` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plantilla` (
  `idplantilla` INT NOT NULL AUTO_INCREMENT,
  `nombre_platilla` VARCHAR(75) NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `idusuario` INT NOT NULL,
  `idtipo_plantilla` INT NOT NULL,
  PRIMARY KEY (`idplantilla`),
  INDEX `fk_plantilla_usuario1_idx` (`idusuario` ASC),
  INDEX `fk_plantilla_tipo_plantilla1_idx` (`idtipo_plantilla` ASC),
  CONSTRAINT `fk_plantilla_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `enidserv_eniddbbbb3`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plantilla_tipo_plantilla1`
    FOREIGN KEY (`idtipo_plantilla`)
    REFERENCES `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`contenido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`contenido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`contenido` (
  `idcontenido` INT NOT NULL AUTO_INCREMENT,
  `nombre_contenido` VARCHAR(70) NOT NULL,
  `descripcion_contenido` TEXT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(1) NOT NULL DEFAULT '1',
  `type` VARCHAR(1) NOT NULL,
  PRIMARY KEY (`idcontenido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`permitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`permitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`permitido` (
  `idpermitido` INT NOT NULL,
  `nombre_permitido` VARCHAR(45) NOT NULL,
  `descripcion_permitido` TEXT NOT NULL,
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`idpermitido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`empresa_objetopermitido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`empresa_objetopermitido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`empresa_objetopermitido` (
  `idempresa` INT NOT NULL,
  `idobjetopermitido` INT NOT NULL,
  INDEX `fk_empresa_has_objetopermitido_objetopermitido1_idx` (`idobjetopermitido` ASC),
  INDEX `fk_empresa_has_objetopermitido_empresa1_idx` (`idempresa` ASC),
  CONSTRAINT `fk_empresa_has_objetopermitido_empresa1`
    FOREIGN KEY (`idempresa`)
    REFERENCES `enidserv_eniddbbbb3`.`empresa` (`idempresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresa_has_objetopermitido_objetopermitido1`
    FOREIGN KEY (`idobjetopermitido`)
    REFERENCES `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`plantilla_contenido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`plantilla_contenido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`plantilla_contenido` (
  `idplantilla` INT NOT NULL,
  `idcontenido` INT NOT NULL,
  INDEX `fk_plantilla_has_contenido_contenido1_idx` (`idcontenido` ASC),
  INDEX `fk_plantilla_has_contenido_plantilla1_idx` (`idplantilla` ASC),
  CONSTRAINT `fk_plantilla_has_contenido_plantilla1`
    FOREIGN KEY (`idplantilla`)
    REFERENCES `enidserv_eniddbbbb3`.`plantilla` (`idplantilla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plantilla_has_contenido_contenido1`
    FOREIGN KEY (`idcontenido`)
    REFERENCES `enidserv_eniddbbbb3`.`contenido` (`idcontenido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `enidserv_eniddbbbb3`.`evento_contenido`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `enidserv_eniddbbbb3`.`evento_contenido` ;

CREATE TABLE IF NOT EXISTS `enidserv_eniddbbbb3`.`evento_contenido` (
  `idevento` INT NOT NULL,
  `idcontenido` INT NOT NULL,
  INDEX `fk_evento_has_contenido_contenido1_idx` (`idcontenido` ASC),
  INDEX `fk_evento_has_contenido_evento1_idx` (`idevento` ASC),
  CONSTRAINT `fk_evento_has_contenido_evento1`
    FOREIGN KEY (`idevento`)
    REFERENCES `enidserv_eniddbbbb3`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_contenido_contenido1`
    FOREIGN KEY (`idcontenido`)
    REFERENCES `enidserv_eniddbbbb3`.`contenido` (`idcontenido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `enidserv_eniddbbbb3` ;

-- -----------------------------------------------------
-- procedure delere_all_artistas
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`delere_all_artistas`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE delere_all_artistas ()

BEGIN
  DELETE  FROM artista;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insertartista
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`insertartista`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure insertartista(in  seg varchar(200) )
begin
insert into plan(nombre) values(seg);
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure insertartasasasista
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`insertartasasasista`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure insertartasasasista(in  seag varchar(200) )
begin
insert into plan(nombre) values(seag);
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_evento_all_data
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`delete_evento_all_data`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure delete_evento_all_data(in id_ev int , id_u int) 
begin
delete from  log_evento where idevento=id_ev;
delete from escenario 
where
    idevento = id_ev;
delete from acceso 
where
    idevento = id_ev;
delete from evento_servicio 
where
    idevento = id_ev;
delete from evento_objetopermitido 
where
    idevento = id_ev;
delete from evento_genero_musical 
where
    idevento = id_ev;
delete from evento_tematica 
where
    idevento = id_ev;
delete from evento 
where
    idevento = id_ev;
end;
 $$

DELIMITER ;

-- -----------------------------------------------------
-- procedure delete_escenacio_evento
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`delete_escenacio_evento`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure delete_escenacio_evento (in id_escenariodb int )
begin
DELETE FROM escenario_artista   WHERE idescenario = id_escenariodb;
DELETE FROM escenario 
WHERE
    idescenario = id_escenariodb;
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure all_in_event_obj_inter
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`all_in_event_obj_inter`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure all_in_event_obj_inter(in id_ev int )
begin
INSERT INTO evento_objetopermitido SELECT  id_ev , idobjetopermitido FROM objetopermitido;
end
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_all_obj_in_event
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`update_all_obj_in_event`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure update_all_obj_in_event(id_event int , idemp int )
BEGIN
IF NOT EXISTS(SELECT  * FROM  evento_objetopermitido where idevento= id_event limit 1) THEN
  INSERT INTO evento_objetopermitido 
  SELECT  id_event , o.idobjetopermitido FROM objetopermitido  as o  
  inner join empresa_objetopermitido as eo 
  on o.idobjetopermitido = eo.idobjetopermitido and eo.idempresa = idemp; 
ELSE
  DELETE FROM evento_objetopermitido WHERE idevento = id_event;
END IF;
END
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure update_all_servicios_in_event
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`update_all_servicios_in_event`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
CREATE PROCEDURE  update_all_servicios_in_event(id_event INT)
BEGIN 
IF NOT EXISTS(SELECT * FROM evento_servicio WHERE idevento= id_event) THEN 
  INSERT INTO evento_servicio (SELECT id_event , idservicio FROM servicio );
ELSE 
  DELETE FROM evento_servicio WHERE idevento = id_event;
END IF;
END
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure onupdate
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`onupdate`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure onupdate( stado_evento char(1) , id_evento int , id_user int )
begin 
UPDATE  evento SET status=stado_evento WHERE idevento = id_evento;  
INSERT INTO log_evento (actividad , idevento , id_usuario ) VALUES ("Cambió el stado del evento" , id_evento , id_user);
end;
$$

DELIMITER ;

-- -----------------------------------------------------
-- procedure contenidos_por_usuario_tipo
-- -----------------------------------------------------

USE `enidserv_eniddbbbb3`;
DROP procedure IF EXISTS `enidserv_eniddbbbb3`.`contenidos_por_usuario_tipo`;

DELIMITER $$
USE `enidserv_eniddbbbb3`$$
create procedure contenidos_por_usuario_tipo(id_user int , id_type int )
begin 
SELECT  * FROM  contenido AS  c 
INNER JOIN  plantilla AS p
ON  c.idplantilla  =  p.idplantilla 
WHERE  p.idusuario = id_user  AND  p.idtipo_plantilla =  id_type
ORDER BY  c.fecha_registro DESC;
end;$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`countries`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`countries` (`idCountry`, `countryCode`, `countryName`, `status`) VALUES (1, 'ND', 'Aún sin definir', '\'1\'');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`plan`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`plan` (`idplan`, `nombre`, `Especificacionesplan`, `numerousuarios`) VALUES (1, 'standar', 'Uso estandar, su precio puede cambiar porteriormente', 4);
INSERT INTO `enidserv_eniddbbbb3`.`plan` (`idplan`, `nombre`, `Especificacionesplan`, `numerousuarios`) VALUES (2, 'Goldenroot', 'Todo', 10000);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`empresa`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`empresa` (`idempresa`, `nombreempresa`, `idCountry`, `fecha_registro`, `status`, `idplan`) VALUES (1, 'Enid service', 1, NULL, '\'1\'', 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`usuario` (`idusuario`, `nombre`, `email`, `password`, `fecha_registro`, `idempresa`, `descripcion`, `puesto`, `status`) VALUES (1, 'arithgrey', 'arithgrey@gmail.com', '870058cbcebe244bce513be539acd6905bca8d99', NULL, 1, NULL, NULL, '\'1\'');
INSERT INTO `enidserv_eniddbbbb3`.`usuario` (`idusuario`, `nombre`, `email`, `password`, `fecha_registro`, `idempresa`, `descripcion`, `puesto`, `status`) VALUES (2, 'estratega test', 'estrategatest@gmail.com', '870058cbcebe244bce513be539acd6905bca8d99', NULL, 1, NULL, NULL, '\'1\'');
INSERT INTO `enidserv_eniddbbbb3`.`usuario` (`idusuario`, `nombre`, `email`, `password`, `fecha_registro`, `idempresa`, `descripcion`, `puesto`, `status`) VALUES (3, 'administradortest', 'administradortest@gmail.com', '870058cbcebe244bce513be539acd6905bca8d99', '', 1, NULL, NULL, '\'1\'');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (3, 'Super administrador', NULL, 'Usuario tiene derecho a todas las funciones del sistema', '\'1\'');
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (4, 'Administrador de cuenta', NULL, 'Administrador de la cuenta en la empresa ', '\'1\'');
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (5, 'Estratega digital', NULL, 'Persona que realiza la estrategia de los eventos musicales ', '\'1\'');
INSERT INTO `enidserv_eniddbbbb3`.`perfil` (`idperfil`, `nombreperfil`, `fecha_registro`, `descripcion`, `status`) VALUES (6, 'Director de la empresa', NULL, 'Director de la empresa', '\'1\'');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`recurso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (1, 'Miembros de la cuenta', NULL, 'Matriz que tiene que ver con los Usuarios', 'index.php/recursocontroller/usuarios', 'fa fa-users');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (5, 'Módulos', NULL, 'Cambios en los perfiles del sistema', 'index.php/recursocontroller/perfiles', 'fa fa-cogs');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (6, 'Log', NULL, 'Modulo para ver los reportes por parte de los usuarios', 'index.php/reportecontrolador/listarReportes', 'fa fa-tasks');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (7, 'Tendencias', NULL, 'Como director, quiero entender las tendencias del mercado, tomando en cuenta artistas y géneros musicales, con la finalidad de cuantificar la eficiencia y eficacia de las acciones de mi organización.', 'index.php/tendencias', 'fa fa-line-chart');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (8, 'General', NULL, 'Como director, quiero  visualizar histogramas, estadísticas y gráficos resultantes de los diversos análisis efectuados por el sistema, con la finalidad de evaluar las fortalezas, oportunidades, riesgos y debilidades de mi negocio. ', 'index.php/general', 'fa fa-angle-double-right');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (9, 'seguimiento', NULL, 'Como estratega digital, quiero saber que personas se interesan por la marca con la finalidad de  dar seguimiento a los clientes y tener nuevas alternativas para ampliar el negocio. ', 'index.php/seguimiento', 'fa fa-heartbeat');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (10, 'Eventos', NULL, 'Como estratega digital, quiero poder  filtrar la promoción de eventos los cuales integren funcionalidades de las plataformas Youtube y soundcloud, con la finalidad de potencializar  la imagen de los eventos y las experiencias se hagan palpables  previos a cada  suceso. ', 'index.php/inicio/eventos', 'fa fa-headphones');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (11, 'timelineevents', NULL, 'Como público que frecuenta al sistema, quiero poder consultar los diferentes eventos de las organizaciones, con filtros que incluyan zonas geográficas, géneros y artistas, con la finalidad de   considerar mi asistencia a ellos. ', 'index.php/timelineevents', 'fa fa-calendar');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (12, 'Disfruta la experiencia', '', 'Como público que frecuenta al sistema, quiero poder requerir a las organizaciones la  presentación de sus eventos en mi país, con la finalidad de disfrutar la experiencia que se vive en otras naciones.\n', 'index.php/disfrutalaexperiencia', 'fa fa-fighter-jet');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (13, 'Directorio', NULL, NULL, 'index.php/directorio', 'fa fa-book');
INSERT INTO `enidserv_eniddbbbb3`.`recurso` (`idrecurso`, `nombre`, `fecha_registro`, `descripcionrecurso`, `urlpaginaweb`, `iconorecurso`) VALUES (14, 'Plantillas', NULL, 'Plantillas comunes en el sistema y su uso', 'index.php/template', 'fa fa-file-text-o');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`usuario_perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`usuario_perfil` (`idusuario`, `idperfil`) VALUES (1, 3);
INSERT INTO `enidserv_eniddbbbb3`.`usuario_perfil` (`idusuario`, `idperfil`) VALUES (2, 5);
INSERT INTO `enidserv_eniddbbbb3`.`usuario_perfil` (`idusuario`, `idperfil`) VALUES (3, 4);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`perfil_recurso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 5);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 6);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 7);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 8);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 9);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 11);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (5, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (5, 14);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (4, 14);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_recurso` (`idperfil`, `idrecurso`) VALUES (3, 14);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`permiso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (1, 'Invitar', '', 1, 'index.php/recursocontroller/usuarios', 'fa fa-user-plus');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (8, 'Configuración', NULL, 5, 'index.php/recursocontroller/perfiles', 'fa fa-wrench');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (9, 'general', NULL, 6, 'index.php/reportecontrolador/listarReportes', 'fa fa-th');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (10, 'principal', 'Como estratega digital, quiero poder  filtrar la promoción de eventos los cuales integren funcionalidades de las plataformas Youtube y soundcloud, con la finalidad de potenciar la imagen de los eventos y las experiencias se hagan palpables  previos a cada  suceso. \n', 10, 'index.php/inicio/eventos', 'fa fa-star');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (11, 'Linea de tiempo', NULL, 10, 'index.php/eventos/timeline', 'fa fa-list-alt');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (12, 'Proveedores', NULL, 13, 'index.php/directorio/proveedores', 'fa fa-cart-plus');
INSERT INTO `enidserv_eniddbbbb3`.`permiso` (`idpermiso`, `nombrepermiso`, `descripcionpermiso`, `idrecurso`, `urlpaginaweb`, `iconpermiso`) VALUES (13, 'Mis plantillas', 'plantillas de uso común al crear eventos', 14, 'index.php/templates/eventos', 'fa fa-play');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`perfil_permiso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 8);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 9);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 1);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 10);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 11);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 11);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 11);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 12);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (5, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (4, 13);
INSERT INTO `enidserv_eniddbbbb3`.`perfil_permiso` (`idperfil`, `idpermiso`) VALUES (3, 13);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`plan_perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (1, 4);
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (2, 3);
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (1, 5);
INSERT INTO `enidserv_eniddbbbb3`.`plan_perfil` (`idplan`, `idperfil`) VALUES (1, 6);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`tipo_acceso`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (1, 'Día del evento', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (2, 'Preventa 1', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (3, 'Preventa 2', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (4, 'Preventa 3', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (5, 'Preventa 4', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (6, 'Preventa 5', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (7, 'Preventa 6', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (8, 'Único día', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (9, 'Promoción', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (10, 'General H', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (11, 'General M', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tipo_acceso` (`idtipo_acceso`, `tipo`, `descripcion`, `status`) VALUES (12, 'General H & M', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`servicio`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (1, 'Estacionamiento', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (2, 'Parque de diversiones dentro del evento', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (3, 'Alberca', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (4, 'Fuegos artificiales ', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (5, 'Efectos especiales e iluminación', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (6, 'Video', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (7, 'Fotografía', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (8, 'Artistas internacionales', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (9, 'Representantes de la escena', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (10, 'Seguridad', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (11, 'Audio Profesional', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (12, 'Baños H & M', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (13, 'Performance', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (14, 'Iluminación Profesional', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`servicio` (`idservicio`, `servicio`, `status`, `descripcion`) VALUES (15, 'Instalaciones de arte', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`objetopermitido`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (1, 'Bolsas pequeñas', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (2, 'Mochilas de un solo compartimento', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (3, 'Bolsas de mano', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (4, 'Celulares', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (5, 'Lentes de sol', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (6, 'Encendedores ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (7, 'Tapones de oído ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (8, 'Pomada de labios y lipgloss cerrado', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (9, 'Maquillaje en polvo ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (10, 'Tampones/toallas sanitarias en empaque cerrado', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (11, 'Paquetes de chicles cerrado ', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (12, 'Medicinas de prescripción (Con prescripción de un doctor)', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (13, 'Hula hoops', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (14, 'Muñecos inflables', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (15, 'Banderas o pancartas hechas a mano (sin material dañino)', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (16, 'Cameras no profesionales de flash', NULL, '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`objetopermitido` (`idobjetopermitido`, `nombre`, `descripcion`, `status`, `fecha_registro`) VALUES (17, 'Bloqueador solar ', NULL, '1', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`genero_musical`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (1, 'House', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (2, 'Minimal', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (3, 'Bass‎ ', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (4, 'Hip hop & Rap', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (5, 'Jazz‎ ', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (6, 'Dance‎ ', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (7, 'Soul‎', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (8, 'Pop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (9, 'Rock', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (10, 'Musica electrónica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (11, 'Rap', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (12, 'Rock alternativo', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (13, 'Hip-Hop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (14, 'Rock and roll', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (15, 'Clasica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (16, 'Rock progresivo', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (17, 'Trash metal', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (18, 'Punk', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (19, 'Rock sinfonico', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (20, 'Grunge', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (21, 'Ska', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (22, 'Tecno', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (23, 'Disco', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (24, 'Country', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (25, 'Rhythm and Blues (R&B)', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (26, 'Blues', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (27, 'Tango', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (28, 'Vallenato', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (29, 'Samba', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (30, 'Trance', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (31, 'R&B & Soul', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (32, 'Electroacustica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (33, 'Art-rock', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (34, 'Sicodelica', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (35, 'Underground', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (36, 'Swing', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (37, 'New age', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (38, 'Free-Jazz', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (39, 'Bossa nova', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (40, 'Eurobeat', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (41, 'Cool-Jazz', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (42, 'Nueva onda', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (43, 'Break-beat', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (44, 'Acid', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (45, 'Bebop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (46, 'Zarzuela', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (47, 'Garage', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (48, 'Ragtime', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (49, 'Ambient', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (50, 'Deep House', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (51, 'Drum & Bass', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (52, 'Dubstep', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (53, 'Metal', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (54, 'Indie', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (55, 'Jazz & Blues', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (56, 'piano', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (57, 'Soundtrack', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (58, 'Trap', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (59, 'Trip Hop', NULL, NULL);
INSERT INTO `enidserv_eniddbbbb3`.`genero_musical` (`idgenero_musical`, `nombre`, `status`, `descripcion`) VALUES (60, 'World', NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`tematica`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (1, 'Fiestas de disfraces', '1', '');
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (2, 'Fiesta retro', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (3, 'Ambientado a los 70', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (4, 'Fiestas patrias', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (5, 'Medieval', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (6, 'Circo', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (7, 'Carnaval', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (8, 'Hollywood', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (9, 'Fantasía', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (10, 'Fiesta de sembrinas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (11, 'Una noche de Película', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (12, 'Alebrijes', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (13, 'Hawaiana', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (14, 'Rock & Roll', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (15, 'Vampiros', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (16, 'Sombreros', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (17, 'Antifaces', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (18, 'Terrorífica', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (19, 'De los ochentas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (20, 'Fiesta griega', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (21, 'Fiesta Black & White.', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (22, 'Futurista', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (23, 'Tipo las vegas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (24, 'Piratas', '1', NULL);
INSERT INTO `enidserv_eniddbbbb3`.`tematica` (`idtematica`, `tematica_evento`, `status`, `descripcion`) VALUES (25, 'Súper Héroes', '1', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`tipo_plantilla`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (1, 'Contenido descriptivo evento', 'platilla dedicada a la descripción de eventos', '1');
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (2, 'Contenido descriptivo permitido en el evento', NULL, '1');
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (3, 'Restricciones', NULL, '1');
INSERT INTO `enidserv_eniddbbbb3`.`tipo_plantilla` (`idtipo_plantilla`, `tipo_plantilla`, `descripcion`, `status`) VALUES (4, 'politicas', NULL, '1');

COMMIT;


-- -----------------------------------------------------
-- Data for table `enidserv_eniddbbbb3`.`empresa_objetopermitido`
-- -----------------------------------------------------
START TRANSACTION;
USE `enidserv_eniddbbbb3`;
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 1);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 2);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 3);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 4);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 5);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 6);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 7);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 8);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 9);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 10);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 11);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 12);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 13);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 14);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 15);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 16);
INSERT INTO `enidserv_eniddbbbb3`.`empresa_objetopermitido` (`idempresa`, `idobjetopermitido`) VALUES (1, 17);

COMMIT;

USE `enidserv_eniddbbbb3`;

DELIMITER $$

USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`empresa_AINS` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER `empresa_AINS` AFTER INSERT ON `empresa` FOR EACH ROW
INSERT INTO empresa_objetopermitido SELECT  new.idempresa , idobjetopermitido FROM objetopermitido;
$$


USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`usuario_perfil_dinamic` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER usuario_perfil_dinamic AFTER INSERT ON `usuario` FOR EACH ROW
begin
INSERT INTO usuario_perfil (idusuario , idperfil ) values ( new.idusuario , 4 );
end
$$


USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`evento_AINS` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER `evento_AINS` AFTER INSERT ON `evento` FOR EACH ROW
insert into log_evento (actividad, idevento , id_usuario) values("Creó el evento" , NEW.idevento, NEW.idusuario);$$


USE `enidserv_eniddbbbb3`$$
DROP TRIGGER IF EXISTS `enidserv_eniddbbbb3`.`escenario_BDEL` $$
USE `enidserv_eniddbbbb3`$$
CREATE TRIGGER `escenario_BDEL` BEFORE DELETE ON `escenario` FOR EACH ROW
delete from escenario_artista where escenario_artista.idescenario = idescenario;

$$


DELIMITER ;
