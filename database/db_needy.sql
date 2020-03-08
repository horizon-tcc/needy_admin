-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Fev-2020 às 23:48
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdneedy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbagendamento`
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
-- Estrutura da tabela `tbbancosangue`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcargofuncionario`
--

CREATE TABLE `tbCargoFuncionario` (
  `idCargoFuncionario` int(12) NOT NULL,
  `descricaoCargoFuncionario` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdoacao`
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
-- Estrutura da tabela `tbdoador`
--

CREATE TABLE `tbDoador` (
  `idDoador` int(12) NOT NULL,
  `nomeDoador` varchar(100) COLLATE utf8_bin NOT NULL,
  `idResponsavel` int(12) DEFAULT NULL,
  `idSexo` int(12) NOT NULL,
  `dataNascimentoDoador` date NOT NULL,
  `idadeDoador` int(12) NOT NULL,
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfatorrh`
--

CREATE TABLE `tbFatorRh` (
  `idFatorRh` int(12) NOT NULL,
  `descricaoFatorRh` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbfatorrh`
--

INSERT INTO `tbFatorRh` (`idFatorRh`, `descricaoFatorRh`) VALUES
(1, 'Positivo'),
(2, 'Negativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfuncionario`
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
-- Estrutura da tabela `tbmaterialdoado`
--

CREATE TABLE `tbMaterialDoado` (
  `idMaterialDoado` int(12) NOT NULL,
  `descricaoMaterialDoado` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpaciente`
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
-- Estrutura da tabela `tbresponsavel`
--

CREATE TABLE `tbResponsavel` (
  `idResponsavel` int(12) NOT NULL,
  `nomeResponsavel` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cpfResponsavel` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `rgResponsavel` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `dataNascimeentoResponsavel` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbresultadodoacao`
--

CREATE TABLE `tbResultadoDoacao` (
  `idResultadoDoacao` int(12) NOT NULL,
  `descricaoResultadoDoacao` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsexo`
--

CREATE TABLE `tbSexo` (
  `idSexo` int(12) NOT NULL,
  `descricaoSexo` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbsexo`
--

INSERT INTO `tbSexo` (`idSexo`, `descricaoSexo`) VALUES
(1, 'Masculino'),
(2, 'Feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefonebancosangue`
--

CREATE TABLE `tbTelefoneBancoSangue` (
  `idTelefoneBancoSangue` int(12) NOT NULL,
  `numeroTelefoneBanco` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `idBancoSangue` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefonedoador`
--

CREATE TABLE `tbTelefoneDoador` (
  `idTelefoneDoador` int(12) NOT NULL,
  `numeroTelefoneDoador` varchar(15) COLLATE utf8_bin NOT NULL,
  `idDoador` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelefoneresponsavel`
--

CREATE TABLE `tbTelefoneResponsavel` (
  `idTelefoneResponsavel` int(12) NOT NULL,
  `numeroTelefoneResponsavel` varchar(15) COLLATE utf8_bin NOT NULL,
  `idResponsavel` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipodoacao`
--

CREATE TABLE `tbTipoDoacao` (
  `idTipoDoacao` int(12) NOT NULL,
  `descricaoTipoDoacao` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtiposanguineo`
--

CREATE TABLE `tbTipoSanguineo` (
  `idTipoSanguineo` int(12) NOT NULL,
  `descricaoTipoSanguineo` varchar(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbtiposanguineo`
--

INSERT INTO `tbTipoSanguineo` (`idTipoSanguineo`, `descricaoTipoSanguineo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'AB'),
(4, 'O');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipousuario`
--

CREATE TABLE `tbTipoUsuario` (
  `idTipoUsuario` int(12) NOT NULL,
  `descricaoTipoUsuario` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tbtipousuario`
--

INSERT INTO `tbTipoUsuario` (`idTipoUsuario`, `descricaoTipoUsuario`) VALUES
(1, 'Master');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbUsuario` (
  `idUsuario` int(12) NOT NULL,
  `emailUsuario` varchar(40) COLLATE utf8_bin NOT NULL,
  `senhaUsuario` char(32) COLLATE utf8_bin NOT NULL,
  `idTipoUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbagendamento`
--
ALTER TABLE `tbAgendamento`
  ADD PRIMARY KEY (`idAgendamento`),
  ADD KEY `idDoador` (`idDoador`),
  ADD KEY `idTipoDoacao` (`idTipoDoacao`),
  ADD KEY `idBancoSangue` (`idBancoSangue`);

--
-- Índices para tabela `tbbancosangue`
--
ALTER TABLE `tbBancoSangue`
  ADD PRIMARY KEY (`idBancoSangue`);

--
-- Índices para tabela `tbcargofuncionario`
--
ALTER TABLE `tbCargoFuncionario`
  ADD PRIMARY KEY (`idCargoFuncionario`);

--
-- Índices para tabela `tbdoacao`
--
ALTER TABLE `tbDoacao`
  ADD PRIMARY KEY (`idDoacao`),
  ADD KEY `idDoador` (`idDoador`),
  ADD KEY `idBancoSangue` (`idBancoSangue`),
  ADD KEY `idMaterialDoado` (`idMaterialDoado`),
  ADD KEY `idResultadoDoacao` (`idResultadoDoacao`);

--
-- Índices para tabela `tbdoador`
--
ALTER TABLE `tbDoador`
  ADD PRIMARY KEY (`idDoador`),
  ADD KEY `idResponsavel` (`idResponsavel`),
  ADD KEY `idSexo` (`idSexo`),
  ADD KEY `idFatorRh` (`idFatorRh`),
  ADD KEY `idTipoSanguineo` (`idTipoSanguineo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `tbfatorrh`
--
ALTER TABLE `tbFatorRh`
  ADD PRIMARY KEY (`idFatorRh`);

--
-- Índices para tabela `tbfuncionario`
--
ALTER TABLE `tbFuncionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `idBancoSangue` (`idBancoSangue`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCargoFuncionario` (`idCargoFuncionario`);

--
-- Índices para tabela `tbmaterialdoado`
--
ALTER TABLE `tbMaterialDoado`
  ADD PRIMARY KEY (`idMaterialDoado`);

--
-- Índices para tabela `tbpaciente`
--
ALTER TABLE `tbPaciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `idSexo` (`idSexo`),
  ADD KEY `idTipoSanguineo` (`idTipoSanguineo`),
  ADD KEY `idFatorRh` (`idFatorRh`);

--
-- Índices para tabela `tbresponsavel`
--
ALTER TABLE `tbResponsavel`
  ADD PRIMARY KEY (`idResponsavel`);

--
-- Índices para tabela `tbresultadodoacao`
--
ALTER TABLE `tbResultadoDoacao`
  ADD PRIMARY KEY (`idResultadoDoacao`);

--
-- Índices para tabela `tbsexo`
--
ALTER TABLE `tbSexo`
  ADD PRIMARY KEY (`idSexo`);

--
-- Índices para tabela `tbtelefonebancosangue`
--
ALTER TABLE `tbTelefoneBancoSangue`
  ADD PRIMARY KEY (`idTelefoneBancoSangue`),
  ADD KEY `idBancoSangue` (`idBancoSangue`);

--
-- Índices para tabela `tbtelefonedoador`
--
ALTER TABLE `tbTelefoneDoador`
  ADD PRIMARY KEY (`idTelefoneDoador`),
  ADD KEY `idDoador` (`idDoador`);

--
-- Índices para tabela `tbtelefoneresponsavel`
--
ALTER TABLE `tbTelefoneResponsavel`
  ADD PRIMARY KEY (`idTelefoneResponsavel`),
  ADD KEY `idResponsavel` (`idResponsavel`);

--
-- Índices para tabela `tbtipodoacao`
--
ALTER TABLE `tbTipoDoacao`
  ADD PRIMARY KEY (`idTipoDoacao`);

--
-- Índices para tabela `tbtiposanguineo`
--
ALTER TABLE `tbTipoSanguineo`
  ADD PRIMARY KEY (`idTipoSanguineo`);

--
-- Índices para tabela `tbtipousuario`
--
ALTER TABLE `tbTipoUsuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbUsuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbagendamento`
--
ALTER TABLE `tbAgendamento`
  MODIFY `idAgendamento` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbbancosangue`
--
ALTER TABLE `tbBancoSangue`
  MODIFY `idBancoSangue` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcargofuncionario`
--
ALTER TABLE `tbCargoFuncionario`
  MODIFY `idCargoFuncionario` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdoacao`
--
ALTER TABLE `tbDoacao`
  MODIFY `idDoacao` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbdoador`
--
ALTER TABLE `tbDoador`
  MODIFY `idDoador` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbfatorrh`
--
ALTER TABLE `tbFatorRh`
  MODIFY `idFatorRh` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbfuncionario`
--
ALTER TABLE `tbFuncionario`
  MODIFY `idFuncionario` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmaterialdoado`
--
ALTER TABLE `tbMaterialDoado`
  MODIFY `idMaterialDoado` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbpaciente`
--
ALTER TABLE `tbPaciente`
  MODIFY `idPaciente` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbresponsavel`
--
ALTER TABLE `tbResponsavel`
  MODIFY `idResponsavel` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbresultadodoacao`
--
ALTER TABLE `tbResultadoDoacao`
  MODIFY `idResultadoDoacao` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbsexo`
--
ALTER TABLE `tbSexo`
  MODIFY `idSexo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbtelefonebancosangue`
--
ALTER TABLE `tbTelefoneBancoSangue`
  MODIFY `idTelefoneBancoSangue` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelefonedoador`
--
ALTER TABLE `tbTelefoneDoador`
  MODIFY `idTelefoneDoador` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelefoneresponsavel`
--
ALTER TABLE `tbTelefoneResponsavel`
  MODIFY `idTelefoneResponsavel` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtipodoacao`
--
ALTER TABLE `tbTipoDoacao`
  MODIFY `idTipoDoacao` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtiposanguineo`
--
ALTER TABLE `tbTipoSanguineo`
  MODIFY `idTipoSanguineo` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbtipousuario`
--
ALTER TABLE `tbTipoUsuario`
  MODIFY `idTipoUsuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbUsuario`
  MODIFY `idUsuario` int(12) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbagendamento`
--
ALTER TABLE `tbAgendamento`
  ADD CONSTRAINT `tbAgendamento_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`),
  ADD CONSTRAINT `tbAgendamento_ibfk_2` FOREIGN KEY (`idTipoDoacao`) REFERENCES `tbTipoDoacao` (`idTipoDoacao`),
  ADD CONSTRAINT `tbAgendamento_ibfk_3` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`);

--
-- Limitadores para a tabela `tbdoacao`
--
ALTER TABLE `tbDoacao`
  ADD CONSTRAINT `tbDoacao_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`),
  ADD CONSTRAINT `tbDoacao_ibfk_2` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`),
  ADD CONSTRAINT `tbDoacao_ibfk_3` FOREIGN KEY (`idMaterialDoado`) REFERENCES `tbMaterialDoado` (`idMaterialDoado`),
  ADD CONSTRAINT `tbDoacao_ibfk_4` FOREIGN KEY (`idResultadoDoacao`) REFERENCES `tbResultadoDoacao` (`idResultadoDoacao`);

--
-- Limitadores para a tabela `tbdoador`
--
ALTER TABLE `tbDoador`
  ADD CONSTRAINT `tbDoador_ibfk_1` FOREIGN KEY (`idResponsavel`) REFERENCES `tbResponsavel` (`idResponsavel`),
  ADD CONSTRAINT `tbDoador_ibfk_2` FOREIGN KEY (`idSexo`) REFERENCES `tbSexo` (`idSexo`),
  ADD CONSTRAINT `tbDoador_ibfk_3` FOREIGN KEY (`idFatorRh`) REFERENCES `tbFatorRh` (`idFatorRh`),
  ADD CONSTRAINT `tbDoador_ibfk_4` FOREIGN KEY (`idTipoSanguineo`) REFERENCES `tbTipoSanguineo` (`idTipoSanguineo`),
  ADD CONSTRAINT `tbDoador_ibfk_5` FOREIGN KEY (`idUsuario`) REFERENCES `tbUsuario` (`idUsuario`);

--
-- Limitadores para a tabela `tbfuncionario`
--
ALTER TABLE `tbFuncionario`
  ADD CONSTRAINT `tbFuncionario_ibfk_1` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`),
  ADD CONSTRAINT `tbFuncionario_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `tbUsuario` (`idUsuario`),
  ADD CONSTRAINT `tbFuncionario_ibfk_3` FOREIGN KEY (`idCargoFuncionario`) REFERENCES `tbCargoFuncionario` (`idCargoFuncionario`);

--
-- Limitadores para a tabela `tbpaciente`
--
ALTER TABLE `tbPaciente`
  ADD CONSTRAINT `tbPaciente_ibfk_1` FOREIGN KEY (`idSexo`) REFERENCES `tbSexo` (`idSexo`),
  ADD CONSTRAINT `tbPaciente_ibfk_2` FOREIGN KEY (`idTipoSanguineo`) REFERENCES `tbTipoSanguineo` (`idTipoSanguineo`),
  ADD CONSTRAINT `tbPaciente_ibfk_3` FOREIGN KEY (`idFatorRh`) REFERENCES `tbFatorRh` (`idFatorRh`);

--
-- Limitadores para a tabela `tbtelefonebancosangue`
--
ALTER TABLE `tbTelefoneBancoSangue`
  ADD CONSTRAINT `tbTelefoneBancoSangue_ibfk_1` FOREIGN KEY (`idBancoSangue`) REFERENCES `tbBancoSangue` (`idBancoSangue`);

--
-- Limitadores para a tabela `tbtelefonedoador`
--
ALTER TABLE `tbTelefoneDoador`
  ADD CONSTRAINT `tbTelefoneDoador_ibfk_1` FOREIGN KEY (`idDoador`) REFERENCES `tbDoador` (`idDoador`);

--
-- Limitadores para a tabela `tbtelefoneresponsavel`
--
ALTER TABLE `tbTelefoneResponsavel`
  ADD CONSTRAINT `tbTelefoneResponsavel_ibfk_1` FOREIGN KEY (`idResponsavel`) REFERENCES `tbResponsavel` (`idResponsavel`);

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbUsuario`
  ADD CONSTRAINT `tbUsuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tbTipoUsuario` (`idTipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
