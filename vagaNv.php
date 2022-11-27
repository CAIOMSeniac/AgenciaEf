<?php
session_start();
include_once('conexao_Banco.php');
$querySQL ="INSERT INTO `vagas`(`idEmpresa`, `Atividades`, `Regime`,
 `Remuneracao`, `OutrosBenef`, `CursoPago`, `PerfilEsperado`, `IdadeMin`,
  `EscolaridadeMin`, `HorarioAtuacaoIni`, `HorarioAtuacaoFim`, `Deadline`,
   `AgenteIntegrador`, `InteresseAgenciamento`) VALUES (";

$atividades = mysqli_real_escape_string($conn,$_POST['ATIVIDADES']);
$regime = mysqli_real_escape_string($conn,$_POST['REGIME']);
$remuneracao = mysqli_real_escape_string($conn,$_POST['REMUNERACAO']);
$outrosBenef = mysqli_real_escape_string($conn,$_POST['OutrosBenef']);
$cursoPago = mysqli_real_escape_string($conn,$_POST['CURSO_PAGO']);
$perfilEsperado = mysqli_real_escape_string($conn,$_POST['PERFIL']);
$hEntrada = mysqli_real_escape_string($conn,$_POST['H_ENTRADA']);
$hSainda = mysqli_real_escape_string($conn,$_POST['H_SAIDA']);
$idadeMin = mysqli_real_escape_string($conn,$_POST['IDADE_MIN']);
$escolaridade = mysqli_real_escape_string($conn,$_POST['ESCOLARIDADE']);
$deadline = mysqli_real_escape_string($conn,$_POST['DEADLINE']);



$querySQL .="4,'$atividades','$regime','$remuneracao','$outrosBenef','$cursoPago'
,'$perfilEsperado','$idadeMin','$escolaridade','$hEntrada','$hSainda','$deadline',0,0)";
$result = mysqli_query($conn,$querySQL);


$querySQL = "SELECT `VagasAbertas` FROM `empresa` WHERE `idEmpresa` = 4";
$result = mysqli_query($conn,$querySQL);
$linha=mysqli_fetch_assoc($result);
$Vagas = $linha["VagasAbertas"];
$VagasAtual = $Vagas + 1;
$querySQL = "UPDATE `empresa` SET `VagasAbertas`=$VagasAtual WHERE `idEmpresa`= 4";
$result = mysqli_query($conn,$querySQL);
?>