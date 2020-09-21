-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21-Set-2020 às 22:39
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `1620470400080`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` enum('s','n') NOT NULL,
  `data` timestamp NOT NULL,
  `alteracao` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id`, `titulo`, `descricao`, `ativo`, `data`, `alteracao`) VALUES
(17, 'Analista de Suporte', 'TIVIT SA', 's', '2020-09-22 01:29:44', '2020-09-22 01:29:44'),
(14, 'Desenvolvedor PHP', 'Globosat', 's', '2020-09-22 01:29:09', '2020-09-22 01:29:09'),
(15, 'Desenvolvedor Java', 'IBM', 's', '2020-09-22 01:29:21', '2020-09-22 01:29:21'),
(16, 'Engenheiro Civil', 'Odebrecht', 's', '2020-09-22 01:29:30', '2020-09-22 01:29:30'),
(12, 'Operador de Computador', 'Mainframe IBM EC2', 's', '2020-09-22 01:27:58', '2020-09-22 01:27:58'),
(13, 'Vendedor Hinode', 'Venha para a empresa lucrar muito', 's', '2020-09-22 01:28:38', '2020-09-22 01:28:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
