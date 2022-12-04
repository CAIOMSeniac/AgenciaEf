<?php
session_start();
include_once('conexao_Banco.php');
$querySQL ="INSERT INTO `candidato`(`NomeCompleto`, `Idade`, `Email`,
 `Whatsapp`, `Bairro`, `Escolaridade`, `AreaPretendida`)
VALUES (";
$nome = mysqli_real_escape_string($conn,$_POST['NOME']);
$idade = mysqli_real_escape_string($conn,$_POST['IDADE']);
$email = mysqli_real_escape_string($conn,$_POST['EMAIL']);
$telefone = mysqli_real_escape_string($conn,$_POST['WHATSAPP']);
$bairro = mysqli_real_escape_string($conn,$_POST['BAIRRO']);
$escolaridade = mysqli_real_escape_string($conn,$_POST['ESCOLARIDADE']);
$area = mysqli_real_escape_string($conn,$_POST['AREA']);
$querySQL .="'$nome','$idade','$email','$telefone','$bairro','$escolaridade','$area')";
$result = mysqli_query($conn,$querySQL);

$querySQL = "SELECT * FROM  `candidato` WHERE
`NomeCompleto` = '$nome' AND
`Email` = '$email'";
$result = mysqli_query($conn,$querySQL);
$linha = mysqli_fetch_assoc($result);
$idCandidato = $linha['idCandidato'];

$querySQL ="UPDATE `usuario_candidatoempresa`
SET `idCandidato`='$idCandidato'
WHERE `idUser` = '".$_SESSION['idUsuario']."'";
$result = mysqli_query($conn,$querySQL);

?>