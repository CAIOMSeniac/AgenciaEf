<?php
session_start();
include_once('conexao_Banco.php');
$querySQL ="INSERT INTO `empresa`(`Agenciada`,`Nome`, `Email`,`Telefone`,
  `Cep`, `NumeroResidencia`, `ObservacoesEndereco`)
VALUES (";
$Agenciada = mysqli_real_escape_string($conn,$_POST['AGENCIADA']);
$nome = mysqli_real_escape_string($conn,$_POST['NOME']);
$email = mysqli_real_escape_string($conn,$_POST['EMAIL']);
$telefone = mysqli_real_escape_string($conn,$_POST['TELEFONE']);
$Cep = mysqli_real_escape_string($conn,$_POST['CEP']);
$NumeroResidencia = mysqli_real_escape_string($conn,$_POST['NumeroResidencia']);
$ObservacoesEndereco = mysqli_real_escape_string($conn,$_POST['OutrasInformacoes']);
$querySQL .="'$Agenciada','$nome','$email','$telefone','$Cep',
'$NumeroResidencia','$ObservacoesEndereco')";
$result = mysqli_query($conn,$querySQL);


$querySQL = "SELECT * FROM  `empresa` WHERE
`Nome` = '$nome' AND
`Email` = '$email'";
$result = mysqli_query($conn,$querySQL);
$linha = mysqli_fetch_assoc($result);
$idEmpresa = $linha['idEmpresa'];

$querySQL ="UPDATE `usuario_candidatoempresa`
SET `idEmpresa`='$idEmpresa'
WHERE `idUser` = '".$_SESSION['idUsuario']."'";
$result = mysqli_query($conn,$querySQL);

?>
