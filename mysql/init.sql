-- phpMyAdmin SQL Dump
-- version 5.2.1-1.fc38
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 02:02 PM
-- Server version: 10.5.21-MariaDB
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allpet`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `dt_agenda` date NOT NULL,
  `hr_agenda` time NOT NULL,
  `fkcod_pet` int(9) NOT NULL,
  `fkid_servico` int(11) NOT NULL,
  `relat_serv` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `fkid_func` int(11) NOT NULL,
  `fkid_receb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diasdasemana`
--

CREATE TABLE `diasdasemana` (
  `id` int(11) NOT NULL,
  `nomedodia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diasdasemana`
--

INSERT INTO `diasdasemana` (`id`, `nomedodia`) VALUES
(1, 'Segunda'),
(2, 'Terça'),
(3, 'Quarta'),
(4, 'Quinta'),
(5, 'Sexta'),
(6, 'Sabado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Table structure for table `enderecos`
--

CREATE TABLE `enderecos` (
  `id_endereco` int(11) NOT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `num_da_casa` int(11) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL,
  `bairro` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enderecos`
--

INSERT INTO `enderecos` (`id_endereco`, `cep`, `rua`, `num_da_casa`, `cidade`, `estado`, `bairro`) VALUES
(4, '', 'kjdsakj', 48, 'kdjaskjd', 'dsakdjsa', 'djkasjdsa'),
(5, '19909040', 'seila seila', 49, 'ourinhos', 'Sp', 'santos dumount'),
(6, '19909040', 'seila seila', 49, 'ourinhos', 'Sp', 'santos dumount'),
(7, '19909040', 'daksjsa', 48, 'daksjdsa', 'daksjd', 'dkasjdas'),
(8, '19909040', 'dsadasdcv', 48, 'dksajkdaj', 'dksajdkasj', 'dsakdae'),
(9, '813981', 'daskljd', 48, 'lccka', 'daisjdka', 'dlaksjd'),
(10, '813981', 'daskljd', 48, 'lccka', 'daisjdka', 'dlaksjd'),
(11, '19909040', 'dasdasd', 48, 'dksamda', 'kdsajdlc', 'mdasdas'),
(12, '19909040', 'dasdasd', 48, 'dksamda', 'kdsajdlc', 'mdasdas'),
(13, '813981', 'daskljd', 48, 'lccka', 'daisjdka', 'dlaksjd'),
(14, '1094091', 'dkasjda', 48, 'dlsakjda', 'dksajdsakl', 'adskjda'),
(15, '1094091', 'dkasjda', 48, 'dlsakjda', 'dksajdsakl', 'adskjda'),
(16, '482714', 'daksjd', 47, 'daksjd', 'kasjda', 'dkasj'),
(17, '1094091', 'dkasjda', 48, 'dlsakjda', 'dksajdsakl', 'adskjda'),
(18, '1909094', 'dsalkd', 49, 'dlsakda', 'dksladsa', 'dlsakd'),
(19, '1909094', 'dsalkd', 49, 'dlsakda', 'dksladsa', 'dlsakd'),
(20, '189988', 'dddd', 49, 'ddddddd', 'daksjdcc', 'ddddddd'),
(21, '189988', 'dddd', 49, 'ddddddd', 'daksjdcc', 'ddddddd'),
(22, '498499', 'daaaaa', 48, 'dddddddd', 'dssssss', 'ccccccc'),
(23, '498499', 'daaaaa', 48, 'dddddddd', 'dssssss', 'ccccccc'),
(24, '498499', 'daaaaa', 48, 'dddddddd', 'dssssss', 'ccccccc'),
(25, '44444444', 'dd', 49, 'dddddd', 'ddddd', 'dddd'),
(40, '19909-200', 'seilaaad', 60, 'ourinhos', 'SP ', 'SantosDum'),
(41, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont'),
(42, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont'),
(43, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont'),
(44, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont'),
(45, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont'),
(46, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont'),
(47, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont'),
(48, '19909-040', 'paranana', 24, 'Ourinhos', 'SP', 'Santos Dumont');

-- --------------------------------------------------------

--
-- Table structure for table `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL,
  `nome_especie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcao`
--

CREATE TABLE `funcao` (
  `id` int(11) NOT NULL,
  `nome_funcao` varchar(30) NOT NULL,
  `departamento` varchar(30) NOT NULL,
  `descricao_funcao` text NOT NULL,
  `salario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `hora_de_trab` time DEFAULT NULL,
  `diadefolga` int(11) DEFAULT NULL,
  `perfil` varchar(11) DEFAULT NULL,
  `cpf_pessoa` varchar(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fkfuncao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`hora_de_trab`, `diadefolga`, `perfil`, `cpf_pessoa`, `id`, `fkfuncao`) VALUES
(NULL, NULL, NULL, '9875321', 1, NULL),
(NULL, NULL, NULL, '41321455', 2, NULL),
(NULL, NULL, NULL, '44444444', 3, NULL),
(NULL, 1, NULL, '2111111111', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pessoas`
--

CREATE TABLE `pessoas` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `rg` int(13) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fkendereco` int(11) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `dtnasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pessoas`
--

INSERT INTO `pessoas` (`cpf`, `nome`, `rg`, `telefone`, `email`, `fkendereco`, `tipo`, `dtnasc`) VALUES
('11202013', 'Gmaaddte', 1745223, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('12345678', 'dkalskd', 2313123, '402402', 'fkasldksla@gmail.com', 11, 1, '2200-04-04'),
('162000413', 'Garmaaddte', 1745223, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('16340413', 'Garmaladdte', 1745223, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('2-13121', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2000-10-20', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2000-11-20', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2001-11-20', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2010921', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2013121', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2013921', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2111111111', 'dsdssdsdd', 33333333, '32333333', 'dkjddddd@gmail.com', 25, 1, '2200-03-30'),
('23123121', 'seila', 2141245, '1234124', 'seila@gmail.com', 23, 1, '2000-10-10'),
('2313121', 'seila', 2141245, '1234124', 'seila@gmail.com', 23, 1, '2000-10-10'),
('23231123', 'Garmalaste', 42142313, '14422333', 'dskdad@gmail.com', 16, 1, '2000-09-20'),
('2323123', 'Garmalate', 4212313, '14422333', 'dskdad@gmail.com', 17, 1, '2010-09-20'),
('232324123', 'Garmaladdte', 42123713, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('23234123', 'Garmaladdte', 42123713, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('2900834', 'seila', 2141245, '1234124', 'seila@gmail.com', 46, 1, '2000-10-10'),
('2900854', 'seila', 2141245, '1234124', 'seila@gmail.com', 44, 1, '2000-10-10'),
('290304123', 'Garmaladdte', 18723713, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('29030413', 'Garmaladdte', 1723713, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('29108134', 'seila', 2141245, '1234124', 'seila@gmail.com', 48, 1, '2000-10-10'),
('2910834', 'seila', 2141245, '1234124', 'seila@gmail.com', 47, 1, '2000-10-10'),
('2990852', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2990853', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2990854', 'seila', 2141245, '1234124', 'seila@gmail.com', 42, 1, '2000-10-10'),
('2999021', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999121', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999122', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('299921', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999622', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999722', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999822', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999832', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999842', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('2999852', 'seila', 2141245, '1234124', 'seila@gmail.com', 24, 1, '2000-10-10'),
('4125683', 'Gabriel', 218744, '4128447', 'djkhfjsafjk@gmail.com', 16, 1, '2000-04-09'),
('41321455', 'slaçkfas', 129348, '419241', 'kdjsadaf@gmail.com', 20, 1, '2000-04-20'),
('44444444', 'kasdjas', 4232333, '4444442', 'faskdjakd@gmail.com', 22, 1, '2000-04-09'),
('48129841', 'dkajslkda', 9248148, '492849', 'dksjadj@gmail.com', 9, 1, '0922-09-04'),
('4821846', 'lkfaspokfa', 18573157, '412412', 'dkajsdkjsa@gmail.com', 18, 1, '2444-04-20'),
('487964431', 'Gabriel', 482414, '4824141', 'gajshdsajkh@gmail.com', 8, 1, '2000-04-09'),
('4879644480', 'Gabriel', 48020104, '4187249', 'gabdjsadbaj@gmail.com', 7, 1, '2000-04-09'),
('48796444800', 'test', 49219341, '918249012', 'kajdsajdhas@gmail.com', 4, 1, '2200-04-02'),
('90330413', 'Garmaladdte', 1723723, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('96230413', 'Garmaladdte', 1743723, '14422333', 'dskdad@gmail.com', 40, 1, '2010-09-20'),
('9875321', 'dasdsa', 1235456, '49', 'dasjdsakj@gmail.com', 14, 1, '2000-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `cod_pet` int(9) NOT NULL,
  `pet_nome` varchar(20) NOT NULL,
  `fktutor_cpf` varchar(14) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sexo` varchar(5) NOT NULL,
  `dt_nasc` date NOT NULL,
  `pelagem` varchar(20) NOT NULL,
  `cor` varchar(20) NOT NULL,
  `fkid_tutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `raca`
--

CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL,
  `nome_raca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recebimento`
--

CREATE TABLE `recebimento` (
  `id_pgto` int(11) NOT NULL,
  `preco_receb` double NOT NULL,
  `num_parcela` int(11) NOT NULL,
  `formato_pgto` varchar(15) NOT NULL,
  `data_pgto` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servico`
--

CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL,
  `disc_servico` text NOT NULL,
  `preco` decimal(9,0) NOT NULL,
  `dt_hr_atend` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `nome` varchar(40) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`nome`, `num`) VALUES
('Garr', 30),
('Gabriel', 40),
('kdasd', 42),
('tdsa', 43),
('akdjaklsjd', 48),
('test', 49);

-- --------------------------------------------------------

--
-- Table structure for table `tutores`
--

CREATE TABLE `tutores` (
  `id_tutor` int(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cpf_pessoa` varchar(11) NOT NULL,
  `dtregistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutores`
--

INSERT INTO `tutores` (`id_tutor`, `status`, `cpf_pessoa`, `dtregistro`) VALUES
(53, 1, '2-13121', '2000-10-20'),
(57, 1, '16340413', '2010-09-25'),
(58, 1, '162000413', '2010-09-25'),
(59, 1, '11202013', '2010-09-25'),
(60, 1, '2013121', '2000-10-20'),
(61, 1, '2013921', '2000-10-20'),
(62, 1, '2010921', '2000-10-20'),
(65, 1, '299921', '2001-11-20'),
(66, 1, '2999122', '2001-11-20'),
(67, 1, '2999122', '2001-11-20'),
(68, 1, '2999622', '2001-11-20'),
(69, 1, '2999722', '2001-11-20'),
(70, 1, '2999722', '2001-11-20'),
(71, 1, '2999822', '2001-11-20'),
(72, 1, '2999822', '2001-11-20'),
(73, 1, '2999832', '2001-11-20'),
(74, 1, '2999842', '2001-11-20'),
(75, 1, '2999842', '2001-11-20'),
(76, 1, '2999852', '2001-11-20'),
(77, 1, '2990852', '2001-11-20'),
(78, 1, '2990853', '2001-11-20'),
(79, 1, '2990854', '2001-11-20'),
(80, 1, '2900854', '2001-11-20'),
(81, 1, '2900834', '2001-11-20'),
(82, 1, '2910834', '2001-11-20'),
(83, 1, '29108134', '2001-11-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `fkid_servico` (`fkid_servico`),
  ADD KEY `fkcod_pet` (`fkcod_pet`),
  ADD KEY `fkid_func` (`fkid_func`),
  ADD KEY `fkid_receb` (`fkid_receb`);

--
-- Indexes for table `diasdasemana`
--
ALTER TABLE `diasdasemana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpf_pessoa` (`cpf_pessoa`),
  ADD KEY `fkfuncao` (`fkfuncao`),
  ADD KEY `diadefolga` (`diadefolga`);

--
-- Indexes for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fkendereco` (`fkendereco`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`cod_pet`),
  ADD KEY `pet_ibfk_1` (`fktutor_cpf`),
  ADD KEY `fkid_tutor` (`fkid_tutor`);

--
-- Indexes for table `raca`
--
ALTER TABLE `raca`
  ADD PRIMARY KEY (`id_raca`);

--
-- Indexes for table `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`id_pgto`);

--
-- Indexes for table `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id_servico`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `tutores`
--
ALTER TABLE `tutores`
  ADD PRIMARY KEY (`id_tutor`),
  ADD KEY `cpf_pessoa` (`cpf_pessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diasdasemana`
--
ALTER TABLE `diasdasemana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutores`
--
ALTER TABLE `tutores`
  MODIFY `id_tutor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_2` FOREIGN KEY (`fkcod_pet`) REFERENCES `pet` (`cod_pet`),
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`fkid_func`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `agenda_ibfk_4` FOREIGN KEY (`fkid_receb`) REFERENCES `recebimento` (`id_pgto`);

--
-- Constraints for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`cpf_pessoa`) REFERENCES `pessoas` (`cpf`),
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`fkfuncao`) REFERENCES `funcao` (`id`),
  ADD CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`diadefolga`) REFERENCES `diasdasemana` (`id`);

--
-- Constraints for table `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`fkendereco`) REFERENCES `enderecos` (`id_endereco`);

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_2` FOREIGN KEY (`fkid_tutor`) REFERENCES `tutores` (`id_tutor`);

--
-- Constraints for table `tutores`
--
ALTER TABLE `tutores`
  ADD CONSTRAINT `tutores_ibfk_1` FOREIGN KEY (`cpf_pessoa`) REFERENCES `pessoas` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
