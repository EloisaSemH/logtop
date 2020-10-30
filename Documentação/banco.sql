drop database logtop;
create database logtop DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use logtop;
CREATE TABLE IF NOT EXISTS `logtop`.`usuario` (
  `us_cod` INT NOT NULL AUTO_INCREMENT,
  `us_nome` VARCHAR(64) NOT NULL,
  `us_email` VARCHAR(128) NOT NULL,
  `us_sexo` VARCHAR(1) NOT NULL,
  `us_data` DATE NOT NULL,
  `us_hora` TIME NOT NULL,
  `us_ip` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`us_cod`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `logtop`.`senha` (
  `usuario_us_cod` INT NOT NULL,
  `se_senha` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`usuario_us_cod`));

alter table `logtop`.`senha` ADD CONSTRAINT `fk_senha_usuario` FOREIGN KEY (`usuario_us_cod`) REFERENCES `logtop`.`usuario` (`us_cod`);

select * from usuario;
select * from senha;