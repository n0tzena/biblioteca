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

-- Copiando dados para a tabela sistema_gerencial_biblioteca.aluno: ~2 rows (aproximadamente)
INSERT INTO `aluno` (`nome`, `cpf`, `telefone`, `endereço`) VALUES
	('Teste', '111.111.111-11', '(11)11111-1111', 'Teste'),
	('Victor Gomes Damasceno', '888.888.888-88', '(88)88888-8888', '888888888888');

-- Copiando dados para a tabela sistema_gerencial_biblioteca.emprestimo: ~1 rows (aproximadamente)
INSERT INTO `emprestimo` (`id_emprestimo`, `id_cpf_aluno`, `id_livro`, `data_emprestimo`, `data_retorno`, `hora_emprestimo`, `hora_retorno`, `comentarios`) VALUES
	(0, '111.111.111-11', 27, '2023-10-19', '2023-10-19', '00:00:00', '00:00:00', 'nenhum');

-- Copiando dados para a tabela sistema_gerencial_biblioteca.imagens: ~0 rows (aproximadamente)

-- Copiando dados para a tabela sistema_gerencial_biblioteca.livros: ~3 rows (aproximadamente)
INSERT INTO `livros` (`id_livro`, `titulo`, `status_livro`, `autor`, `categoria`, `paginas`, `estado_livro`, `imagem`, `comentarios`) VALUES
	(27, 'O Apanhador no Campo de Centeio', 'Disponível', 'J. D. Salinger', 'Romance', 234, 'Excelente', '/imagemLivros/91HFFmf2PQL._SL1500_.jpg', 'Capa dura.'),
	(28, 'O Senhor dos Anéis: A Sociedade do Anel', 'Indisponível', 'J.R.R. Tolkien', 'Fantasia', 576, 'Excelente', '/imagemLivros/81hCVEC0ExL._SL1500_.jpg', 'Nenhuma observação.'),
	(29, 'Assassinato no Expresso do Oriente', 'Disponível', 'Agatha Christie', 'Romance, Mistério', 200, 'Regular', '/imagemLivros/imagem_2023-10-06_004945841.png', 'Capa dura.');

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
