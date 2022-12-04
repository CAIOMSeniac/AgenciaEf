<?php
session_start();
include_once('conexao_Banco.php');
$querySQL ="INSERT INTO `usuario_candidatoempresa`(`Email`, `Nome`, `Senha`, `Tipo`, `Agenciada`, `idCandidato`, `idEmpresa`)
 VALUES (";

$email = mysqli_real_escape_string($conn,$_POST['EMAIL']);
$nome = mysqli_real_escape_string($conn,$_POST['NOME']);
$senha = mysqli_real_escape_string($conn,$_POST['SENHA']);
$tipo = mysqli_real_escape_string($conn,$_POST['TIPO']);

$querySQL .="'$email','$nome','$senha','$tipo',0,0,0)";
$result = mysqli_query($conn,$querySQL);
?>