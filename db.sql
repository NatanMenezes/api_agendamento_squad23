-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09-Set-2021 às 18:18
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
  `estacao` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_funcionario`, `data`, `estacao`) VALUES
(1, 1, '24/09/2021 T', 'SP'),
(2, 1, '25/09/2021 M', 'Santos'),
(3, 2, '24/09/2021 T', 'SP'),
(4, 3, '24/09/2021 T', 'SP'),
(5, 4, '24/09/2021 M', 'SP'),
(6, 2, '22/09/2021 M', 'Santos'),
(7, 4, '24/09/2021 T', 'Santos'),
(8, 5, '16/09/2021 T', 'SP'),
(9, 4, '16/09/2021 T', 'SP'),
(10, 1, '16/09/2021 T', 'SP'),
(20, 4, '07/09/2021 T', 'SP'),
(12, 2, '06/09/2021 T', 'SP'),
(13, 3, '06/09/2021 T', 'SP'),
(14, 1, '16/09/2021 T', 'SP'),
(21, 1, '07/09/2021 T', 'SP'),
(25, 9, '07/09/2021', 'Santos'),
(22, 5, '07/09/2021 T', 'SP'),
(19, 2, '07/09/2021 T', 'SP'),
(23, 3, '07/09/2021 T', 'Santos'),
(24, 9, '07/09/2021 T', 'Santos'),
(26, 9, '0', 'Santos'),
(29, 8, '07/09/2021 T', 'Santos'),
(30, 8, '20/09/2021 T', 'Santos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `campo` varchar(255) COLLATE utf8_bin NOT NULL,
  `valor` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `campo`, `valor`) VALUES
(1, 'regulamento', 40),
(2, 'capacidade_SP', 600),
(3, 'capacidade_Santos', 100);

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
