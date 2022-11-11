CREATE SCHEMA IF NOT EXISTS `healthy` DEFAULT CHARACTER SET utf8 ;
USE `healthy` ;

-- -----------------------------------------------------
-- Table `healthy`.`escola`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy`.`escola` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_escola` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(100) NOT NULL,
  `categoria_ensino` VARCHAR(45) NOT NULL,
  `cep` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy`.`professor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy`.`professor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_professor` VARCHAR(45) NOT NULL,
  `universidade_form` VARCHAR(45) NOT NULL,
  `dataNasci` DATE NOT NULL,
  `emailP` VARCHAR(45) NOT NULL,
  `senhaP` VARCHAR(45) NOT NULL,
  `escola_idescola` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `emailP_UNIQUE` (`emailP` ASC),
  CONSTRAINT `fk_professor_escola`
    FOREIGN KEY (`escola_idescola`)
    REFERENCES `healthy`.`escola` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy`.`aluno` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy`.`turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy`.`turma` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_turma` VARCHAR(45) NOT NULL,
  `serie` INT NOT NULL,
  `professor_idprofessor` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_turma_professor1`
    FOREIGN KEY (`professor_idprofessor`)
    REFERENCES `healthy`.`professor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy`.`matricula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy`.`matricula` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `matricula` BIGINT(250) NOT NULL,
  `data` DATE NOT NULL,
  `aluno_idaluno` INT NOT NULL,
  `turma_idturma` INT NOT NULL,
  PRIMARY KEY (`id`, `aluno_idaluno`, `turma_idturma`),
  CONSTRAINT `fk_matricula_aluno1`
    FOREIGN KEY (`aluno_idaluno`)
    REFERENCES `healthy`.`aluno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_matricula_turma1`
    FOREIGN KEY (`turma_idturma`)
    REFERENCES `healthy`.`turma` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `healthy`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `healthy`.`avaliacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NULL,
  `peso` DOUBLE NULL,
  `altura` FLOAT NULL,
  `imc` FLOAT NULL,
  `aluno_idaluno` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_avaliacao_aluno1`
    FOREIGN KEY (`aluno_idaluno`)
    REFERENCES `healthy`.`aluno` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
