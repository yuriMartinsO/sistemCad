-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Abr-2020 às 02:37
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10500133_bancounico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campo`
--

DROP TABLE IF EXISTS `campo`;
CREATE TABLE IF NOT EXISTS `campo` (
  `idcampo` int(11) NOT NULL AUTO_INCREMENT,
  `nomecampo` varchar(30) NOT NULL,
  `tipocampo` varchar(15) NOT NULL,
  `idusuario` int(11) NOT NULL DEFAULT '93',
  `idgrupo` int(11) NOT NULL,
  `ativo` int(11) NOT NULL,
  `obrigatorio` int(11) NOT NULL,
  PRIMARY KEY (`idcampo`),
  KEY `fk_idusuario` (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campo`
--

INSERT INTO `campo` (`idcampo`, `nomecampo`, `tipocampo`, `idusuario`, `idgrupo`, `ativo`, `obrigatorio`) VALUES
(33, 'Imagem', 'imagem', 90, 10, 1, 1),
(28, 'PreÃ§o', 'quebrado', 90, 10, 1, 1),
(27, 'Estoque', 'inteiro', 90, 10, 1, 1),
(34, 'Imagem2', 'imagem', 90, 10, 1, 1),
(30, 'DataDevolucao', 'data', 90, 10, 1, 1),
(31, 'perfeitoEstado', 'SimNao', 90, 10, 1, 1),
(32, 'cor', 'cor', 90, 10, 1, 0),
(35, 'imagem', 'imagem', 90, 11, 1, 1),
(36, 'preco', 'quebrado', 90, 11, 1, 1),
(37, 'dataVencimento', 'data', 90, 11, 0, 0),
(38, 'txt', 'arquivo', 90, 11, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nomegrupo` varchar(30) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `ativo` int(11) NOT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nomegrupo`, `idusuario`, `ativo`) VALUES
(10, 'Paes', 90, 1),
(11, 'frutas', 90, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `idgrupo` int(11) NOT NULL,
  `dados` json NOT NULL,
  PRIMARY KEY (`iditem`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`iditem`, `nome`, `idgrupo`, `dados`) VALUES
(1, 'Sonho', 10, '{\"cor\": \"#5513d0\", \"Imagem\": \"arquivos/1/294984622587037664651.jpg\", \"Estoque\": \"50\", \"Imagem2\": \"arquivos/1/363896123368135067113.jpg\", \"Preu00e7o\": \"10.000,00\", \"DataDevolucao\": \"0019-05-04\", \"perfeitoEstado\": \"Nu00e3o\"}'),
(2, 'Fruta', 11, '{\"preco\": \"10.000,00\", \"imagem\": \"arquivos/1/98298145349144695833.png\"}'),
(3, 'Melancia', 11, '{\"preco\": \"1,00\", \"imagem\": \"arquivos/1/644762611826843341286.png\", \"dataVencimento\": \"2020-04-08\"}'),
(4, 'teste', 11, '{\"txt\": \"arquivos/1/888589391539425228356.sql\", \"preco\": \"1.000,00\", \"imagem\": \"arquivos/1/452130145930916607674.png\"}'),
(5, 'aleatorio', 11, '{\"txt\": \"arquivos/1/824796247048182454686rent\", \"preco\": \"50,00\", \"imagem\": \"arquivos/1/452428614873191479142.jpg\"}'),
(6, '0550', 10, '{\"cor\": \"#727272\", \"Imagem\": \"arquivos/1/499639320163667698373.jpg\", \"Estoque\": \"55\", \"Imagem2\": \"arquivos/1/875046738613993254359.jpg\", \"Preu00e7o\": \"45,00\", \"DataDevolucao\": \"5000-05-05\", \"perfeitoEstado\": \"Sim\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `email`, `senha`) VALUES
(48, 'yuri.oliveira@yahoo.com.br', '123'),
(87, 'teste@teste.com.br', '123'),
(88, 'lucashamanzake@yahooo.com.br', '123'),
(90, 'yuri.olivera@hotmail.com', '123'),
(91, 'kauelevi@gmail.com', '39317717kaue'),
(92, 'teste123@teste.com.br', '123'),
(93, 'default@hotmail.com', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
