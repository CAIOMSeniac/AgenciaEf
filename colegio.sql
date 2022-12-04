CREATE DATABASE `AgenciaEF`;
--
-- tabela candidatos
--
CREATE TABLE `Candidato` (
  `idCandidato` int PRIMARY KEY AUTO_INCREMENT,
  `NomeCompleto` varchar(50) NOT NULL,
  `Idade` int(3) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Whatsapp` varchar(20) NOT NULL,
  `Bairro` varchar(25) NOT NULL,
  `Escolaridade` varchar(25) NOT NULL,
  `AreaPretendida` varchar(25) NOT NULL,
  `Curriculo` longblob);
--
-- tabela empresas
--
CREATE TABLE `Empresa` (
  `idEmpresa` int PRIMARY KEY AUTO_INCREMENT,
  `Agenciada` tinyint(1) NOT NULL,
  `Telefone` varchar(20) NOT NULL,  
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cep` varchar(25) NOT NULL,
  `NumeroResidencia` int(4) NOT NULL,
  `ObservacoesEndereco` varchar(50) NULL,
  `VagasAbertas` int(4) NOT NULL
  );

--
--  tabela de vagas
--
CREATE TABLE `Vagas` (
  `idVaga` int PRIMARY KEY AUTO_INCREMENT,
  `idEmpresa` int,
  `Atividades` TEXT NOT NULL,
  `Regime` varchar(25) NOT NULL,
  `Remuneracao` varchar(25) NOT NULL,
  `OutrosBenef` varchar(25) NOT NULL,
  --Curso pago não tem para não agenciados
  `CursoPago` varchar(25),
  -- pré requisitos
  `PerfilEsperado` TEXT NOT NULL,
  `IdadeMin` int(3) NOT NULL,
  `EscolaridadeMin` varchar(25) NOT NULL,
  `HorarioAtuacaoIni` varchar(5) NOT NULL,
  `HorarioAtuacaoFim` varchar(5) NOT NULL,
  `Deadline` DATE NOT NULL,
  -- AgenteIntegrador e InteresseAgenciamento não aparecem para os agenciados
  `AgenteIntegrador` tinyint(1),
  `InteresseAgenciamento` tinyint(1)
  );


CREATE TABLE `Usuario` (
  `idUser` int PRIMARY KEY AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `Agenciada` tinyint(1),
  `idCandidato` int,
  `idEmpresa` int
);

CREATE TABLE `Usuario_Equipe` (
  `idUser` int PRIMARY KEY AUTO_INCREMENT,
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL
);

CREATE TABLE `Relacoes`(
  `idRelacao` int PRIMARY KEY AUTO_INCREMENT,
  `idCandidato` int,
  `Nome` varchar(50) NOT NULL,
  `idEmpresa` int,
  `idVaga` int
);