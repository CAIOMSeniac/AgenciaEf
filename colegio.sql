CREATE DATABASE `AgenciaEF`;
--
-- tabela candidatos
--
CREATE TABLE `Candidato` (
  `idCandidato` int PRIMARY KEY AUTO_INCREMENT,
  `NomeCompleto` varchar(50) NOT NULL,
  `Whatsapp` varchar(25) NOT NULL,
  `Idade` int(3) NOT NULL,
  `Whatsapp` varchar(25) NOT NULL,
  `Bairro` varchar(25) NOT NULL,
  `Escolaridade` varchar(25) NOT NULL,
  `AreaPretendida` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Curriculo` longblob NOT NULL);
--
-- tabela empresas
--
CREATE TABLE `Empresa` (
  `idEmpresa` int PRIMARY KEY AUTO_INCREMENT,
  `Agenciada` tinyint(1) NOT NULL,
  `Telefone` varchar(25) NOT NULL,  
  `Email` varchar(50) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cep` varchar(25) NOT NULL,
  `NumeroRes` varchar(25) NOT NULL,
  `ObservacoesEndereco` varchar(25) NOT NULL,
  `VagasAbertas` int(4) NOT NULL
  );

--
--  tabela de vagas
--
CREATE TABLE `Vagas` (
  `idEmpresa` int PRIMARY KEY AUTO_INCREMENT,
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
  `AgenteIntegrador` tinyint(1) NOT NULL,
  `HorarioAtuacaoFim` tinyint(1) NOT NULL
  );


