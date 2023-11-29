-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
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

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.aluno
CREATE TABLE IF NOT EXISTS `aluno` (
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereço` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_gerencial_biblioteca.aluno: ~0 rows (aproximadamente)
INSERT INTO `aluno` (`nome`, `cpf`, `telefone`, `endereço`) VALUES
	('Teste', '111.111.111-11', '(11)11111-1111', 'Teste');

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.emprestimo
CREATE TABLE IF NOT EXISTS `emprestimo` (
  `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `id_cpf_aluno` varchar(20) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL,
  `data_emprestimo` date DEFAULT NULL,
  `data_retorno` date DEFAULT NULL,
  `hora_emprestimo` time DEFAULT NULL,
  `hora_retorno` time DEFAULT NULL,
  `comentarios` varchar(400) DEFAULT NULL,
  `status_emprestimo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `FK_emprestimo_aluno` (`id_cpf_aluno`),
  KEY `FK_emprestimo_livros` (`id_livro`),
  CONSTRAINT `FK_emprestimo_aluno` FOREIGN KEY (`id_cpf_aluno`) REFERENCES `aluno` (`cpf`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_emprestimo_livros` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id_livro`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_gerencial_biblioteca.emprestimo: ~3 rows (aproximadamente)
INSERT INTO `emprestimo` (`id_emprestimo`, `id_cpf_aluno`, `id_livro`, `data_emprestimo`, `data_retorno`, `hora_emprestimo`, `hora_retorno`, `comentarios`, `status_emprestimo`) VALUES
	(13, '111.111.111-11', 27, '2023-11-22', '2023-11-29', '12:57:00', '12:00:00', 'Teste 1', 'Devolvido'),
	(14, '111.111.111-11', 28, '2023-11-26', '2023-11-28', '18:47:00', '20:00:00', 'Teste', 'Devolvido'),
	(15, '111.111.111-11', 31, '2023-11-29', '2023-12-02', '18:50:00', '20:50:00', '', 'Devolvido'),
	(16, '111.111.111-11', 31, '2023-11-29', '2023-11-28', '19:05:00', '19:05:00', '', 'Devolvido'),
	(17, '111.111.111-11', 31, '2023-11-27', '2023-11-28', '19:11:00', '22:11:00', '', 'Devolvido'),
	(18, '111.111.111-11', 31, '2023-11-29', '2023-12-09', '19:12:00', '01:12:00', '', 'Emprestado');

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.imagem
CREATE TABLE IF NOT EXISTS `imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_livro` int(11) NOT NULL DEFAULT 0,
  `imagem` varchar(800) NOT NULL DEFAULT '0',
  `data_foto` varchar(50) DEFAULT NULL,
  `hora_foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__livros` (`id_livro`),
  CONSTRAINT `FK__livros` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id_livro`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_gerencial_biblioteca.imagem: ~3 rows (aproximadamente)
INSERT INTO `imagem` (`id`, `id_livro`, `imagem`, `data_foto`, `hora_foto`) VALUES
	(12, 27, '/imagemLivros/resenha-o-apanhador-no-campo-de-centeio-de-j-d-salinger.jpg', '2023-11-22', '12:57'),
	(13, 28, '/imagemLivros/71BGWapQw8L._SY466_.jpg', '2023-11-26', '18:47'),
	(14, 31, '/imagemLivros/71BGWapQw8L._SY466_ - Copia.jpg', '2023-11-29', '18:50'),
	(15, 31, '/imagemLivros/71BGWapQw8L._SY466_.jpg', '2023-11-29', '19:05'),
	(16, 31, '/imagemLivros/71BGWapQw8L._SY466_.jpg', '2023-11-27', '19:11'),
	(17, 31, '/imagemLivros/71BGWapQw8L._SY466_.jpg', '2023-11-29', '19:12');

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.livros
CREATE TABLE IF NOT EXISTS `livros` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(400) DEFAULT NULL,
  `status_livro` varchar(50) DEFAULT NULL,
  `autor` varchar(400) DEFAULT NULL,
  `paginas` int(11) NOT NULL DEFAULT 0,
  `categoria` varchar(50) NOT NULL DEFAULT '0',
  `estado_livro` varchar(50) NOT NULL DEFAULT '0',
  `imagem` varchar(400) NOT NULL DEFAULT '0',
  `comentarios` varchar(400) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sistema_gerencial_biblioteca.livros: ~19 rows (aproximadamente)
INSERT INTO `livros` (`id_livro`, `titulo`, `status_livro`, `autor`, `paginas`, `categoria`, `estado_livro`, `imagem`, `comentarios`) VALUES
	(27, 'O Apanhador no Campo de Centeio', 'Disponível', 'J. D. Salinger', 234, 'Romance', 'Excelente', '/imagemLivros/91HFFmf2PQL._SL1500_.jpg', 'Capa dura.'),
	(28, 'O Senhor dos Anéis: A Sociedade do Anel', 'Disponível', 'J.R.R. Tolkien', 576, 'Fantasia', 'Excelente', '/imagemLivros/81hCVEC0ExL._SL1500_.jpg', 'Nenhuma observação.'),
	(29, 'Assassinato no Expresso do Oriente', 'Disponível', 'Agatha Christie', 200, 'Romance, Mistério', 'Regular', '/imagemLivros/imagem_2023-10-06_004945841.png', 'Capa dura.'),
	(31, 'O Pequeno Príncipe', 'Indisponível', 'Antoine de Saint-Exupéry', 0, '96', 'Excelente', '/imagemLivros/71BGWapQw8L._SY466_.jpg', '');

-- Copiando estrutura para tabela sistema_gerencial_biblioteca.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(400) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `endereco` varchar(400) DEFAULT NULL,
  `nivel_acesso` int(11) DEFAULT NULL,
  `senha` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
