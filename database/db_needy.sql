-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04-Abr-2020 às 22:26
-- Versão do servidor: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_needy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbAgendamento`
--

CREATE TABLE `tbAgendamento` (
  `idAgendamento` int(12) NOT NULL,
  `dataAgendamento` date NOT NULL,
  `idDoador` int(12) NOT NULL,
  `idTipoDoacao` int(12) NOT NULL,
  `idBancoSangue` int(12) NOT NULL,
  `statusAgendamento` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbBancoSangue`
--

CREATE TABLE `tbBancoSangue` (
  `idBancoSangue` int(12) NOT NULL,
  `nomeBancoSangue` varchar(100) COLLATE utf8_bin NOT NULL,
  `logradouroBancoSangue` varchar(100) COLLATE utf8_bin NOT NULL,
  `bairroBancoSangue` varchar(100) COLLATE utf8_bin NOT NULL,
  `numeroEndBancoSangue` varchar(6) COLLATE utf8_bin NOT NULL,
  `complementoEndBancoSangue` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cepBancoSangue` char(12) COLLATE utf8_bin NOT NULL,
  `ufBancoSangue` char(2) COLLATE utf8_bin NOT NULL,
  `cidadeBancoSangue` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbBancoSangue`
--

INSERT INTO `tbBancoSangue` (`idBancoSangue`, `nomeBancoSangue`, `logradouroBancoSangue`, `bairroBancoSangue`, `numeroEndBancoSangue`, `complementoEndBancoSangue`, `cepBancoSangue`, `ufBancoSangue`, `cidadeBancoSangue`) VALUES
(1, 'João Incompetente Da Silva', 'Rua João é muito incompetente', 'Bairro Incompetente', '666', 'Estou puto com joão incompetente', '666-666', 'SP', 'São Paulo'),
(2, 'Banco dos bobos', 'Rua dos bobos', 'Bairro dos bobos', '666', 'Nadega esquerda, próximo ao cu', '40028922', 'RJ', 'Rio de Janeiro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbCargoFuncionario`
--

CREATE TABLE `tbCargoFuncionario` (
  `idCargoFuncionario` int(12) NOT NULL,
  `descricaoCargoFuncionario` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbDoacao`
--

CREATE TABLE `tbDoacao` (
  `idDoacao` int(12) NOT NULL,
  `dataDoacao` date NOT NULL,
  `horaDoacao` time NOT NULL,
  `idDoador` int(12) NOT NULL,
  `idBancoSangue` int(12) NOT NULL,
  `idMaterialDoado` int(12) NOT NULL,
  `idResultadoDoacao` int(12) NOT NULL,
  `pesoDoacao` decimal(3,2) NOT NULL,
  `totalDoacao` int(5) NOT NULL,
  `statusDoacao` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbDoador`
--

CREATE TABLE `tbDoador` (
  `idDoador` int(12) NOT NULL,
  `nomeDoador` varchar(100) COLLATE utf8_bin NOT NULL,
  `idResponsavel` int(12) DEFAULT NULL,
  `idSexo` int(12) NOT NULL,
  `dataNascimentoDoador` date NOT NULL,
  `idFatorRh` int(12) NOT NULL,
  `idTipoSanguineo` int(12) NOT NULL,
  `cpfDoador` varchar(14) COLLATE utf8_bin NOT NULL,
  `rgDoador` varchar(15) COLLATE utf8_bin NOT NULL,
  `logradouroDoador` varchar(100) COLLATE utf8_bin NOT NULL,
  `bairroDoador` varchar(100) COLLATE utf8_bin NOT NULL,
  `cepDoador` varchar(10) COLLATE utf8_bin NOT NULL,
  `numeroEndDoador` varchar(5) COLLATE utf8_bin NOT NULL,
  `complementoEndDoador` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `cidadeDoador` varchar(100) COLLATE utf8_bin NOT NULL,
  `ufDoador` char(2) COLLATE utf8_bin NOT NULL,
  `idUsuario` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbDoador`
--

INSERT INTO `tbDoador` (`idDoador`, `nomeDoador`, `idResponsavel`, `idSexo`, `dataNascimentoDoador`, `idFatorRh`, `idTipoSanguineo`, `cpfDoador`, `rgDoador`, `logradouroDoador`, `bairroDoador`, `cepDoador`, `numeroEndDoador`, `complementoEndDoador`, `cidadeDoador`, `ufDoador`, `idUsuario`) VALUES
(1, 'Miguel Doador de Cu', 1, 2, '2003-08-02', 2, 4, '666.666.666-66', '555.555.555-55', 'Rua Quem mora aqui dá a bunda', 'Bairro dos Doadores de Bunda', '190190190', '111', 'nadega direita, próximo ao cu', 'São Paulo', 'SP', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbFatorRh`
--

CREATE TABLE `tbFatorRh` (
  `idFatorRh` int(12) NOT NULL,
  `descricaoFatorRh` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbFatorRh`
--

INSERT INTO `tbFatorRh` (`idFatorRh`, `descricaoFatorRh`) VALUES
(1, 'Positivo'),
(2, 'Negativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbFuncionario`
--

CREATE TABLE `tbFuncionario` (
  `idFuncionario` int(12) NOT NULL,
  `nomeFuncionario` varchar(100) COLLATE utf8_bin NOT NULL,
  `cpfFuncionario` varchar(14) COLLATE utf8_bin NOT NULL,
  `rgFuncionario` varchar(15) COLLATE utf8_bin NOT NULL,
  `idBancoSangue` int(12) NOT NULL,
  `idUsuario` int(12) NOT NULL,
  `idCargoFuncionario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbMaterialDoado`
--

CREATE TABLE `tbMaterialDoado` (
  `idMaterialDoado` int(12) NOT NULL,
  `descricaoMaterialDoado` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbPaciente`
--

CREATE TABLE `tbPaciente` (
  `idPaciente` int(12) NOT NULL,
  `nomePaciente` varchar(100) COLLATE utf8_bin NOT NULL,
  `idSexo` int(12) NOT NULL,
  `idTipoSanguineo` int(12) NOT NULL,
  `idFatorRh` int(12) NOT NULL,
  `cpfPaciente` varchar(14) COLLATE utf8_bin NOT NULL,
  `rgPaciente` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbResponsavel`
--

CREATE TABLE `tbResponsavel` (
  `idResponsavel` int(12) NOT NULL,
  `nomeResponsavel` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cpfResponsavel` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `rgResponsavel` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `dataNascimentoResponsavel` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbResponsavel`
--

INSERT INTO `tbResponsavel` (`idResponsavel`, `nomeResponsavel`, `cpfResponsavel`, `rgResponsavel`, `dataNascimentoResponsavel`) VALUES
(1, 'João Irresponsável da Silva', '40028922', '666666', '1966-06-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbResultadoDoacao`
--

CREATE TABLE `tbResultadoDoacao` (
  `idResultadoDoacao` int(12) NOT NULL,
  `descricaoResultadoDoacao` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbSexo`
--

CREATE TABLE `tbSexo` (
  `idSexo` int(12) NOT NULL,
  `descricaoSexo` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbSexo`
--

INSERT INTO `tbSexo` (`idSexo`, `descricaoSexo`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbTelefoneBancoSangue`
--

CREATE TABLE `tbTelefoneBancoSangue` (
  `idTelefoneBancoSangue` int(12) NOT NULL,
  `numeroTelefoneBanco` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `idBancoSangue` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbTelefoneDoador`
--

CREATE TABLE `tbTelefoneDoador` (
  `idTelefoneDoador` int(12) NOT NULL,
  `numeroTelefoneDoador` varchar(15) COLLATE utf8_bin NOT NULL,
  `idDoador` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbTelefoneResponsavel`
--

CREATE TABLE `tbTelefoneResponsavel` (
  `idTelefoneResponsavel` int(12) NOT NULL,
  `numeroTelefoneResponsavel` varchar(15) COLLATE utf8_bin NOT NULL,
  `idResponsavel` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbTipoDoacao`
--

CREATE TABLE `tbTipoDoacao` (
  `idTipoDoacao` int(12) NOT NULL,
  `descricaoTipoDoacao` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbTipoSanguineo`
--

CREATE TABLE `tbTipoSanguineo` (
  `idTipoSanguineo` int(12) NOT NULL,
  `descricaoTipoSanguineo` varchar(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbTipoSanguineo`
--

INSERT INTO `tbTipoSanguineo` (`idTipoSanguineo`, `descricaoTipoSanguineo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbTipoUsuario`
--

CREATE TABLE `tbTipoUsuario` (
  `idTipoUsuario` int(12) NOT NULL,
  `descricaoTipoUsuario` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbTipoUsuario`
--

INSERT INTO `tbTipoUsuario` (`idTipoUsuario`, `descricaoTipoUsuario`) VALUES
(1, 'Master');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbUsuario`
--

CREATE TABLE `tbUsuario` (
  `idUsuario` int(12) NOT NULL,
  `emailUsuario` varchar(40) COLLATE utf8_bin NOT NULL,
  `senhaUsuario` char(32) COLLATE utf8_bin NOT NULL,
  `idTipoUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbUsuario`
--

INSERT INTO `tbUsuario` (`idUsuario`, `emailUsuario`, `senhaUsuario`, `idTipoUsuario`) VALUES
(1, 'miguel.boiola@gay.com', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbAgendamento`
--
ALTER TABLE `tbAgendamento`
  ADD PRIMARY KEY (`idAgendamento`),
  ADD KEY `idDoador` (`idDoador`),
  ADD KEY `idTipoDoacao` (`idTipoDoacao`),
  ADD KEY `idBancoSangue` (`idBancoSangue`);

--
-- Indexes for table `tbBancoSangue`
--
ALTER TABLE `tbBancoSangue`
  ADD PRIMARY KEY (`idBancoSangue`);

--
-- Indexes for table `tbCargoFuncionario`
--
ALTER TABLE `tbCargoFuncionario`
  ADD PRIMARY KEY (`idCargoFuncionario`);

--
-- Indexes for table `tbDoacao`
--
ALTER TABLE `tbDoacao`
  ADD PRIMARY KEY (`idDoacao`),
  ADD KEY `idDoador` (`idDoador`),
  ADD KEY `idBancoSangue` (`idBancoSangue`),
  ADD KEY `idMaterialDoado` (`idMaterialDoado`),
  ADD KEY `idResultadoDoacao` (`idResultadoDoacao`);

--
-- Indexes for table `tbDoador`
--
ALTER TABLE `tbDoador`
  ADD PRIMARY KEY (`idDoador`),
  ADD KEY `idResponsavel` (`idResponsavel`),
  ADD KEY `idSexo` (`idSexo`),
  ADD KEY `idFatorRh` (`idFatorRh`),
  ADD KEY `idTipoSanguineo` (`idTipoSanguineo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `tbFatorRh`
--
ALTER TABLE `tbFatorRh`
  ADD PRIMARY KEY (`idFatorRh`);

--
-- Indexes for table `tbFuncionario`
--
ALTER TABLE `tbFuncionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `idBancoSangue` (`idBancoSangue`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCargoFuncionario` (`idCargoFuncionario`);

--
-- Indexes for table `tbMaterialDoado`
--
ALTER TABLE `tbMaterialDoado`
  ADD PRIMARY KEY (`idMaterialDoado`);

--
-- Indexes for table `tbPaciente`
--
ALTER TABLE `tbPaciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `idSexo` (`idSexo`),
  ADD KEY `idTipoSanguineo` (`idTipoSanguineo`),
  ADD KEY `idFatorRh` (`idFatorRh`);

--
-- Indexes for table `tbResponsavel`
--
ALTER TABLE `tbResponsavel`
  ADD PRIMARY KEY (`idResponsavel`);

--
-- Indexes for table `tbResultadoDoacao`
--
ALTER TABLE `tbResultadoDoacao`
  ADD PRIMARY KEY (`idResultadoDoacao`);

--
-- Indexes for table `tbSexo`
--
ALTER TABLE `tbSexo`
  ADD PRIMARY KEY (`idSexo`);

--
-- Indexes for table `tbTelefoneBancoSangue`
--
ALTER TABLE `tbTelefoneBancoSangue`
  ADD PRIMARY KEY (`idTelefoneBancoSangue`),
  ADD KEY `idBancoSangue` (`idBancoSangue`);

--
-- Indexes for table `tbTelefoneDoador`
--
ALTER TABLE `tbTelefoneDoador`
  ADD PRIMARY KEY (`idTelefoneDoador`),
  ADD KEY `idDoador` (`idDoador`);

--
-- Indexes for table `tbTelefoneResponsavel`
--
ALTER TABLE `tbTelefoneResponsavel`
  ADD PRIMARY KEY (`idTelefoneResponsavel`),
  ADD KEY `idResponsavel` (`idResponsavel`);

--
-- Indexes for table `tbTipoDoacao`
--
ALTER TABLE `tbTipoDoacao`
  ADD PRIMARY KEY (`idTipoDoacao`);

--
-- Indexes for table `tbTipoSanguineo`
--
ALTER TABLE `tbTipoSanguineo`
  ADD PRIMARY KEY (`idTipoSanguineo`);

--
-- Indexes for table `tbTipoUsuario`
--
ALTER TABLE `tbTipoUsuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indexes for table `tbUsuario`
--
ALTER TABLE `tbUsuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbAgendamento`
--
ALTER TABLE `tbAgendamento`
  MODIFY `idAgendamento` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbBancoSangue`
--
ALTER TABLE `tbBancoSangue`
  MODIFY `idBancoSangue` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbCargoFuncionario`
--
ALTER TABLE `tbCargoFuncionario`
  MODIFY `idCargoFuncionario` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbDoacao`
--
ALTER TABLE `tbDoacao`
  MODIFY `idDoacao` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbDoador`
--
ALTER TABLE `tbDoador`
  MODIFY `idDoador` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbFatorRh`
--
ALTER TABLE `tbFatorRh`
  MODIFY `idFatorRh` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbFuncionario`
--
ALTER TABLE `tbFuncionario`
  MODIFY `idFuncionario` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbMaterialDoado`
--
ALTER TABLE `tbMaterialDoado`
  MODIFY `idMaterialDoado` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbPaciente`
--
ALTER TABLE `tbPaciente`
  MODIFY `idPaciente` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbResponsavel`
--
ALTER TABLE `tbResponsavel`
  MODIFY `idResponsavel` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbResultadoDoacao`
--
ALTER TABLE `tbResultadoDoacao`
  MODIFY `idResultadoDoacao` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbSexo`
--
ALTER TABLE `tbSexo`
  MODIFY `idSexo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbTelefoneBancoSangue`
--
ALTER TABLE `tbTelefoneBancoSangue`
  MODIFY `idTelefoneBancoSangue` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbTelefoneDoador`
--
ALTER TABLE `tbTelefoneDoador`
  MODIFY `idTelefoneDoador` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbTelefoneResponsavel`
--
ALTER TABLE `tbTelefoneResponsavel`
  MODIFY `idTelefoneResponsavel` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbTipoDoacao`
--
ALTER TABLE `tbTipoDoacao`
  MODIFY `idTipoDoacao` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbTipoSanguineo`
--
ALTER TABLE `tbTipoSanguineo`
  MODIFY `idTipoSanguineo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbTipoUsuario`
--
ALTER TABLE `tbTipoUsuario`
  MODIFY `idTipoUsuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbUsuario`
--
ALTER TABLE `tbUsuario`
  MODIFY `idUsuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbAgendamento`
--
ALTER TABLE `tbAgendamento`
  ADD CONSTRAINT `tbAgendamento_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`),
  ADD CONSTRAINT `tbAgendamento_ibfk_2` FOREIGN KEY (`idTipoDoacao`) REFERENCES `tbTipoDoacao` (`idTipoDoacao`),
  ADD CONSTRAINT `tbAgendamento_ibfk_3` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`);

--
-- Limitadores para a tabela `tbDoacao`
--
ALTER TABLE `tbDoacao`
  ADD CONSTRAINT `tbDoacao_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`),
  ADD CONSTRAINT `tbDoacao_ibfk_2` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`),
  ADD CONSTRAINT `tbDoacao_ibfk_3` FOREIGN KEY (`idMaterialDoado`) REFERENCES `tbMaterialDoado` (`idMaterialDoado`),
  ADD CONSTRAINT `tbDoacao_ibfk_4` FOREIGN KEY (`idResultadoDoacao`) REFERENCES `tbResultadoDoacao` (`idResultadoDoacao`);

--
-- Limitadores para a tabela `tbDoador`
--
ALTER TABLE `tbDoador`
  ADD CONSTRAINT `tbDoador_ibfk_1` FOREIGN KEY (`idResponsavel`) REFERENCES `tbResponsavel` (`idResponsavel`),
  ADD CONSTRAINT `tbDoador_ibfk_2` FOREIGN KEY (`idSexo`) REFERENCES `tbSexo` (`idSexo`),
  ADD CONSTRAINT `tbDoador_ibfk_3` FOREIGN KEY (`idFatorRh`) REFERENCES `tbFatorRh` (`idFatorRh`),
  ADD CONSTRAINT `tbDoador_ibfk_4` FOREIGN KEY (`idTipoSanguineo`) REFERENCES `tbTipoSanguineo` (`idTipoSanguineo`),
  ADD CONSTRAINT `tbDoador_ibfk_5` FOREIGN KEY (`idUsuario`) REFERENCES `tbUsuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbFuncionario`
--
ALTER TABLE `tbFuncionario`
  ADD CONSTRAINT `tbFuncionario_ibfk_1` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`),
  ADD CONSTRAINT `tbFuncionario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tbUsuario` (`idUsuario`),
  ADD CONSTRAINT `tbFuncionario_ibfk_3` FOREIGN KEY (`idCargoFuncionario`) REFERENCES `tbCargoFuncionario` (`idCargoFuncionario`);

--
-- Limitadores para a tabela `tbPaciente`
--
ALTER TABLE `tbPaciente`
  ADD CONSTRAINT `tbPaciente_ibfk_1` FOREIGN KEY (`idSexo`) REFERENCES `tbSexo` (`idSexo`),
  ADD CONSTRAINT `tbPaciente_ibfk_2` FOREIGN KEY (`idTipoSanguineo`) REFERENCES `tbTipoSanguineo` (`idTipoSanguineo`),
  ADD CONSTRAINT `tbPaciente_ibfk_3` FOREIGN KEY (`idFatorRh`) REFERENCES `tbFatorRh` (`idFatorRh`);

--
-- Limitadores para a tabela `tbTelefoneBancoSangue`
--
ALTER TABLE `tbTelefoneBancoSangue`
  ADD CONSTRAINT `tbTelefoneBancoSangue_ibfk_1` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`);

--
-- Limitadores para a tabela `tbTelefoneDoador`
--
ALTER TABLE `tbTelefoneDoador`
  ADD CONSTRAINT `tbTelefoneDoador_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`);

--
-- Limitadores para a tabela `tbTelefoneResponsavel`
--
ALTER TABLE `tbTelefoneResponsavel`
  ADD CONSTRAINT `tbTelefoneResponsavel_ibfk_1` FOREIGN KEY (`idResponsavel`) REFERENCES `tbResponsavel` (`idResponsavel`);

--
-- Limitadores para a tabela `tbUsuario`
--
ALTER TABLE `tbUsuario`
  ADD CONSTRAINT `tbUsuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tbTipoUsuario` (`idTipoUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
