-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sistema_gerencial_biblioteca
CREATE DATABASE IF NOT EXISTS `sistema_gerencial_biblioteca` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `sistema_gerencial_biblioteca`;

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.emprestimo
CREATE TABLE IF NOT EXISTS `emprestimo` (
  `id_emprestimo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  `data_emprestimo` date NOT NULL,
  `hora_emprestimo` time NOT NULL,
  `data_retorno` date NOT NULL,
  `hora_retorno` time NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_livro` (`id_livro`),
  CONSTRAINT `emprestimo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `emprestimo_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id_livro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_gerencial_biblioteca.emprestimo: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `status_livro` varchar(100) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `paginas` int(11) NOT NULL,
  `estado_livro` varchar(255) NOT NULL,
  `imagem` varchar(1024) NOT NULL,
  `comentarios` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sistema_gerencial_biblioteca.livros: ~11 rows (aproximadamente)
INSERT INTO `livros` (`id_livro`, `titulo`, `status_livro`, `autor`, `categoria`, `paginas`, `estado_livro`, `imagem`, `comentarios`) VALUES
	(27, 'O Apanhador no Campo de Centeio', 'Disponível', 'J. D. Salinger', 'Romance', 234, 'Excelente', '/imagemLivros/91HFFmf2PQL._SL1500_.jpg', 'Capa dura.'),
	(28, 'O Senhor dos Anéis: A Sociedade do Anel', 'Indisponível', 'J.R.R. Tolkien', 'Fantasia', 576, 'Excelente', '/imagemLivros/81hCVEC0ExL._SL1500_.jpg', 'Nenhuma observação.'),
	(29, 'Assassinato no Expresso do Oriente', 'Disponível', 'Agatha Christie', 'Romance, Mistério', 200, 'Regular', '/imagemLivros/imagem_2023-10-06_004945841.png', 'Capa dura.');

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sistema_gerencial_biblioteca.usuario: ~3 rows (aproximadamente)
INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `cpf`, `telefone`, `endereco`, `nivel_acesso`, `senha`) VALUES
	(1, 'func2', '999.999.999-99', '(21)99999-9999', 'Rua teste Teste', 1, 'teste'),
	(12, 'admin', '222.222.222-22', '(22)22222-2222', 'Rua X', 1, 'admin'),
	(21, 'lucasvitorfc', '135.869.997-63', '(21)98089-0767', 'Rua X, Travessa Y', 1, 'senha');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
