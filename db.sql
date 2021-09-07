-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Set-2021 às 19:01
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
-- Banco de dados: `sistema_agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamentos`
--

DROP TABLE IF EXISTS `agendamentos`;
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(255) NOT NULL,
  `data` varchar(20) COLLATE utf8_bin NOT NULL,
  `local` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_funcionario`, `data`, `local`) VALUES
(1, 1, '24/09/2021 T', 'SP'),
(2, 1, '25/09/2021 M', 'Santos'),
(3, 2, '24/09/2021 T', 'SP'),
(4, 3, '24/09/2021 T', 'SP'),
(5, 4, '24/09/2021 M', 'SP'),
(6, 2, '22/09/2021 M', 'Santos'),
(7, 4, '24/09/2021 T', 'Santos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `email`, `senha`, `admin`) VALUES
(1, 'Natã Vinícius Menezes Guimarães', 'natanmenezes31@gmail.com', 'AdMiNdOsIsTeMa', 1),
(2, 'Stefânio Soares Junior', 'stefaniojr@live.com', 'stefaniosoaresjunior', 0),
(3, 'Ana Luiza Gabatelli', 'al.gabatelli@gmail.com', 'anagabatelli', 0),
(4, 'Samuel Rodrigues', 'ex@example.com', 'samrodrigues', 0),
(5, 'Matheus Honorato', 'matheuswebmw@gmail.com', 'MaThEuSHn', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
