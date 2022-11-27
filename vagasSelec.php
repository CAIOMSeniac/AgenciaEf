<?php
header('Content-Type: application/json');
session_start();
include_once('conexao_Banco.php');
$cond = "1=1 ";

$querySql = "SELECT `idVaga`,`Nome`, `vagas`.`idEmpresa`,
 `Atividades`, `Regime`, `Remuneracao`, `OutrosBenef`,
  `CursoPago`, `PerfilEsperado`, `IdadeMin`,
   `EscolaridadeMin`, `HorarioAtuacaoIni`,`HorarioAtuacaoFim`,
    `Deadline`, `AgenteIntegrador`, `InteresseAgenciamento`
     FROM `vagas`
     LEFT JOIN `empresa`
     ON `empresa`.`idEmpresa` = `vagas`.`idEmpresa`
     WHERE ".$cond." ORDER BY `Deadline` DESC" ;
$res = mysqli_query($conn,$querySql);
$resultados=mysqli_fetch_all($res);
echo json_encode($resultados);
?>