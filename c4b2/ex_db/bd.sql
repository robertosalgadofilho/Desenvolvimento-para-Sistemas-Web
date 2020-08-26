-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.13-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para publicacoes
CREATE DATABASE IF NOT EXISTS `publicacoes` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `publicacoes`;

-- Copiando estrutura para tabela publicacoes.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `codgenero` int(3) NOT NULL,
  `descricao` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  PRIMARY KEY (`codgenero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela publicacoes.genero: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`codgenero`, `descricao`) VALUES
	(1, 'Romance'),
	(2, ' Fantasia'),
	(3, ' Literatura'),
	(4, 'Ficção');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Copiando estrutura para tabela publicacoes.titulo
CREATE TABLE IF NOT EXISTS `titulo` (
  `codtitulo` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `codgenero` int(3) NOT NULL,
  `ano` int(11) NOT NULL,
  PRIMARY KEY (`codtitulo`),
  KEY `titulo_genero` (`codgenero`),
  CONSTRAINT `titulos_genero` FOREIGN KEY (`codgenero`) REFERENCES `genero` (`codgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela publicacoes.titulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `titulo` DISABLE KEYS */;
INSERT INTO `titulo` (`codtitulo`, `autor`, `titulo`, `codgenero`, `ano`) VALUES
	(1, 'Harry Potter e a Pedra Filosofal', 'J. K. Rowling', 2, 1997),
	(2, 'A Culpa É das Estrelas', 'John Green', 1, 2012),
	(3, 'Bird Box', 'Josh Malerman', 4, 2014),
	(4, 'Dom Casmurro', 'Machado de Assis', 3, 1899);
/*!40000 ALTER TABLE `titulo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
