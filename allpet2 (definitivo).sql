-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Out-2023 às 06:45
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `allpet2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
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
-- Estrutura da tabela `diasdasemana`
--

CREATE TABLE `diasdasemana` (
  `id` int(11) NOT NULL,
  `nomedodia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `diasdasemana`
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
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep` varchar(30) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `num_da_casa` int(11) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep`, `logradouro`, `num_da_casa`, `cidade`, `estado`, `bairro`) VALUES
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
(25, '44444444', 'dd', 49, 'dddddd', 'ddddd', 'dddd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(11) NOT NULL,
  `nome_especie` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
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
-- Estrutura da tabela `funcionarios`
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
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`hora_de_trab`, `diadefolga`, `perfil`, `cpf_pessoa`, `id`, `fkfuncao`) VALUES
(NULL, NULL, NULL, '44444444', 3, NULL),
(NULL, 1, NULL, '2111111111', 4, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
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
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`cpf`, `nome`, `rg`, `telefone`, `email`, `fkendereco`, `tipo`, `dtnasc`) VALUES
('123213213', '111111111111111111111', 123123213, '12321321', '12312321@1213123', NULL, NULL, '0000-00-00'),
('12345678912', 'Vitor Rodrigues', 123213213, '14999999999', 'vitor.campos18@fatec.sp.gov.br', NULL, NULL, '0000-00-00'),
('2111111111', 'dsdssdsdd', 33333333, '32333333', 'dkjddddd@gmail.com', 25, 1, '2200-03-30'),
('4125683', 'Gabriel', 218744, '4128447', 'djkhfjsafjk@gmail.com', 16, 1, '2000-04-09'),
('41321455', 'slaçkfas', 129348, '419241', 'kdjsadaf@gmail.com', 20, 1, '2000-04-20'),
('44444444', 'kasdjas', 4232333, '4444442', 'faskdjakd@gmail.com', 22, 1, '2000-04-09'),
('48129841', 'dkajslkda', 9248148, '492849', 'dksjadj@gmail.com', 9, 1, '0922-09-04'),
('4821846', 'lkfaspokfa', 18573157, '412412', 'dkajsdkjsa@gmail.com', 18, 1, '2444-04-20'),
('487964431', 'Gabriel', 482414, '4824141', 'gajshdsajkh@gmail.com', 8, 1, '2000-04-09'),
('4879644480', 'Gabriel', 48020104, '4187249', 'gabdjsadbaj@gmail.com', 7, 1, '2000-04-09'),
('48796444800', 'test', 49219341, '918249012', 'kajdsajdhas@gmail.com', 4, 1, '2200-04-02'),
('9875321', 'dasdsa', 1235456, '49', 'dasjdsakj@gmail.com', 14, 1, '2000-04-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `id` int(9) NOT NULL,
  `pet_nome` varchar(20) NOT NULL,
  `especie` varchar(250) NOT NULL,
  `raca` varchar(250) NOT NULL,
  `pelagem` varchar(250) NOT NULL,
  `sexo` varchar(5) NOT NULL,
  `dt_nasc` date NOT NULL,
  `observacoes` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`id`, `pet_nome`, `especie`, `raca`, `pelagem`, `sexo`, `dt_nasc`, `observacoes`) VALUES
(2, '23432', '2', '3', 'grande', 'Peque', '0000-00-00', '234234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca`
--

CREATE TABLE `raca` (
  `id_raca` int(11) NOT NULL,
  `nome_raca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recebimento`
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
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `nomeservico` varchar(30) NOT NULL,
  `duracao` varchar(30) NOT NULL,
  `preco` float NOT NULL,
  `fluxoag` varchar(100) NOT NULL,
  `periodorec` varchar(100) NOT NULL,
  `modatend` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `nomeservico`, `duracao`, `preco`, `fluxoag`, `periodorec`, `modatend`) VALUES
(2, 'Tosa e banho 1111111', '1h', 0, ' \"pendente\" ', '3 meses', 'tosa seu cachorrin '),
(3, 'dog', '1h', 60, 'finalizado', '30d', 'what the dog doing'),
(12, 'Banho e tosa', '30 minutos', 50, 'Em andamento', '30 dias', 'Nossos especialistas realizam o banho e tosa do seu pet!'),
(14, '123213', '12321', 3123120, 'Pendente', '12321', '3123123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `test`
--

CREATE TABLE `test` (
  `nome` varchar(40) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `test`
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
-- Estrutura da tabela `tutor`
--

CREATE TABLE `tutor` (
  `id` int(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `cpf_pessoa` varchar(11) NOT NULL,
  `dtregistro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `fkid_servico` (`fkid_servico`),
  ADD KEY `fkcod_pet` (`fkcod_pet`),
  ADD KEY `fkid_func` (`fkid_func`),
  ADD KEY `fkid_receb` (`fkid_receb`);

--
-- Índices para tabela `diasdasemana`
--
ALTER TABLE `diasdasemana`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`);

--
-- Índices para tabela `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpf_pessoa` (`cpf_pessoa`),
  ADD KEY `fkfuncao` (`fkfuncao`),
  ADD KEY `diadefolga` (`diadefolga`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`cpf`),
  ADD KEY `fkendereco` (`fkendereco`);

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`id_pgto`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`num`);

--
-- Índices para tabela `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpf_pessoa` (`cpf_pessoa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `diasdasemana`
--
ALTER TABLE `diasdasemana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`fkid_func`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `agenda_ibfk_4` FOREIGN KEY (`fkid_receb`) REFERENCES `recebimento` (`id_pgto`);

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`cpf_pessoa`) REFERENCES `pessoas` (`cpf`),
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`fkfuncao`) REFERENCES `funcao` (`id`),
  ADD CONSTRAINT `funcionarios_ibfk_3` FOREIGN KEY (`diadefolga`) REFERENCES `diasdasemana` (`id`);

--
-- Limitadores para a tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`fkendereco`) REFERENCES `endereco` (`id_endereco`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
