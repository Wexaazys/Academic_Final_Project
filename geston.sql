-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Maio-2019 às 16:37
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geston`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `armazem`
--

CREATE TABLE `armazem` (
  `IDArmazem` int(11) NOT NULL,
  `NomeProduto` varchar(100) NOT NULL,
  `Categoria` varchar(64) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `NumeroEstante` varchar(100) NOT NULL,
  `QRCode` varchar(64) NOT NULL,
  `DescricaoProduto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `armazem`
--

INSERT INTO `armazem` (`IDArmazem`, `NomeProduto`, `Categoria`, `Quantidade`, `NumeroEstante`, `QRCode`, `DescricaoProduto`) VALUES
(1, 'Fones 7.1', 'Gaming', 100, 'AA', 'AA', '5 com defeito\r\nSurround 7.1'),
(2, 'Cadeiras', 'Gaming', 250, 'AB', 'AB', 'C_Gaming cores: vermelho , azul , verde , laranja, rosa'),
(3, 'PC_PR_FEITO', 'Gaming', 300, 'AC', 'AC', 'Computadores pre-feitos com processador i5 7600k , geforce gtx 1080 ti, 16 gb ram, 1tb ssd 1tb hdd'),
(4, 'PC_PORTATIL', 'Gaming', 200, 'BA', 'BA', 'Specs: i7 oitava geracao gtx 1060 ecra hd 15.6\' 16gb ram'),
(5, 'Colunas', 'Gaming', 150, 'AA', 'AA', '-'),
(6, 'Monitores', 'Gaming', 120, 'BB', 'BB', '144hz 27\'');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_logins`
--

CREATE TABLE `historico_logins` (
  `IDHistoricoLogins` int(11) NOT NULL,
  `NomeUtilizadorHistorico` varchar(64) NOT NULL,
  `DataHistorico` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico_logins`
--

INSERT INTO `historico_logins` (`IDHistoricoLogins`, `NomeUtilizadorHistorico`, `DataHistorico`) VALUES
(1, 'Admin', '2019-05-27 15:25:43'),
(2, 'Silva', '2019-05-27 15:35:20'),
(3, 'Silva', '2019-05-27 15:35:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `User` varchar(64) NOT NULL,
  `Password` varchar(600) NOT NULL,
  `funcao` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`User`, `Password`, `funcao`) VALUES
('Admin', '5b7e12eaaac08e74ac691e484141fe24fb3129eb152aaac08a8773829999751a6b60d78e3c3685ffd7f1c96649843e79e6430e99cf6dc6524a725e2951521540', 'Admin'),
('Silva', '5b7e12eaaac08e74ac691e484141fe24fb3129eb152aaac08a8773829999751a6b60d78e3c3685ffd7f1c96649843e79e6430e99cf6dc6524a725e2951521540', 'Admin'),
('User', 'cbe0cd68cbca3868250c0ba545c48032f43eb0e8a5e6bab603d109251486f77a91e46a3146d887e37416c6bdb6cbe701bd514de778573c9b0068483c1c626aec', 'Funcionario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armazem`
--
ALTER TABLE `armazem`
  ADD PRIMARY KEY (`IDArmazem`);

--
-- Indexes for table `historico_logins`
--
ALTER TABLE `historico_logins`
  ADD PRIMARY KEY (`IDHistoricoLogins`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armazem`
--
ALTER TABLE `armazem`
  MODIFY `IDArmazem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `historico_logins`
--
ALTER TABLE `historico_logins`
  MODIFY `IDHistoricoLogins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
